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

$about_bio = get_field('about-bio','option');
$about_txt = get_field('bio-text','option');
$about_img = get_field('about-image','option');

$email = get_field('email','option');
$loc = get_field('localisation','option');

$service_bgc = get_field('services-background','option');


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
                    <h2 class="text-center">Services</h2>
                    <ul class="nav nav-tabs service-tabs" id="myTab" role="tablist">
                    <?php if (have_rows('social', 'option')):
                        // loop through the rows of data
                        $i = 0;
                        while (have_rows('service', 'option')): the_row();?>
                            <li class="nav-item">
                                <a class="nav-link text-center <?php if($i == 0):?> active <?php endif; ?>" id="home-tab" data-toggle="tab" href="#tab-<?= $i ?>" role="tab" aria-controls="home" aria-selected="true">
                                <span><?=the_sub_field('icon');?></span>
                                    <?=the_sub_field('name');?></a>
                            </li>
                    <?php 
                $i++;    
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
                           <div class="tab-pane fade container <?php if($y == 0):?> show active <?php endif; ?>" id="tab-<?=$y?>" role="tabpanel" aria-labelledby="home-tab">
                           <?=the_sub_field('text');?>
                           </div>
                    <?php 
                $y++;    
                endwhile;
                    else:
                    // no rows found
                    endif;?>
                </div>
            </section>
            <section id="section-portfolio"class="section">Portfolio</section>
            <section id="section-about"class="section">About</section>
            <section id="section-contact"class="section" style="background-image: url('<?php echo $contact_background['url']; ?>')">
            <div class="d-flex section_title">
                <h2 class="vertical-text align-self-center" >Contact</h2>
            </div>
                <div class="row">
                    <div class="col-sm-4">

                    </div>
                    <div class="col-sm-8 ">
                        <div class="row">
                            <div class="col-sm-4  contact_social d-flex justify-content-center">
                                <ul class="row">
                                    <li class=" col-md-12 col-4 d-flex align-items-center p-3">
                                        <span class="social-icon mr-2" > <i class="far fa-envelope"></i></span>
                                                    <a href=" mailto:<?= $email ?>"><?= $email ?></a>
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

endif;

?>
  <li class=" col-md-12 col-4 d-flex align-items-center p-3">
                                        <span class="social-icon mr-2" > <i class="fas fa-map-marker"></i></span>
                                                    <?= $loc ?>
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