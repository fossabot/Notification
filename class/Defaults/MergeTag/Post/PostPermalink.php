<?php
/**
 * Post permalink merge tag
 *
 * Requirements:
 * - Trigger property of the post type slug with WP_Post object
 *
 * @package notification
 */

namespace underDEV\Notification\Defaults\MergeTag\Post;

use underDEV\Notification\Defaults\MergeTag\IntegerTag;


/**
 * Post permalink merge tag class
 */
class PostPermalink extends IntegerTag {

	/**
	 * Post Type slug
	 *
	 * @var string
	 */
	protected $post_type;

	/**
     * Merge tag constructor
     *
     * @since [Next]
     * @param array $params merge tag configuration params.
     */
    public function __construct( $params = array() ) {

    	if ( isset( $params['post_type'] ) ) {
    		$this->post_type = $params['post_type'];
    	} else {
    		$this->post_type = 'post';
    	}

    	$args = wp_parse_args( $params, array(
			'slug'        => $this->post_type . '_permalink',
			// translators: singular post name.
			'name'        => sprintf( __( '%s permalink' ), $this->get_nicename() ),
			'description' => __( 'https://example.com/hello-world/' ),
			'example'     => true,
			'resolver'    => function() {
				return get_permalink( $this->trigger->{ $this->post_type }->ID );
			},
		) );

    	parent::__construct( $args );

	}

	/**
	 * Function for checking requirements
	 *
	 * @return boolean
	 */
	public function check_requirements() {
		return isset( $this->trigger->{ $this->post_type }->ID );
	}

	/**
	 * Gets nice, translated post name
	 *
	 * @since  [Next]
	 * @return string post name
	 */
	public function get_nicename() {
		return get_post_type_object( $this->post_type )->labels->singular_name;
	}

}
