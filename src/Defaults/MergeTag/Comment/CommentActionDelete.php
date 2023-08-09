<?php

/**
 * Comment action delete URL merge tag
 *
 * @package notification
 */

declare(strict_types=1);

namespace BracketSpace\Notification\Defaults\MergeTag\Comment;

use BracketSpace\Notification\Defaults\MergeTag\UrlTag;
use BracketSpace\Notification\Utils\WpObjectHelper;

/**
 * Comment action delete URL merge tag class
 */
class CommentActionDelete extends UrlTag
{
	/**
	 * Trigger property to get the comment data from
	 *
	 * @var string
	 */
	protected $commentType = 'comment';

	/**
	 * Merge tag constructor
	 *
	 * @param array<mixed> $params merge tag configuration params.
	 * @since 5.0.0
	 */
	public function __construct($params = [])
	{

		if (isset($params['comment_type']) && !empty($params['comment_type'])) {
			$this->commentType = $params['comment_type'];
		}

		$this->setTriggerProp($params['property_name'] ?? $this->commentType);

		$commentTypeName = WpObjectHelper::getCommentTypeName($this->commentType);

		$args = wp_parse_args(
			$params,
			[
				'slug' => 'comment_delete_action_url',
				// Translators: Comment type name.
				'name' => sprintf(__('%s delete URL', 'notification'), $commentTypeName),
				// Translators: comment type actions text.
				'group' => sprintf(__('%s actions', 'notification'), $commentTypeName),
				'resolver' => function ($trigger) {
					return admin_url(
						"comment.php?action=delete&c={$trigger->{$this->getTriggerProp()}->comment_ID}#wpbody-content"
					);
				},
			]
		);

		parent::__construct($args);
	}
}
