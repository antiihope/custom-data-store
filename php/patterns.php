<?php
function block_course_register_pattern_cat()
{
    register_block_pattern_category(
        'block-course',
        array('label' => 'Blocks Course', 'icon' => 'wordpress')
    );
}

add_action('init', 'block_course_register_pattern_cat');

function block_course_register_pattern()
{
    register_block_pattern(
        'block-course/my-patterns',
        array(
            'title' => 'My pattern',
            'description' => 'Some description',
            'categories' => array('blocks-course'),
            'keywords' => array('my pattern'),
            'content' => '<!-- wp:columns --><div class="wp-block-columns"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h2 class="wp-block-heading">Im pattern</h2><!-- /wp:heading --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>paragraph of pattern</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns -->'
        )
    );
}

add_action('init', 'block_course_register_pattern');
