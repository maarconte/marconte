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
$contact_title = get_field('contact_title', 'option');
$contact_form = get_field('contact_form', 'option');
$contact_background = get_field('contact_background', 'option');



get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div id="fullpage" class="wrapper">

            <section id="section-home"class="section">Home</section>
            <section id="section-services"class="section">Services</section>
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
                                <?php

                                // check if the repeater field has rows of data
                                if( have_rows('social', 'option') ):
                                
                                     // loop through the rows of data
                                    while ( have_rows('social', 'option') ) : the_row(); ?>
                                
                                       <li class=" col-md-12 col-4 d-flex align-items-center p-3">
                                       <span class="social-icon mr-2" > <?= the_sub_field('icon'); ?></span>
                                        <a href=" <?= the_sub_field('link'); ?>"><?= the_sub_field('text'); ?></a>

                                       </li>
                                
                                  <?php  endwhile;
                                
                                else :
                                
                                    // no rows found
                                
                                endif;
                                
                                ?>
                                </ul>
                            </div>
                            <div class="col-sm-8 contact_form d-flex justify-content-center">
                                <h3 class="text-center contact_title"><?= $contact_title?></h3>
                            <?php echo do_shortcode( $contact_form ); ?>
                            </div>
                        </div>
                    
                    </div>
                </div>
            
            </section>
        </div>
    </main>
</div><!-- #primary -->