<?php
/**
 * Deprecated functions
 *
 * @package notification
 */

use BracketSpace\Notification\Admin\Wizard;
use BracketSpace\Notification\Core\Templates;
use BracketSpace\Notification\Interfaces;
use BracketSpace\Notification\Register;
use BracketSpace\Notification\Store;
use BracketSpace\Notification\Vendor\Micropackage\DocHooks\Helper as DocHooksHelper;
use BracketSpace\Notification\Queries\NotificationQueries;

/**
 * Gets the plugin Runtime.
 *
 * @deprecated 7.0.0 New Notification static class should be used.
 * @param      string $property Optional property to get.
 * @return     object           Runtime class instance
 */
function notification_runtime( $property = null ) {
	_deprecated_function( __FUNCTION__, '7.0.0', '\Notification' );

	if ( null !== $property ) {
		return Notification::component( $property );
	}

	return Notification::runtime();
}

/**
 * Checks if notification post has been just started
 *
 * @since  5.0.0
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  mixed $post Post ID or WP_Post.
 * @return boolean     True if notification has been just started
 */
function notification_is_new_notification( $post ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_post_is_new' );
	return notification_post_is_new( $post );
}

/**
 * Registers notification
 *
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  Interfaces\Sendable $notification Carrier object.
 * @return void
 */
function register_notification( Interfaces\Sendable $notification ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_register_carrier' );
	notification_register_carrier( $notification );
}

/**
 * Gets all registered notifications
 *
 * @since  5.0.0
 * @deprecated 6.0.0 Changed name for consistency.
 * @return array notifications
 */
function notification_get_notifications() {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_get_carriers' );
	return notification_get_carriers();
}

/**
 * Gets single registered notification
 *
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  string $notification_slug notification slug.
 * @return mixed                     notification object or false
 */
function notification_get_single_notification( $notification_slug ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_get_carrier' );
	return notification_get_carrier( $notification_slug );
}

/**
 * Registers trigger
 * Uses notification/triggers filter
 *
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  Interfaces\Triggerable $trigger trigger object.
 * @return void
 */
function register_trigger( Interfaces\Triggerable $trigger ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_register_trigger' );
	notification_register_trigger( $trigger );
}

/**
 * Gets single registered recipient for notification type
 *
 * @since  5.0.0
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  string $carrier_slug   Carrier slug.
 * @param  string $recipient_slug Recipient slug.
 * @return mixed                  Recipient object or false
 */
function notification_get_single_recipient( $carrier_slug, $recipient_slug ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_get_recipient' );
	return notification_get_recipient( $carrier_slug, $recipient_slug );
}

/**
 * Gets register recipients for notification type
 *
 * @since  5.0.0
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  string $carrier_slug Carrier slug.
 * @return array                Recipients array
 */
function notification_get_notification_recipients( $carrier_slug ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_get_carrier_recipients' );
	return notification_get_carrier_recipients( $carrier_slug );
}

/**
 * Gets single registered trigger
 *
 * @since  5.0.0
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  string $trigger_slug trigger slug.
 * @return mixed                trigger object or false
 */
function notification_get_single_trigger( $trigger_slug ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_get_trigger' );
	return notification_get_trigger( $trigger_slug );
}

/**
 * Registers recipient
 * Uses notification/recipients filter
 *
 * @deprecated 6.0.0 Changed name for consistency.
 * @param  string                $carrier_slug Carrier slug.
 * @param  Interfaces\Receivable $recipient    Recipient object.
 * @return void
 */
function register_recipient( $carrier_slug, Interfaces\Receivable $recipient ) {
	_deprecated_function( __FUNCTION__, '6.0.0', 'notification_register_recipient' );
	notification_register_recipient( $carrier_slug, $recipient );
}

/**
 * Adds handlers for doc hooks to an object
 *
 * @since      5.2.2
 * @deprecated 7.0.0 Use `the micropackage/dochooks` package.
 * @param      object $object Object to create the hooks.
 * @return     object
 */
function notification_add_doc_hooks( $object ) {
	_deprecated_function( __FUNCTION__, '7.0.0' );
	return DocHooksHelper::hook( $object );
}

/**
 * Checks if the DocHooks are enabled and working.
 *
 * @since      6.1.0
 * @deprecated 7.0.0 Use the `micropackage/dochooks` package.
 * @return     bool
 */
function notification_dochooks_enabled() {
	_deprecated_function( __FUNCTION__, '7.0.0' );
	return DocHooksHelper::is_enabled();
}

/**
 * Creates new View object.
 *
 * @since      6.0.0
 * @deprecated 7.0.0 Use Templates object.
 * @return     bool
 */
function notification_create_view() {
	_deprecated_function( __FUNCTION__, '7.0.0' );
	return false;
}

/**
 * Gets cached value or cache object
 *
 * @since      7.0.0
 * @deprecated [Next]
 * @return     null
 */
function notification_cache() {
	_deprecated_function( __FUNCTION__, '[Next]' );
	return null;
}


/**
 * Checks if the Wizard should be displayed.
 *
 * @since      6.3.0
 * @deprecated [Next]
 * @return     bool
 */
function notification_display_wizard() {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Admin\\Wizard::should_display' );

	return Wizard::should_display();
}

/**
 * Creates new AJAX Handler object.
 *
 * @since      6.0.0
 * @since      7.0.0 Using Ajax Micropackage.
 * @deprecated [Next]
 * @return     BracketSpace\Notification\Vendor\Micropackage\Ajax\Response
 */
function notification_ajax_handler() {
	_deprecated_function( __FUNCTION__, '[Next]' );

	return new BracketSpace\Notification\Vendor\Micropackage\Ajax\Response();
}

/**
 * Gets one of the plugin filesystems
 *
 * @since      7.0.0
 * @deprecated [Next]
 * @param      string $deprecated Filesystem name.
 * @return     BracketSpace\Notification\Vendor\Micropackage\Filesystem\Filesystem
 */
function notification_filesystem( $deprecated ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'Notification::fs()' );

	return \Notification::fs();
}

/**
 * Gets all notification posts with enabled trigger.
 *
 * @todo This function needs to be fixed because we are no longer storing
 *       the Trigger in Notification post meta.
 *
 * @since      6.0.0
 * @deprecated [Next]
 * @param      mixed $trigger_slug Trigger slug or null if all posts should be returned.
 * @param      bool  $all          If get all posts or just active.
 * @return     array
 */
function notification_get_posts( $trigger_slug = null, $all = false ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Queries\\NotificationQueries::all()' );

	return NotificationQueries::all( $all );
}

/**
 * Gets notification post by its hash.
 *
 * @since      6.0.0
 * @deprecated [Next]
 * @param      string $hash Notification unique hash.
 * @return     mixed        null or Notification object
 */
function notification_get_post_by_hash( $hash ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Queries\\NotificationQueries::with_hash()' );

	return NotificationQueries::with_hash( $hash );
}

/**
 * Checks if notification post has been just started
 *
 * @since      6.0.0 We are using Notification Post object.
 * @deprecated [Next]
 * @param      mixed $post Post ID or WP_Post.
 * @return     boolean     True if notification has been just started
 */
function notification_post_is_new( $post ) {
	_deprecated_function( __FUNCTION__, '[Next]' );

	/** @var BracketSpace\Notification\Defaults\Adapter\WordPress $notification */
	$notification = notification_adapt_from( 'WordPress', $post );
	return $notification->is_new();
}

/**
 * Prints the template
 * Wrapper for micropackage's template function
 *
 * @since      7.0.0
 * @deprecated [Next]
 * @param      string $template_name Template name.
 * @param      array  $vars          Template variables.
 *                                   Default: empty.
 * @return     void
 */
function notification_template( $template_name, $vars = [] ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Core\\Templates::render' );

	Templates::render( $template_name, $vars );
}

/**
 * Gets the template
 * Wrapper for micropackage's get_template function
 *
 * @since      7.0.0
 * @deprecated [Next]
 * @param      string $template_name Template name.
 * @param      array  $vars          Template variables.
 *                                   Default: empty.
 * @return     string
 */
function notification_get_template( $template_name, $vars = [] ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Core\\Templates::get' );

	return Templates::get( $template_name, $vars );
}

/**
 * Registers Carrier
 *
 * @since      6.0.0
 * @since      6.3.0 Uses Carrier Store.
 * @deprecated [Next]
 * @param      Interfaces\Sendable $carrier Carrier object.
 * @return     void
 */
function notification_register_carrier( Interfaces\Sendable $carrier ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Register::carrier' );

	Register::carrier( $carrier );
}

/**
 * Gets all registered Carriers
 *
 * @since      6.0.0
 * @since      6.3.0 Uses Carrier Store.
 * @deprecated [Next]
 * @return     array<string,Interfaces\Sendable>
 */
function notification_get_carriers() {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Store\\Carrier::all' );

	return Store\Carrier::all();
}

/**
 * Gets single registered Carrier
 *
 * @since      6.0.0
 * @deprecated [Next]
 * @param      string $carrier_slug Carrier slug.
 * @return     Interfaces\Sendable|null
 */
function notification_get_carrier( $carrier_slug ) {
	_deprecated_function( __FUNCTION__, '[Next]', 'BracketSpace\\Notification\\Store\\Carrier::get' );

	return Store\Carrier::get( $carrier_slug );
}
