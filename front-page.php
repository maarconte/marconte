
<?php get_header(); ?>
<div id="homepage" class=" content-area slide">
    <div class="site-branding align-self-center">
        <h1><?php bloginfo('name'); ?></h1>
        <h2 class="text-gradient"><?php bloginfo('description'); ?></h2>
    </div>
    <a href="#portfolio" class="portfolio vertical-text align-self-center mx-auto"><h5 class="portfolio">portfolio</h5></a>
</div>
<div id="portfolio" class="content-area slide">
 <?php 

$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'portfolios'
));

if( $posts ): ?>
	<div class="container">
	<ul class="row">
		
	<?php foreach( $posts as $post ): 
		
		setup_postdata( $post );
		
		?>
        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');?>
		<li class="list_projet col-3" style="background-image:url(<?php echo $featured_img_url ?>)">
           
			<a href="#" style="background-image:url(<?php echo $featured_img_url ?>)"></a>
		</li>
	
	<?php endforeach; ?>	
	</ul>
    </div>	
	<?php wp_reset_postdata(); ?>

<?php endif; ?>
</div>