<ul class="social_listing">
	<li><!-- #facebook like -->
		<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="false"></div>
	<!-- facebook like --></li>
	<li><!-- #facebook share -->
		<div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.groovoost.com%2F&amp;src=sdkpreparse">Share</a></div>
	<!-- facebook share --></li>
	<li><!-- #Twitter Share -->
		<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;related=LIG_J" target="_blank" class="single-sns single-sns-item single-sns-twitter">
		 <img src="<?php bloginfo('template_url'); ?>/images/social/twitter-small-icon.png" alt="Facebook Share">
		</a>
	<!-- #Twitter share --></li>
	<li><!-- #Hatena -->
		<a href="http://b.hatena.ne.jp/add?url=<?php the_permalink(); ?>" target="_blank" class="single-sns single-sns-item single-sns-hatena">
			<img src="<?php bloginfo('template_url'); ?>/images/social/hatena-icon.png" alt="Facebook Share">
		</a>
	<!-- Hatena --></li>
</ul>