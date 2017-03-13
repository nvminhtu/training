<?php
/***
*** @widgets for wordpress
***/

// 01. Add widget 01
function footer_widget_one()
 {
	register_sidebar(array(
	  'id' => 'footer-menu-1',
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
	  'id' => 'footer-menu-2',
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
	  'id' => 'footer-menu-3',
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
	  'id' => 'footer-menu-4',
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

// ----------------- 04. Add widget Bottom -----------------------
function footer_widget_bottom() {
	 register_sidebar(array(
	  'id' => 'footer-menu-bottom',
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

// ----------------- 05. Add widget Bottom -----------------------
function footer_copyright_bottom() {
	 register_sidebar(array(
	  'id' => 'footer-copyright-bottom',
	  'name' => 'Footer Copyright Bottom',
	  'class' => '',
	  'description' => 'This is Copyright Widget at Bottom',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '',
	  'after_widget' => '',
	 ));
 }
 add_action('widgets_init', 'footer_copyright_bottom');


// ----------------- 06. Add widget Sidebar Top -----------------------
function sidebar_widget_top() {
	register_sidebar(array(
	  'id' => 'sidebar-widget-top',
	  'name' => 'Sidebar Widget Top',
	  'class' => '',
	  'description' => 'This is sidebar Widget',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '<div class="cwidget-sidebar">',
	  'after_widget' => '</div>',
	 ));
 }
add_action('widgets_init', 'sidebar_widget_top');

// ----------------- 07. Add widget Sidebar Botto,-----------------------
function sidebar_widget_bottom() {
	register_sidebar(array(
	  'id' => 'sidebar-widget-bottom',
	  'name' => 'Sidebar Widget Bottom',
	  'class' => '',
	  'description' => 'This is sidebar Widget',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '<div class="cwidget-sidebar">',
	  'after_widget' => '</div>',
	 ));
 }
add_action('widgets_init', 'sidebar_widget_bottom');

function sidebar_widget() {
	register_sidebar(array(
	  'id' => 'sidebar-widget',
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
// ----------------- 08. Add homepage widget <top & bottom> -----------------------
function homepage_widget_top() {
	register_sidebar(array(
	  'id' => 'homepage-widget-top',
	  'name' => 'Homepage Widget Top',
	  'class' => '',
	  'description' => 'This is Homepage Widget',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '<div class="cwidget-sidebar">',
	  'after_widget' => '</div>',
	 ));
}
add_action('widgets_init', 'homepage_widget_top');

function homepage_widget_bottom() {
	register_sidebar(array(
	  'id' => 'homepage-widget-bottom',
	  'name' => 'Homepage Widget Bottom',
	  'class' => '',
	  'description' => 'This is Homepage Widget',
	  'before_title' => '',
	  'after_title' => '',
	  'before_widget' => '<div class="cwidget-sidebar">',
	  'after_widget' => '</div>',
	 ));
}
add_action('widgets_init', 'homepage_widget_bottom');

// ----------------- 07. Custom code for removing wrap symbol -----------------------
// >> add [widget title] to prevent it display on
function flexible_widget_titles( $widget_title ) {
  // get rid of any leading and trailing spaces
  $title = trim( $widget_title );
  // check the first and last character, if [ and ] set the title to empty
  if ( $title[0] == '[' && $title[strlen($title) - 1] == ']' ) $title = '';
    return $title;
}
add_filter( 'widget_title', 'flexible_widget_titles' );