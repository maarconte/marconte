<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package marconte
 */

$home_background = get_field('home_background', 'option');

$about_bio = get_field('about-bio', 'option');
$about_txt = get_field('bio-text', 'option');
$about_img = get_field('about-image', 'option');

$email = get_field('email', 'option');
$loc = get_field('localisation', 'option');

$service_bgc = get_field('services-background', 'option');

$contact_title = get_field('contact_title', 'option');
$contact_form = get_field('contact_form', 'option');
$contact_background = get_field('contact_background', 'option');

$site_title = get_bloginfo('name');
$site_description = get_bloginfo('description');

get_header();?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div id="fullpage" class="wrapper">
            <section id="section-home"class="section"style="background-image: url('<?php echo $home_background['url']; ?>')">
                <div class="jumbotron">
                    <div class="container text-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/marconte_logo.svg" alt="marconte" class="mb-3" style="width:200px;">
                        <h1><?=$site_title?></h1>
                        <h2><?=$site_description?></h2>
                    </div>
                 </div>
            </section>
            <section id="section-services"class="section">
                <div class="top" style="background-image: url('<?php echo $service_bgc['url']; ?>')">
                    <div class="title d-flex align-items-center justify-content-center">
                        <h2 class="text-center">Préstations</h2>
                    </div>
                    <ul class="nav nav-tabs service-tabs row" id="myTab" role="tablist">
                    <?php if (have_rows('social', 'option')):
                    // loop through the rows of data
                    $i = 0;
                        while (have_rows('service', 'option')): the_row();?>
                            <li class="nav-item col-4">
                                <a class="nav-link text-center <?php if ($i == 0): ?> active <?php endif;?>" id="home-tab" data-toggle="tab" href="#tab-<?=$i?>" role="tab" aria-controls="home" aria-selected="true">
                                    <span><?=the_sub_field('icon');?></span>
                                <?=the_sub_field('name');?></a>
                            </li>
                        <?php $i++;
                        endwhile;
                    else:
                        // no rows found
                    endif;?>
                    </ul>
            </div>
                <div class="service-text tab-content d-flex align-items-center" id="myTabContent">
                <?php if (have_rows('social', 'option')):
                // loop through the rows of data
                $y = 0;
                    while (have_rows('service', 'option')): the_row();?>
                        <div class="tab-pane fade container <?php if ($y == 0): ?> show active <?php endif;?>" id="tab-<?=$y?>" role="tabpanel" aria-labelledby="home-tab">
                            <?=the_sub_field('text');?></div>
                    <?php $y++;
                    endwhile;
            else:
             // no rows found
            endif;?>
                </div>
            </section>
            <section id="section-portfolio"class="section">
            <div class="d-flex section_title">
                    <h1 class="vertical-text align-self-center" >Portfolio</h1>
                </div>
            <div id="portfolio" class="content-area slide">
            
 <?php
        $posts = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => 'portfolios',
        ));

        if ($posts): ?>
            <div class="tab-content">
<?php $i = 0;
    foreach ($posts as $post):
        setup_postdata($post);?>
			<div class="tab-pane <?php if ($i == 0) {echo 'active';}?>" id="post-<?php the_ID();?>" role="tabpanel">
                    <div class="portfolio_slider">
                <?php $images = get_field('galerie');
                    if ($images): ?>
                        <div id="carousel-<?php the_ID();?>" class="carousel mx-auto " data-ride="carousel">
                            <ol class="carousel-indicators">
                            <?php $j = 0;
                                foreach ($images as $image): ?>
                                    <li data-target="#carousel-<?php the_ID();?>" data-slide-to="<?php echo $j ?>" class="<?php if ($j == 0) {echo 'active';}?>"></li>
                            <?php $j++;
                                endforeach;?>
                            </ol>
                            <div id="slider" class="carousel-inner" role="listbox">
                                <div class="content">
                            <?php $k = 0;
                                foreach ($images as $image): ?>
                                    <div div class="carousel-item <?php if ($k == 0) {echo 'active';}?>">
                                        <img class="d-block " src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?> <?php echo $k ?>" />
                                    </div>
                                    <?php $k++;
                                endforeach;?>
                                </div>
                            </div>
                            <div class="project-desc row">
                        <!-- <h3 class="text-gradient "> <?php the_title()?></h3> -->
                        <div class="col-6">
                            <h5>Client</h5>
                            <?php the_field("client");?>
                        </div>
                        <div class="col-6">
                            <h5>Mission</h5>
                            <?php the_field("mission");?>
                        </div>
		                <?php $cats = get_the_category($id);
                         if ($cats) {
                            foreach ($cats as $cat): ?>
		                        <span  class="badge-cat badge badge-pill badge-light"> <?php echo $cat->name; ?></span>
		                    <?php endforeach;}?>
                    <?php $posttags = get_the_tags();
                    if ($posttags) {
                        foreach ($posttags as $tag) {?>
                             <span class="badge-tag badge badge-pill badge-light"><?php echo $tag->name . ' '; ?></span>
                        <?php }
                    }?>
                </div>
                        </div>
                <?php endif;?>
                    </div>
            </div>
    <?php $i++;
    endforeach;?>
</div>
	<ul class="row list-projects nav nav-tabs" role="tablist">
	<?php foreach ($posts as $post):
    setup_postdata($post);
    ?>
			        <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');?>
					<li class="project-item col-3 nav-item" style="background-image:url(<?php echo $featured_img_url ?>)">
						<a class="nav-link align-self-center <?php if ($i == 0) {echo 'active';}?>" data-toggle="tab"  role="tab" href="#post-<?php the_ID();?>" ><?php the_title()?></a>
					</li>
				<?php endforeach;?>
	</ul>

<?php wp_reset_postdata();?>
<?php endif;?>
</div>
            </section>
            <section id="section-about"class="section">About</section>
            <section id="section-contact"class="section" style="background-image: url('<?php echo $contact_background['url']; ?>')">
                <div class="d-flex section_title">
                    <h2 class="vertical-text align-self-center" >Contact</h2>
                </div>
                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8 ">
                            <div class="row">
                                <div class="col-sm-4  contact_social d-flex justify-content-center">
                                    <ul class="row">
                                        <li class=" col-md-12 col-4 d-flex align-items-center p-3">
                                            <span class="social-icon mr-2" > <i class="far fa-envelope"></i></span>
                                                        <a href=" mailto:<?=$email?>"><?=$email?></a>
                                        </li>
                                    <?php
                                        // check if the repeater field has rows of data
                                        if (have_rows('social', 'option')):

                                        // loop through the rows of data
                                        while (have_rows('social', 'option')): the_row();?>
                                            <li class=" col-md-12 col-4 d-flex align-items-center p-3">
                                                <span class="social-icon mr-2" > <?=the_sub_field('icon');?></span>
                                                <a href=" <?=the_sub_field('link');?>" target="_blank"><?=the_sub_field('text');?></a>
                                            </li>
                                        <?php endwhile;

                                        else:
                                        // no rows found
                                        endif;?>
    <li class=" col-md-12 col-4 d-flex align-items-center p-3">
                                            <span class="social-icon mr-2" > <i class="fas fa-map-marker"></i></span>
                                                        <?=$loc?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-8 contact_form d-flex justify-content-center">
                                    <h3 class="text-center contact_title"><?=$contact_title?></h3>
                                <?php echo do_shortcode($contact_form); ?>
                                </div>
                            </div>

                        </div>
                    </div>

            </section>
        </div>
    </main>
</div><!-- #primary -->