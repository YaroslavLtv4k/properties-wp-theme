<section class="hero-wrap hero-wrap-2" style='background-image: url("<?php
// If not empty breadcrumbs bg field
if(get_field('breadcrumbs_bg_image')){
  the_field('breadcrumbs_bg_image');
}elseif('property' == get_post_type()){
  the_field('pr_image');
}else{
  echo get_template_directory_uri() . "/images/bg_1.jpg";
}
?>");'  data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate pb-0 text-center">
        <p class="breadcrumbs">
          <?php ecoverde_the_breadcrumb() ?>
        </p>
        <!-- If the page is property post type -->
        <h1 class="mb-3 bread"><?php echo ('property' == get_post_type()) ? 'Property Details' : the_title(); ?></h1>
      </div>
    </div>
  </div>
</section>