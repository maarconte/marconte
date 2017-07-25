<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package medusa
 */
?>

<aside id="sidebar" class="" role="complementary">
  <div class="bar">
    <button class="btn-burger">
      <svg version="1.1" id="burger-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
        y="0px" viewBox="0 0 92 92" style="enable-background:new 0 0 92 92;" xml:space="preserve">
      <path id="bar-1" d="M77.8,10.5H13.3c-3.7,0-6.7,2.9-6.7,6.5s3,6.5,6.7,6.5h64.6c3.7,0,6.7-2.9,6.7-6.5S81.5,10.5,77.8,10.5z"/>
      <path id="bar-2" d="M77.8,39.5H13.3c-3.7,0-6.7,2.9-6.7,6.5s3,6.5,6.7,6.5h64.6c3.7,0,6.7-2.9,6.7-6.5S81.5,39.5,77.8,39.5z"/>
      <path id="bar-3" d="M77.8,68.5H13.3c-3.7,0-6.7,2.9-6.7,6.5s3,6.5,6.7,6.5h64.6c3.7,0,6.7-2.9,6.7-6.5S81.5,68.5,77.8,68.5z"/>
      </svg>
    </button>
  </div>
<!--<div class="menu-bg"></div>-->
<div class="navigation">
		<div class="menu-slide">
      <div class="site-branding">
        <h3><?php bloginfo('name'); ?></h3>
        <h2 class="text-gradient"><?php bloginfo('description'); ?></h2>
      </div>
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#about" role="tab">Bio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#cv" role="tab">CV</a>
        </li>
      </ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="about" role="tabpanel">
    <p><?php the_field('bio', 'option'); ?></p>
  </div>
  <div class="tab-pane" id="cv" role="tabpanel">
<!--EXP-->
<section id="exp">
  <?php  
        $selector = "field_5969036fd7ce1";
        $exp = get_field_object($selector);
    ?>

      <h5 class="color-primary"><?php echo $exp['label'] ?></h5>
      <ul id="exp" class="list">
      <?php
  // check if the repeater field has rows of data
  if( have_rows('exp', 'option') ):
    // loop through the rows of data
      while ( have_rows('exp', 'option') ) : the_row(); 
      $image = get_sub_field('logo');
      ?>
      <li class="list-item ">
        <div style="background-image:url(<?php echo wp_get_attachment_image_url($image);?>)" class="list_logo"></div>
        <div class="list_caption">
          <h6 class="list_txt list_poste"><?php the_sub_field('poste'); ?></h6>
          <p class="list_txt list_entreprise"><?php the_sub_field('entreprise'); ?></p>
          <p class="list_txt list_details"><?php the_sub_field('date'); ?> / <?php the_sub_field('lieu'); ?></p>
        </div>  
      </li>  
    <?php endwhile;
  else :
      // no rows found
  endif;?>
      </ul>
</section>
  
<!--FORMATION-->
      <?php  
      $selector = "field_5969048ad7d48";
      $form = get_field_object($selector);
      ?>
<section id="formation">
  <h5 class="color-primary"><?php echo $form['label'] ?></h5>
      <ul id="form" class="list">
      <?php
  // check if the repeater field has rows of data
  if( have_rows('formation', 'option') ):
    // loop through the rows of data
      while ( have_rows('formation', 'option') ) : the_row(); 
      $image = get_sub_field('logo');
     
      ?>
      <li class="list-item ">
        <div style="background-image:url(<?php echo $image['url'];?>)" class="list_logo"></div>
        <div class="list_caption">
          <h6 class="list_txt list_ecole"><?php the_sub_field('ecole'); ?></h6>
          <p class="list_txt list_diplome"><?php the_sub_field('diplome'); ?></p>
          <p class="list_txt list_details"><?php the_sub_field('date'); ?> / <?php the_sub_field('lieu'); ?></p>
        </div>  
      </li>  
    <?php endwhile;
  else :
      // no rows found
  endif;?>
      </ul>
</section>

  </div>
</div>
<footer>
	<ul class="social">
    <?php if( get_field('facebook', 'option') ): ?>
          <li><a target="_blank" href="<?php echo the_field('facebook', 'option'); ?>"><i class="fa fa-facebook"></i></a></li>
    <?php endif; ?>
    <?php if( get_field('twitter', 'option') ): ?>
          <li><a target="_blank" href="<?php echo the_field('twitter', 'option'); ?>"><i class="fa fa-twitter"></i></a></li>
    <?php endif; ?>
    <?php if( get_field('linkedin', 'option') ): ?>
          <li><a target="_blank" href="<?php echo the_field('linkedin', 'option'); ?>"><i class="fa fa-linkedin"></i></a></li>
    <?php endif; ?>
    <?php if( get_field('instagram', 'option') ): ?>
                <li><a target="_blank" href="<?php echo the_field('instagram', 'option'); ?>"><i class="fa fa-instagram"></i></a></li>
    <?php endif; ?>
    <?php if( get_field('github', 'option') ): ?>
          <li><a target="_blank" href="<?php echo the_field('github', 'option'); ?>"><i class="fa fa-github"></i></a></li>
    <?php endif; ?>
	</ul>
  </footer>
		</div>
</div>
</aside><!-- #secondary -->
