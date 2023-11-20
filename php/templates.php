<?php

function blocks_course_register_template()
{
    $post_type_object = get_post_type_object('post');
    if ($post_type_object) {
        $post_type_object->template_lock = 'all';
        $post_type_object->template = array(
            array('block-course/metadata-block'),
            array('core/paragraph', array(
                'content' => 'This is a paragraph block',
            )),
            array(
                'block-course/team-members',
                array('columns' => 3),
                array(
                    array(
                        'block-course/team-member',
                        array(
                            'name' => 'jane doe',
                            'bio' => 'designer',
                            'url' => 'https://source.unsplash.com/500x400/?portrait'
                        )
                    ),
                    array(
                        'block-course/team-member',
                        array(
                            'name' => 'jane doe',
                            'bio' => 'designer',
                            'url' => 'https://source.unsplash.com/500x400/?portrait'
                        )
                    ),
                    array(
                        'block-course/team-member',
                        array(
                            'name' => 'jane doe',
                            'bio' => 'designer',
                            'url' => 'https://source.unsplash.com/500x400/?portrait'
                        )
                    ),
                )
            )
        );
    } else {
        error_log('Post type "post" not found.');
    }
}

// add_action('init', 'blocks_course_register_template');
