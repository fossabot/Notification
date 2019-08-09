<?php
/**
 * Wizard class
 *
 * @package notification
 */

namespace BracketSpace\Notification\Admin;

use BracketSpace\Notification\Utils\View;

/**
 * Wizard class
 */
class Wizard {

	/**
	 * JSON relative path
	 *
	 * @var string
	 */
	protected $relative_json_path = '/inc/wizard/';

	/**
	 * JSON absolute path
	 *
	 * @var string
	 */
	protected $json_path;

	/**
	 * Wizard page hook.
	 *
	 * @var string
	 */
	public $page_hook = 'none';

	/**
	 * Wizard constructor
	 */
	public function __construct() {

		$this->set_variables();

	}

	/**
	 * Set Library variables
	 *
	 * @return void
	 */
	public function set_variables() {

		$this->json_path = dirname( dirname( dirname( __FILE__ ) ) ) . $this->relative_json_path;

	}

	/**
	 * Register Wizard page under plugin's menu.
	 *
	 * @action admin_menu 30
	 *
	 * @return void
	 */
	public function register_page() {

		$this->page_hook = add_submenu_page(
			'edit.php?post_type=notification',
			'',
			__( 'Wizard', 'notification' ),
			'manage_options',
			'wizard',
			[ $this, 'wizard_page' ]
		);

	}

	/**
	 * Redirects the user to wizard screen.
	 *
	 * @return void
	 */
	public function maybe_redirect() {

		if ( ! notification_display_story() ) {
			return;
		}

		$screen = get_current_screen();

		if ( isset( $screen->post_type ) && 'notification' === $screen->post_type && 'notification_page_wizard' !== $screen->id ) {
			wp_safe_redirect( admin_url( 'edit.php?post_type=notification&page=wizard' ) );
			exit;
		}

	}

	/**
	 * Displays the Wizard page.
	 *
	 * @return void
	 */
	public function wizard_page() {

		$view = notification_create_view();
		$view->set_var( 'sections', $this->get_settings() );
		$view->get_view( 'wizard' );

	}

	/**
	 * Gets settings for Wizard page.
	 *
	 * @return array List of settings groups.
	 */
	public function get_settings() {

		return array(
			array(
				'name'  => __( 'Common Notifications', 'notification' ),
				'items' => array(
					array(
						'name'        => __( 'Post published', 'notification' ),
						'slug'        => 'post_published_admin',
						'description' => __( 'An email to administrator when post is published', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Administrator', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Post published', 'notification' ),
						'slug'        => 'post_published_subscribers',
						'description' => __( 'An email to all Subscribers when post is published', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Subscribers (role)', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Post pending review', 'notification' ),
						'slug'        => 'post_review',
						'description' => __( 'An email to administrator when post has been sent for review', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Administrator', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Post updated', 'notification' ),
						'slug'        => 'post_updated',
						'description' => __( 'An email to administrator when post is updated', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Administrator', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Welcome email', 'notification' ),
						'slug'        => 'welcome_email',
						'description' => __( 'An email to registered user', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'User', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Comment added', 'notification' ),
						'slug'        => 'comment_added',
						'description' => __( 'An email to post author about comment to his article', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Post author', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Comment reply', 'notification' ),
						'slug'        => 'comment_reply',
						'description' => __( 'An email to comment autor about the reply', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Comment author', 'notification' ),
							),
						),
					),
				),
			),
			array(
				'name'  => __( 'WordPress emails', 'notification' ),
				'items' => array(
					array(
						'name'        => __( 'New user', 'notification' ),
						'slug'        => 'new_user',
						'description' => __( 'An email to administrator when new user is created', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Administrator', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Your account', 'notification' ),
						'slug'        => 'your_account',
						'description' => __( 'An email to registered user, with password reset link', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'User', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Password reset request', 'notification' ),
						'slug'        => 'password_forgotten',
						'description' => __( 'An email to user when password reset has been requested', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'User', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Password reset', 'notification' ),
						'slug'        => 'password_reset',
						'description' => __( 'An email with info that password has been reset', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'User', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Comment awaiting moderation', 'notification' ),
						'slug'        => 'comment_moderation',
						'description' => __( 'An email to administrator and post author that comment is awaiting moderation', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Administrator', 'notification' ),
							),
							array(
								'name' => __( 'Post author', 'notification' ),
							),
						),
					),
					array(
						'name'        => __( 'Comment has been published', 'notification' ),
						'slug'        => 'comment_published',
						'description' => __( 'An email to post author that comment has been published', 'notification' ),
						'recipients'  => array(
							array(
								'name' => __( 'Post author', 'notification' ),
							),
						),
					),
				),
			),
		);

	}

	/**
	 * Saves Wizard settings.
	 *
	 * @action admin_post_save_notification_wizard
	 *
	 * @return void
	 */
	public function save_settings() {

		$data = $_POST; // phpcs:ignore

		if ( wp_verify_nonce( $data['_wpnonce'], 'notification_wizard' ) === false ) {
			wp_die( 'Can\'t touch this' );
		}

		$notifications = isset( $data['notification_wizard'] ) ? $data['notification_wizard'] : [];
		$this->add_notifications( $notifications );

		wp_safe_redirect( admin_url( 'edit.php?post_type=notification' ) );
		exit;

	}

	/**
	 * Adds predefined notifications.
	 *
	 * @action admin_post_save_notification_wizard
	 *
	 * @param  array $notifications List of notifications template slugs.
	 * @return void
	 */
	private function add_notifications( $notifications ) {

		foreach ( $notifications as $notify_slug ) {

			$json_path = $this->json_path . $notify_slug . '.json';
			if ( ! is_readable( $json_path ) ) {
				continue;
			}

			$json         = file_get_contents( $json_path ); // phpcs:ignore
			$json_adapter = notification_adapt_from( 'JSON', $json );
			$wp_adapter   = notification_swap_adapter( 'WordPress', $json_adapter );
			$wp_adapter->save();

		}

	}

}
