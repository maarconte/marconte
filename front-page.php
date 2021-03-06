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
$about_txt = get_field('bio_text', 'option');
$about_img = get_field('about-image', 'option');

$email = get_field('email', 'option');
$loc = get_field('localisation', 'option');

$service_bgc = get_field('services-background', 'option');

$contact_title = get_field('contact_title', 'option');
$contact_form = get_field('contact_form', 'option');
$contact_background = get_field('contact_background', 'option');

$site_title = get_bloginfo('name');
$site_description = get_bloginfo('description');


$knowledges = get_field('knowledge', 'option');
$tools = get_field('tools', 'option');

get_header();?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="fullpage" class="wrapper">
                <section id="section-home" class="section" style="background-image: url('<?= $home_background['url']; ?>')">
                <div class="menu">
                    <a href="#section-portfolio" class="btn btn-primary">Portfolio</a>
                    <a href="#section-contact" class="btn btn-primary">Contact</a>
                </div>
                <div class="jumbotron">
                        <div class="container text-center">
                            <img data-src="<?= get_template_directory_uri(); ?>/img/marconte_logo.svg" alt="marconte" class="mb-3" style="width:200px;">
                            <h1>
                                <?=$site_title?>
                            </h1>
                            <h2>
                                <?=$site_description?>
                            </h2>
                            <div class="mouse">
                                <span></span>
                            </div>
                            <!-- <img data-src="<?= get_template_directory_uri(); ?>/img/scroll_mouse.gif" alt="scroll_mouse" style="height: 100px;">
                        <p class="p-mouse">Scroll</p> -->
                        </div>
                        <ul class="social-list">
                                                <?php
                                                // check if the repeater field has rows of data
                                                if (have_rows('social', 'option')):
                                                // loop through the rows of data
                                                while (have_rows('social', 'option')): the_row();?>
                                                    <li>
                                                        <a href=" <?=the_sub_field('link');?>" target="_blank">

                                                                <?=the_sub_field('icon');?>

                                                        </a>
                                                    </li>
                                                    <?php endwhile;

                                                else:
                                                // no rows found
                                                endif;?>
                                            </ul>
                    </div>
                </section>
                <section id="section-about" class="section">
                    <div class="row">
                        <div class="col-sm-1 d-flex align-items-center justify-content-center">
                            <h1 class="vertical-text section-title">
                                <?= $about_txt ?>
                            </h1>
                        </div>
                        <div class=" about-bio col-lg-6 col-xl-7 d-flex align-items-center">
                            <div>
                                <?= $about_bio ?>
                            </div>
                        </div>
                        <div class="right col-lg-5 col-xl-4">
                            <div class="about-img">
                                <div class="content">
                                    <img src="<?= $about_img['url']; ?>" alt="marconte">
                                </div>
                            </div>
                            <div class="about-skills">
                                <div class="mb-2">
                                    <h2>Connaissances du secteur</h2>
                                    <?php if( $knowledges ): ?>
                                    <?php foreach( $knowledges as $k ):
                                            $tag = get_tag($k);?>
                                    <span class="badge-outline-light badge badge-pill ">
                                        <?= $tag->name . ' '; ?>
                                    </span>
                                    <?php endforeach; ?>
                                    <?php endif ?>
                                </div>
                                <div>
                                    <h2>Outils et tecnhologies</h2>
                                    <?php if( $tools ): ?>
                                    <?php foreach( $tools as $t ):
                                        $tag = get_tag($t);?>
                                    <span class="badge-outline-light badge badge-pill ">
                                        <?= $tag->name . ' '; ?>
                                    </span>
                                    <?php endforeach; ?>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-services" class="section">
                    <div class="top" style="background-image: url('<?= $service_bgc['url']; ?>')">
                        <div class="title d-flex align-items-center justify-content-center">
                            <h2 class="text-center mb-2">Vous avez un projet ?</h2>
                            <p class="text-white">Mes prestations sont adaptées à vos besoins. N'hésitez pas à demander un devis gratuit.</p>
                            <a class="btn btn-secondary" href="#section-contact">Me contacter</a>

                        </div>
                        <ul class="nav nav-tabs service-tabs row" id="myTab" role="tablist">
                            <?php
                            if (have_rows('social', 'option')):
                            // loop through the rows of data
                                $i = 0;
                                while (have_rows('service', 'option')): the_row();?>
                            <li class="nav-item col-4">
                                <a class="nav-link text-center <?php if ($i == 0): ?> active <?php endif;?>" id="home-tab" data-toggle="tab" href="#tab-<?=$i?>"
                                    role="tab" aria-controls="home" aria-selected="true">
                                    <span>
                                        <?=the_sub_field('icon');?>
                                    </span>
                                    <?=the_sub_field('name');?>
                                </a>
                            </li>
                            <?php $i++;
                                endwhile;
                            else:
                            // no rows found
                            endif;?>
                        </ul>
                    </div>
                    <div class="service-content tab-content d-flex align-items-center" id="myTabContent">
                        <?php
                        if (have_rows('social', 'option')):
                        // loop through the rows of data
                         $y = 0;
                            while (have_rows('service', 'option')): the_row();?>
                        <div class="tab-pane fade container <?php if ($y == 0): ?> show active <?php endif;?>" id="tab-<?=$y?>" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">

                                <?php
                                $numberRows = count(get_sub_field('content', 'option'));
                                if( have_rows('content', 'option') ):
                                    while( have_rows('content', 'option') ) : the_row(); ?>
                                <div class=" <?php if ($numberRows == 1): echo 'col-sm-12'; else : echo 'col-sm-6'; endif;?> content">
                                    <!-- <div class="content_img">
                                         <img src="<?=the_sub_field('image');?>" alt="service_img">
                                        <?= the_sub_field('image');?>
                                    </div> -->
                                    <div class="content_text">
                                        <?=the_sub_field('text');?>
                                    </div>
                                </div>
                                <?php endwhile;
                                        endif;
                                    ?>

                            </div>
                        </div>
                        <?php $y++;
                            endwhile;
                        else:
                            // no rows found
                        endif;?>
                    </div>
                </section>
                <section id="section-portfolio" class="section">
                    <div class="row project-content align-items-center">
                        <div class="col-sm-1 d-flex align-items-center justify-content-center">
                            <h1 class="vertical-text section-title">Portfolio</h1>
                        </div>

                        <?php
                        $posts = get_posts(array(
                            'posts_per_page' => -1,
                            'post_type' => 'portfolios',
                        ));
                        if ($posts): ?>
                        <?php $i = 0;?>
                        <div class="col-sm-11 tab-content">
                            <?php foreach ($posts as $post):
                                setup_postdata($post);?>

                            <div class="slide <?php if ($i == 0) {echo 'active';}?>" id="post-<?php the_ID();?>" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="portfolio_slider">
                                            <?php $images = get_field('galerie');
                                                if ($images): ?>
                                            <div id="carousel-<?php the_ID();?>" class="carousel mx-auto " data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <?php $j = 0;
                                                                foreach ($images as $image): ?>
                                                    <li data-target="#carousel-<?php the_ID();?>" data-slide-to="<?= $j ?>" class="<?php if ($j == 0) {echo 'active';}?>"></li>
                                                    <?php $j++;
                                                                endforeach;?>
                                                </ol>
                                                <div id="slider" class="carousel-inner" role="listbox">
                                                    <div class="content">
                                                        <?php $k = 0;
                                                                        foreach ($images as $image): ?>
                                                        <div div class="carousel-item align-items-center <?php if ($k == 0) {echo 'active';}?>">
                                                            <img class="d-block " data-src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?> <?= $k ?>" />
                                                        </div>
                                                        <?php $k++;
                                                                        endforeach;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <div class=" col-md-3 project-desc">
                                        <h2 class="text-gradient text-center ">
                                            <?php the_title()?>
                                        </h2>
                                        <div>
                                            <?php the_field("client");?>
                                        </div>
                                        <h3>Mission</h3>
                                        <div>
                                            <?php the_field("mission");?>
                                        </div>
                                        <?php
                                            $cats = get_the_category($id);
                                            $posttags = get_the_tags();
                                            if ($cats) {
                                                foreach ($cats as $cat): ?>
                                        <span class="badge-cat badge badge-pill badge-light">
                                            <?= $cat->name; ?>
                                        </span>
                                        <?php endforeach;}?>
                                        <?php if ($posttags) {
                                                    foreach ($posttags as $tag): ?>
                                        <span class="badge-tag badge badge-pill badge-light">
                                            <?= $tag->name . ' '; ?>
                                        </span>
                                        <?php endforeach;}?>
                                    </div>
                                </div>
                            </div>

                            <?php $i++;
                            endforeach;?>
                        </div>
                        <?php endif;?>
                    </div>
                    <!-- <div class="list-projects">
                    <ul class="row  nav nav-tabs" role="tablist">
                    <?php
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    foreach ($posts as $post):
                    setup_postdata($post); ?>
                        <li class="project-item col-3 nav-item" style="background-image:url(<?= $featured_img_url ?>)">
                            <a class="nav-link align-self-center <?php if ($i == 0) {echo 'active';}?>" data-toggle="tab"  role="tab" href="#post-<?php the_ID();?>" ><?php the_title()?></a>
                        </li>
                    <?php endforeach;?>
                    </ul>
                </div> -->
                </section>

                <section id="section-contact" class="section" style="background-image: url('<?= $contact_background['url']; ?>')">
                    <div class="row">
                        <div class="col-sm-1 d-flex align-items-center justify-content-center">
                            <h1 class="vertical-text section-title" style="color:#fff !important">Contact</h1>
                        </div>
                        <div class="right col-sm-11">
                            <div class="row">
                                <div class="col-sm-4 empty-space"></div>
                                <div class="col-sm-8 ">
                                    <div class="row">
                                        <div class="col-sm-4  contact_social d-flex justify-content-center">
                                            <ul class="row">
                                                <?php
                                                // check if the repeater field has rows of data
                                                if (have_rows('social', 'option')):

                                                // loop through the rows of data
                                                while (have_rows('social', 'option')): the_row();?>
                                                    <li class=" col-md-12 col d-flex align-items-center p-3">
                                                        <a href=" <?=the_sub_field('link');?>" target="_blank" class="d-flex align-items-center">
                                                            <span class="social-icon mr-2">
                                                                <?=the_sub_field('icon');?>
                                                            </span>
                                                            <span class="social-text">
                                                                <?=the_sub_field('text');?>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <?php endwhile;

                                                else:
                                                // no rows found
                                                endif;?>
                                                    <li class=" social-location col-md-12 col d-flex align-items-center p-3">
                                                        <span class="social-icon mr-2">
                                                            <i class="fas fa-map-marker"></i>
                                                        </span>
                                                        <span class="location-text">
                                                            <?=$loc?>
                                                        </span>
                                                    </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-8 contact_form d-flex justify-content-center">
                                            <h3 class="text-center contact_title">
                                                <?=$contact_title?>
                                            </h3>
                                            <?= do_shortcode($contact_form); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <footer id="colophon" class="site-footer" role="contentinfo">
                        <div class="site-info col-sm-4">
                            <div class="row align-items-center">
                                <div class="col-2 footer-logo">
                                    <img src="<?= get_template_directory_uri(); ?>/img/marconte_logo5.svg" alt="marconte">
                                </div>
                                <div class="col-10 footer-text">
                                    <span>Thème Wordpress crée par
                                       Mathilde Arconte
                                    </span>
                                    <span class="sep"> | </span>
                                    <a class="mentions" href="" data-toggle="modal" data-target="#exampleModal">Mentions Légales</a>

</div>
                                </div>
                            </div>
                        </div>
                        <!-- .site-info -->
                    </footer>
                    <!-- #colophon -->
                </section>
            </div>
        </main>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mentions légales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h3>Présentation du site</h3>
<p>En vertu de l’article 6 de la loi n° 2004-575 du 21 juin 2004 pour la confiance dans l’économie numérique, il est précisé aux utilisateurs du site https://marconte.fr/ l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi :</p>
<ul class="list-mentions-legales">
 	<li><strong>Créateur &amp; Propriétaire</strong> : Mathilde Arconte</li>
 	<li><strong>N° SIREN</strong> : 811 373 125</li>
 	<li><strong>Responsable publication</strong> : Mathilde Arconte – contact@marconte.fr</li>
 	<li>Le responsable publication est une personne physique ou une personne morale.</li>
 	<li><strong>Webmaster</strong> : Mathilde Arconte – contact@marconte.fr</li>
</ul>
<h3>Hébergement</h3>
<p>OVH, 2 rue Kellermann 59100 Roubaix, France</p>
<h3>Confidentialité</h3>
<p>Mathilde Arconte n’enregistre pas d’informations personnelles permettant l’identification, à l’exception des formulaires que l’utilisateur est libre de remplir.</p>
   <p> Ces informations ne seront pas utilisées sans votre accord, je les utiliserais seulement pour vous adresser des courriers, des brochures, des devis ou vous contacter.</p>

<p>Les informations recueillies sur les sites bénéficient de la protection de la loi « <em>Informatique et Libertés</em> » n° 78-17 du 06 janvier 1978. Elles bénéficient d’un droit d’accès, de rectification, d’opposition à communication et de suppression sur simple demande à Mathilde Arconte.</p>
      </div>
    </div>
  </div>
    <!-- #primary -->
    <?php get_footer();?>