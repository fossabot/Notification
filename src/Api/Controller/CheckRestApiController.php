<?php
/**
 * REST api check controller class
 *
 * @package notification
 */

namespace BracketSpace\Notification\Api\Controller;

use BracketSpace\Notification\Dependencies\Micropackage\Ajax\Response;

/**
 * REST api check controller class
 */
class CheckRestApiController {

	/**
	 * Sends response
	 *
	 * @since [Next]
	 * @return void
	 */
	public function send_response() {
		$response = new Response();
		$response->send( 'RestApi' );
	}
}
