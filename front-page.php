<?php get_header();?>
<div id="homepage" class=" content-area slide">
    <div class="site-branding align-self-center">
        <h1><?php bloginfo('name');?></h1>
        <h2 class="text-gradient"><?php bloginfo('description');?></h2>
    </div>
    <a href="#portfolio" class="portfolio slide-link vertical-text align-self-center "><h5 class="portfolio">portfolio</h5></a>
</div>
<!-- Portfolio -->
<div id="portfolio" class="content-area slide">
     <a href="#homepage" class="slide-link vertical-text align-self-center "><h5 class="portfolio">Home</h5></a>
 <?php
$posts = get_posts(array(
    'posts_per_page' => -1,
    'post_type' => 'portfolios',
));

if ($posts): ?>
<div class="tab-content">
    <?php
$i = 0;
foreach ($posts as $post):
    setup_postdata($post);?>
	    <div class="tab-pane <?php if ($i == 0) {echo 'active';}?>" id="post-<?php the_ID();?>" role="tabpanel">
	        <div class="row">
                <div class="resize col-md-3 portfolio_txt">
                    <h3 class="text-gradient "> <?php the_title()?></h3>
                    <h5>Client</h5>
                    <?php the_field("client");?>
                    <h5>Mission</h5>
                    <?php the_field("mission");?>
                    <?php
                    $cats = get_the_category($id);
                    if ($cats) {
                        foreach ($cats as $cat): ?>
                            <span  class="badge-cat badge badge-pill badge-light">
                            <?php echo $cat->name; ?>
                            </span>
                        <?php endforeach;}?>
                    <?php
                    $posttags = get_the_tags();
                        if ($posttags) {
                            foreach ($posttags as $tag) {?>
                             <span class="badge-tag badge badge-pill badge-light"><?php echo $tag->name . ' '; ?></span>
                            <?php }
                        }?>
                </div>
                <div class="resize col-md-9 d-flex align-items-center portfolio_slider">
                <?php
                $images = get_field('galerie');
                if ($images): ?>
                    <div id="carousel-<?php the_ID();?>" class="carousel mx-auto " data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php
                            $j = 0;
                            foreach ($images as $image): ?>
                                <li data-target="#carousel-<?php the_ID();?>" data-slide-to="<?php echo $j ?>" class="<?php if ($j == 0 ) {echo 'active';}?>">O</li>
                            <?php
                                $j++;
                            endforeach;?>
                        </ol>
                        <div id="slider" class="carousel-inner" role="listbox">
                            <?php
                            $k = 0 ;
                            foreach ($images as $image): ?>
                                <div div class="carousel-item <?php if ($k == 0 ) {echo 'active';}?>">
                                    <img class="d-block " src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?> <?php echo $k ?>" />
                                </div>
                            <?php
                                $k++;
                            endforeach;?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
    <?php
    $i++;
endforeach;?>
</div>

<div class="container">
	<ul class="row nav nav-tabs" role="tablist">
	<?php foreach ($posts as $post):
    setup_postdata($post);
    ?>
	        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');?>
			<li class="list_projet col-3 nav-item" style="background-image:url(<?php echo $featured_img_url ?>)">
				<a class="nav-link align-self-center <?php if ($i == 0) {echo 'active';}?>" data-toggle="tab"  role="tab" href="#post-<?php the_ID();?>" ><?php the_title()?></a>
			</li>
		<?php endforeach;?>
	</ul>
</div>
<?php wp_reset_postdata();?>
<?php endif;?>
</div>