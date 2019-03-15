<?php
/**
 * Created by PhpStorm.
 * User: sanokouhei
 * Date: 2017/11/13
 * Time: 14:53
 */

namespace Conversation;


use Conversation\AbstractConversationMessage;
use Conversation\Configure;
use Conversation\ConversationAction\ConversationCameraAction;
use Conversation\ConversationAction\ConversationCameraRoleAction;
use Conversation\ConversationAction\ConversationLocationAction;
use Conversation\ConversationAction\ConversationMessageAction;
use Conversation\ConversationAction\ConversationPostbackAction;
use Conversation\ConversationAction\ConversationQuickReplyAction;
use Conversation\ConversationAction\ConversationUrlAction;
use Conversation\ConversationActionType;
use Conversation\ConversationMessage\ConversationConfirmMessage;
use Conversation\ConversationMessage\ConversationMultipleActionMessage;
use Conversation\ConversationMessage\ConversationStickerMessage;
use Conversation\ConversationMessage\ConversationTextMessage;
use Conversation\ConversationMessageType;
use Conversation\Helper;
use Conversation\URI;

class ConversationWorkflowConfigLoader
{
    /**
     * @param Configure $configure
     *
     * @return ConversationWorkflowProvider
     */
    public static function load($configure)
    {
        $workflows = [];

        $config_workflows = $configure->read('Workflow');
        foreach ($config_workflows as $config_workflow) {

            $sequences = [];

            $config_sequences = $config_workflow['sequences'];
            foreach ($config_sequences as $config_sequence) {

                $config_sequence_messages = Helper::get_array($config_sequence, 'messages');
                if (empty($config_sequence_messages)) {
                    $config_sequence_messages = [Helper::get_array($config_sequence, 'message')];
                }

                $sequenceMessage       = null;
                $conversation_messages = [];
                foreach ($config_sequence_messages as $config_sequence_message) {
                    if (Helper::get_array($config_sequence_message, 'type') === ConversationMessageType::TEXT) {
                        $conversation_messages[] = static::loadTextMessageType($config_sequence_message);
                    } elseif (Helper::get_array($config_sequence_message,
                            'type') === ConversationMessageType::CONFIRM) {
                        $conversation_messages[] = static::loadConfirmMessageType($config_sequence_message);
                    } elseif (Helper::get_array($config_sequence_message,
                            'type') === ConversationMessageType::MULTIPLE_ACTION) {
                        $conversation_messages[] = static::loadMultipleActionMessageType($config_sequence_message);
                    } elseif (Helper::get_array($config_sequence_message,
                            'type') === ConversationMessageType::STICKER) {
                        $conversation_messages[] = static::loadStickerMessageType($config_sequence_message);
                    } elseif ( ! is_null(Helper::get_array($config_sequence_message, 'class', null)) &&
                               class_exists(Helper::get_array($config_sequence_message, 'class', null))) {
                        $class_name = Helper::get_array($config_sequence_message, 'class');
                        $class      = new $class_name;
                        if ($class instanceof ConversationWorkflowSequenceMessageInterface) {
                            $sequenceMessage = $class;
                            break;
                        }
                    }
                }
                if (empty($sequenceMessage) && empty($conversation_messages)) {
                    continue;
                }
                if (empty($sequenceMessage) && ! empty($conversation_messages)) {
                    $sequenceMessage = new ConversationWorkflowSequenceMessage($conversation_messages);
                }

                $messageValidator = null;
                if ( ! is_null(Helper::get_array($config_sequence, 'receive.type'))) {
                    $messageValidator = new ConversationWorkflowSequenceMessageTypeValidator(Helper::get_array($config_sequence,
                        'receive.type'));
                } elseif ( ! is_null(Helper::get_array($config_sequence, 'receive.validator')) &&
                           class_exists(Helper::get_array($config_sequence, 'receive.validator', null))) {
                    $class_name = Helper::get_array($config_sequence, 'receive.validator');
                    $class      = new $class_name;
                    if ($class instanceof ConversationWorkflowSequenceMessageValidatorInterface) {
                        $messageValidator = $class;
                    }
                }
                if (is_null($messageValidator)) {
                    continue;
                }

                $sequences[] = new ConversationWorkflowSequence(
                    $config_sequence['id'],
                    $sequenceMessage,
                    $messageValidator,
                    Helper::get_array($config_sequence, 'skippable', false)
                );
            }

            $startDate = Helper::get_array($config_workflow, 'rule.startDate', null);
            $endDate   = Helper::get_array($config_workflow, 'rule.endDate', null);

            $workflowRule = new ConversationWorkflowRule(
                Helper::get_array($config_workflow, 'rule.keywords', []),
                empty($startDate) ? null : strtotime($startDate),
                empty($endDate) ? null : strtotime($endDate),
                Helper::get_array($config_workflow, 'rule.aborts', [])
            );

            $workflows[] = new ConversationWorkflow(
                $configure->read('WorkflowVersion'),
                $config_workflow['id'],
                $config_workflow['title'],
                $workflowRule,
                $sequences,
                $config_workflow['handlers']
            );

        }

        return new ConversationWorkflowProvider($workflows);
    }

    /**
     * @param array $config_sequence_message
     *
     * @return ConversationTextMessage
     */
    private static function loadTextMessageType($config_sequence_message)
    {
        $actions = [];

        $config_message_actions = Helper::get_array($config_sequence_message, 'quickReply.actions');
        foreach ($config_message_actions as $config_message_action) {
            $type = Helper::get_array($config_message_action, 'type');
            if ($type === ConversationActionType::MESSAGE) {
                $actions[] = new ConversationQuickReplyAction(
                    null,
                    new ConversationMessageAction(
                        Helper::get_array($config_message_action, 'label'),
                        Helper::get_array($config_message_action, 'text')
                    )
                );
            } elseif ($type === ConversationActionType::POSTBACK) {
                $actions[] = new ConversationQuickReplyAction(
                    null,
                    new ConversationPostbackAction(
                        Helper::get_array($config_message_action, 'label'),
                        Helper::get_array($config_message_action, 'data'),
                        Helper::get_array($config_message_action, 'text', null)
                    )
                );
            } elseif ($type === ConversationActionType::CAMERA) {
                $actions[] = new ConversationQuickReplyAction(
                    null,
                    new ConversationCameraAction(
                        Helper::get_array($config_message_action, 'label')
                    )
                );
            } elseif ($type === ConversationActionType::CAMERA_ROLE) {
                $actions[] = new ConversationQuickReplyAction(
                    null,
                    new ConversationCameraRoleAction(
                        Helper::get_array($config_message_action, 'label')
                    )
                );
            } elseif ($type === ConversationActionType::LOCATION) {
                $actions[] = new ConversationQuickReplyAction(
                    null,
                    new ConversationLocationAction(
                        Helper::get_array($config_message_action, 'label')
                    )
                );
            }
        }

        return new ConversationTextMessage(
            Helper::get_array($config_sequence_message, 'text'),
            $actions
        );
    }

    /**
     * @param array $config_sequence_message
     *
     * @return ConversationConfirmMessage
     */
    private static function loadConfirmMessageType($config_sequence_message)
    {
        $actions = [];

        $config_message_actions = Helper::get_array($config_sequence_message, 'actions');

        foreach ($config_message_actions as $config_message_action) {
            $type = Helper::get_array($config_message_action, 'type');
            if ($type === ConversationActionType::POSTBACK) {
                $actions[] = new ConversationPostbackAction(
                    Helper::get_array($config_message_action, 'label'),
                    Helper::get_array($config_message_action, 'data'),
                    Helper::get_array($config_message_action, 'text', null)
                );
            }
        }

        return new ConversationConfirmMessage(
            Helper::get_array($config_sequence_message, 'title'),
            Helper::get_array($config_sequence_message, 'text'),
            $actions
        );
    }

    /**
     * @param array $config_sequence_message
     *
     * @return ConversationMultipleActionMessage
     */
    private static function loadMultipleActionMessageType($config_sequence_message)
    {
        $actions = [];

        $config_message_actions = Helper::get_array($config_sequence_message, 'actions');

        foreach ($config_message_actions as $config_message_action) {
            $type = Helper::get_array($config_message_action, 'type');
            if ($type === ConversationActionType::MESSAGE) {
                $actions[] = new ConversationMessageAction(
                    Helper::get_array($config_message_action, 'label'),
                    Helper::get_array($config_message_action, 'data')
                );
            } elseif ($type === ConversationActionType::POSTBACK) {
                $actions[] = new ConversationPostbackAction(
                    Helper::get_array($config_message_action, 'label'),
                    Helper::get_array($config_message_action, 'data'),
                    Helper::get_array($config_message_action, 'text', null)
                );
            } elseif ($type === ConversationActionType::URL) {
                $actions[] = new ConversationUrlAction(
                    Helper::get_array($config_message_action, 'label'),
                    new URI(Helper::get_array($config_message_action, 'data'))
                );
            }
        }

        $imageUrl = empty(Helper::get_array($config_sequence_message,
            'imageUrl')) ? null : new URL(Helper::get_array($config_sequence_message, 'imageUrl'));

        return new ConversationMultipleActionMessage(
            Helper::get_array($config_sequence_message, 'title'),
            Helper::get_array($config_sequence_message, 'text'),
            $imageUrl,
            $actions
        );
    }

    /**
     * @param array $config_sequence_message
     *
     * @return ConversationStickerMessage
     */
    private static function loadStickerMessageType($config_sequence_message)
    {
        return new ConversationStickerMessage(
            Helper::get_array($config_sequence_message, 'package_id'),
            Helper::get_array($config_sequence_message, 'sticker_id')
        );
    }
}
