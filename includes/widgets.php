<?php
/***
*** @widgets for wordpress
***/

// 01. Add widget 01
function footer_widget_one()
 {
	 register_sidebar(array(
	  'name' => 'Footer Menu 1',
	  'class' => '',
	  'description' => 'This is Footer Widget one',
	  'before_title' => '<dt>',
	  'after_title' => '</dt><dd>',
	  'before_widget' => '<dl>',
	  'after_widget' => '</dd></dl>',
	 ));
 }
add_action('widgets_init', 'footer_widget_one');

// 02. Add widget 02
function footer_widget_two()
 {
	 register_sidebar(array(
	  'name' => 'Footer Menu 2',
	  'class' => 'flink flink02 clearfix',
	  'description' => 'This is Footer Widget two',
	  'before_title' => '<dt>',
	  'after_title' => '</dt><dd>',
	  'before_widget' => '<dl>',
	  'after_widget' => '</dd></dl>',
	 ));
 }
add_action('widgets_init', 'footer_widget_two');

// 03. Add widget 03
function footer_widget_three()
 {
	 register_sidebar(array(
	  'name' => 'Footer Menu 3',
	  'class' => 'flink flink03 clearfix',
	  'description' => 'This is Footer Widget three',
	  'before_title' => '<dt>',
	  'after_title' => '</dt><dd>',
	  'before_widget' => '<dl>',
	  'after_widget' => '</dd></dl>',
	 ));
 }
add_action('widgets_init', 'footer_widget_three');

// 03. Add widget 04
function footer_widget_fourth() {
	 register_sidebar(array(
	  'name' => 'Footer Menu 4',
	  'class' => 'fcol fcol04 clearfix',
	  'description' => 'This is Footer Widget fourth',
	  'before_title' => '<dt>',
	  'after_title' => '</dt><dd>',
	  'before_widget' => '<dl>',
	  'after_widget' => '</dd></dl>',
	 ));
 }
add_action('widgets_init', 'footer_widget_three');

// 03. Add widget Bottom
function footer_widget_bottom() {
	 register_sidebar(array(
	  'name' => 'Footer Menu Bottom',
	  'class' => 'flink01 clearfix',
	  'description' => 'This is Footer Widget at Bottom',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '<div class="flink01 clearfix">',
	  'after_widget' => '</div>',
	 ));
 }
 add_action('widgets_init', 'footer_widget_bottom');

// 03. Add widget Sidebar
function sidebar_widget()
{
	register_sidebar(array(
	  'name' => 'Sidebar Widget',
	  'class' => '',
	  'description' => 'This is sidebar Widget',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '<div class="cwidget-sidebar">',
	  'after_widget' => '</div>',
	 ));
 }
add_action('widgets_init', 'sidebar_widget');

// >> add [widget title] to prevent it display on
function flexible_widget_titles( $widget_title ) {
  // get rid of any leading and trailing spaces
  $title = trim( $widget_title );
  // check the first and last character, if [ and ] set the title to empty
  if ( $title[0] == '[' && $title[strlen($title) - 1] == ']' ) $title = '';
    return $title;
}
add_filter( 'widget_title', 'flexible_widget_titles' );
