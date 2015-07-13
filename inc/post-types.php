<?php
/**
 * File for registering custom post types.
 *
 * @package    Directory
 * @subpackage Includes
 * @since      1.0.0
 * @author     Marty Helmick <info@martyhelmick.com>
 * @copyright  Copyright (c) 2013 - 2014, Marty Helmick
 * @link       https://github.com/m-e-h/doc-directory
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */


add_action('init', 'doc_employees_register_post_types');



function doc_employees_register_post_types() {

# Register the Employee post type.
    register_extended_post_type('employee', array(

        'enter_title_here' => 'Employee Name',
        'menu_icon'           => 'dashicons-id',

        # Add some custom columns to the admin screen:
        'admin_cols' => array(
            'featured_image' => array(
                'title'          => 'Profile Pic',
                'featured_image' => 'thumbnail',
            ),
        ),
    ));




# Register the Department post type.
    register_extended_post_type('department', array(

        'enter_title_here' => 'Department Name',
        'menu_icon'           => 'dashicons-groups',

        # Add some custom columns to the admin screen:
        'admin_cols' => array(
            'featured_image' => array(
                'featured_image' => 'thumbnail'
            ),
            'agency' => array(
                'title'          => 'Agencies',
                'taxonomy' => 'agency'
            ),
        ),

        # Add a dropdown filter to the admin screen:
        'admin_filters' => array(
            'agency' => array(
                'taxonomy' => 'agency'
            ),
        ),

    ));




# Register the Document post type.
    register_extended_post_type('document', array(

        'enter_title_here' => 'Document Title',
        'menu_icon'           => 'dashicons-portfolio',

        # Add some custom columns to the admin screen:
        'admin_cols' => array(
            'published' => array(
                'title'       => 'Published',
                'meta_key'    => 'published_date',
                'date_format' => 'd/m/Y'
            ),
        ),
    ));




# Register the Parish post type.
    register_extended_post_type('parish', array(

        'enter_title_here' => 'Parish Name',
        'menu_icon'           => 'dashicons-book-alt',

        # Add some custom columns to the admin screen:
        'admin_cols' => array(
            'featured_image' => array(
                'featured_image' => 'thumbnail',
            ),
        ),
    ));
}
