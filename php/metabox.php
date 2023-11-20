<?php

/**
 * Registers the meta field for the course post subtitle.
 *
 * This function is responsible for registering the meta field '_blocks_course_post_subtitle'
 * for the 'post' post type. It defines the data type as string and allows a single value.
 * The meta field is also shown in the REST API response and is sanitized using the 'sanitize_text_field' function.
 * The authentication callback ensures that only users with the 'edit_posts' capability can access this meta field.
 */


function blocks_course_register_meta()
{
    register_meta('post', '_blocks_course_post_subtitle', array(
        'single' => true,
        'type' => 'string',
        'show_in_rest' => true,
        'sanitize_callback' => 'sanitize_text_field',
        'auth_callback' => function () {
            return current_user_can('edit_posts');
        }
    ));
}

add_action('init', 'blocks_course_register_meta');

function blocks_course_add_meta_box()
{
    add_meta_box(
        'blocks_course_post_options_metabox',
        'Post Options',
        'blocks_course_post_options_metabox_html',
        'post',
        'normal',
        'default',
        array('__back_compat_meta_box' => true, '__block_editor_compatible_meta_box' => true)
    );
}

add_action('add_meta_boxes', 'blocks_course_add_meta_box');

function blocks_course_post_options_metabox_html($post)
{
    $subtitle = get_post_meta($post->ID, '_blocks_course_post_subtitle', true);
    wp_nonce_field('blocks_course_update_post_metabox', 'blocks_course_update_post_nonce');
?>
    <p>
        <label for="blocks_course_post_subtitle_field"><?php esc_html_e('Post Subtitle', 'blocks_course'); ?></label>
        <br />
        <input class="widefat" type="text" name="blocks_course_post_subtitle_field" id="blocks_course_post_subtitle_field" value="<?php echo esc_attr($subtitle); ?>" />
    </p>
<?php
}

function blocks_course_save_post_metabox($post_id, $post)
{

    $edit_cap = get_post_type_object($post->post_type)->cap->edit_post;
    if (!current_user_can($edit_cap, $post_id)) {
        return;
    }
    if (!isset($_POST['blocks_course_update_post_nonce']) || !wp_verify_nonce($_POST['blocks_course_update_post_nonce'], 'blocks_course_update_post_metabox')) {
        return;
    }

    if (array_key_exists('blocks_course_post_subtitle_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_blocks_course_post_subtitle',
            sanitize_text_field($_POST['blocks_course_post_subtitle_field'])
        );
    }
}

add_action('save_post', 'blocks_course_save_post_metabox', 10, 2);
