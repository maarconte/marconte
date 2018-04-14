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

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div id="fullpage" class="wrapper">

            <div id="section-home"class="section">Home</div>
            <div id="section-services"class="section">Services</div>
            <div id="section-portfolio"class="section">Portfolio</div>
            <div id="section-about"class="section">About</div>
            <div id="section-contact"class="section">Contact</div>
        </div>
    </main>
</div><!-- #primary -->