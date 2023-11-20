<?php

function blocks_course_register_template()
{
    $post_type_object = get_post_type_object('post');
    $post_type_object->template = array(
        array('block-course/metadata-block'),
    );
}

add_action('init', 'blocks_course_register_template');
