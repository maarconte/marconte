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
          <a class="nav-link active" data-toggle="tab" href="#about" role="tab">About</a>
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
  <div class="tab-pane" id="cv" role="tabpanel">1</div>
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
