<?php

namespace App;


class Breadcrumbs {
    private static $breadcrumbs = array(

        /*'/' => array(
            'Home' => '/',
        ),*/


        // ---------------------------------------------------------------------

        'admin' => array(
            'Home' => '/admin',
        ),

        'admin/users' => array(
            'Home' => '/admin',
            'Users' => null,
        ),

        // ---------------------------------

        'admin/roles' => array(
            'Home' => '/admin',
            'Roles' => null,
        ),

        'admin/roles/create' => array(
            'Home' => '/admin',
            'Roles' => '/admin/role',
            'Create role' => null,
        ),

        // ---------------------------------


        'admin/permissions' => array(
            'Home' => '/admin',
            'Permissions' => null,
        ),

        'admin/permissions/create' => array(
            'Home' => '/admin',
            'Permissions' => '/admin/permissions',
            'Create permission' => null,
        ),

        // ---------------------------------

        'admin/posts' => array(
            'Home' => '/admin',
            'Posts' => null,
        ),

        'admin/posts/create' => array(
            'Home' => '/admin',
            'Posts' => '/admin/posts',
            'Create post' => null,
        ),

        // ---------------------------------


    );

    public static function get($url){

        if($url && isset(static::$breadcrumbs[$url])){
            return static::$breadcrumbs[$url];
        } else{
            return array();
        }
    }
}
