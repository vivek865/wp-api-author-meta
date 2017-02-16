 function slug_show_author_meta( $object ) {
       $post_author = (int) $object['author'];
        $array_data = array();
        $array_data['email'] = get_the_author_meta('email');
        $array_data['avtar'] = get_avatar_url($post_author);

        $array_data['user_nicename'] = get_the_author_meta('user_nicename');

        $array_data['first_name'] = get_user_meta($post_author, 'first_name', true);

        $array_data['last_name'] = get_user_meta('$post_author', 'last_name', true);

        $array_data['nickname'] = get_user_meta($post_author, 'nickname', true);

        return array_filter($array_data);
    }

    function author_meta() {

    register_rest_field('post', 'author_meta', [
        'get_callback'    => 'slug_show_author_meta',
        'update_callback' => 'null',
        'schema'          => 'null',
    ]);

}
add_action('rest_api_init', 'author_meta');
