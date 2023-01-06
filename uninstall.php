<?php

if(!defined('WP_UNINSTALL_PLUGIN'))
{
    die;
}
//clear database stored data
//$books=get_posts(array('post_type'=>'book','numberposts'=>-1));
//foreach(books as book)
//{
    //wp_delete_post($book->ID,true);
//}


//access db via sql
global $wpdb;
$wpdb->query("delete from wp_posts where post_type='book'");
$wpdb->query("delete from wp_postmeta where post_id NOT IN (select id from wp_posts)");
$wpdb->query("delete from wp_term_relationships where object_id NOT IN (select id from wp_posts)");
