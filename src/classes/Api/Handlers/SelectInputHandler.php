<?php
/**
 * Repeater Handler class
 *
 * @package notification
 */

namespace BracketSpace\Notification\Api\Handlers;

/**
 * RepeaterHandler class
 *
 * @action
 */
class SelectInputHandler {

	/**
	 * Sends response
	 *
	 * @since [Next]
	 * @param \WP_REST_Request $request WP request instance.
	 * @return void
	 */
	public function send_response( \WP_REST_Request $request ) {
		$params    = $request->get_params();
		$carrier   = $params['carrier'];
		$type      = $params['type'];
		$recipient = notification_get_recipient( $carrier, $type );

		$input = $recipient->input();

		$data['options']        = $input->options;
		$data['pretty']         = $input->pretty;
		$data['label']          = $input->label;
		$data['checkbox_label'] = $input->checkbox_label;
		$data['name']           = $input->name;
		$data['description']    = $input->description;
		$data['section']        = $input->section;
		$data['disabled']       = $input->disabled;
		$data['css_class']      = $input->css_class;
		$data['id']             = $input->id;
		$data['placeholder']    = $input->placeholder;
		$data['type']           = strtolower( str_replace( 'Field', '', $input->field_type_html ) );

		notification_ajax_handler()->success( $data );
	}

}
