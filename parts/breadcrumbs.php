<div class="topic_path clearfix">
  <ul>
    <li><a href="<?php bloginfo('siteurl'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/icon_home01.png.png" alt=""></a> &gt; </li>
    <li>
    	<?php 
    		$categories = get_the_category();
			if ( ! empty( $categories ) ) {
			    echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
			}
 		?>&gt;
    </li>
    <li>ルミネーションよりも私を見て？星屑宿るまぶたとほっぺの輝きメイク How to</li>
  </ul>
</div>