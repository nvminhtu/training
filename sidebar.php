<?php 
  /*****
  ***** Sidebar for all sub and under pages
  *****/ 
?>
<div id="navi" class="navi clearfix">
  <?php dynamic_sidebar( 'Sidebar Widget Top' ); ?>
  <div id="s_navi">
  	<?php dynamic_sidebar( 'Sidebar Widget Bottom' ); ?>
  </div>
<!-- end : #navi --> </div>