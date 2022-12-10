<?php get_header() ?>
    <!-- END nav -->

<section class="hero-wrap" style='background-image: url("<?php
// If not empty breadcrumbs bg field
if(get_field('fr_bg_image')){
  the_field('fr_bg_image');
}else{
  echo get_template_directory_uri() . "/images/bg_1.jpg";
}
?>");' data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center">
      <div class="col-lg-7 col-md-6 ftco-animate d-flex align-items-end">
      	<div class="text">
          <!-- Type " / " to wrap text on a new line -->
          <h1 class="mb-4"><?php echo str_replace(' / ', '<br>', get_the_title()); ?></h1>
          <p style="font-size: 18px;"><?php the_field('title_description') ?></p>
        </div>
      </div>
    </div>
  </div>
</section>





<section class="ftco-section">
  <div class="container">
    
      <?php 
      $args = [
        'offer_under_title' => get_field('offer_under_title'),
        'offer_title' => get_field('offer_title'),
      ];

      get_template_part( 'template-parts/header', 'offer', $args );
      ?>

    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-properties owl-carousel all-properties">

          <!-- Property Carousel on main page -->
          <?php 

            $postNumber = get_option('front_page_num');

            $args = [
            'post_type'        => 'property',
            'posts_per_page'   => $postNumber,
            'tax_query' => array(
              array (
                  'taxonomy' => 'property_type',
                  'field' => 'slug',
                  'terms' => ['rent', 'sale'],
                  )
              ),     
            ];
            
            $query = new WP_Query( $args ); 
            if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
            $query->the_post();

            $terms = get_the_terms( $post->ID, 'property_type' );
            foreach ( $terms as $term ) {
                          
            $tax_name = $term->name;

          ?>

          <!-- Template of one property -->
          <div class="item property-item <?php echo $term->slug ?>">
            <div class="property-wrap ftco-animate">
            <a href="<?php the_permalink() ?>" class="img" style="background-image: url(<?php the_field('pr_image') ?>);">
              <div class="rent-sale">
                <?php echo '<span class="'. mb_strtolower($tax_name) . '">' . $tax_name . '</span>'; ?>
              </div>
              <?php 
                if(get_field('pr_price')){
                echo "<p class='price'><span class='orig-price'>$";
                 // If Rent - $300/mo , if Sale - $300000

                  if ($tax_name == 'Rent') {
                    echo the_field('pr_price') . "<small> / mo</small>";
                  }elseif ($tax_name == 'Sale') {
                    echo the_field('pr_price');
                  }else{
                    echo '';
                  }

                echo "</span></p>";
                }
              ?>
            </a>
              <div class="text">
                <ul class="property_list">
              <!-- Bedrooms -->
                <?php if (get_field('pr_bedrooms')) {
                  echo "<li>Bedrooms: " . get_field('pr_bedrooms') . "</li>";
                } ?>
                <!-- Bathrooms -->
                <?php if (get_field('pr_bathrooms')) {
                  echo "<li>Bathrooms: " . get_field('pr_bathrooms') . "</li>";
                } ?>
                <!-- Lot Area -->
                <?php if (get_field('pr_lot_area')) {
                  echo "<li>" . get_field('pr_lot_area') . " sqft</li>";
                } ?>
            </ul>
                <h3><a href="<?php the_permalink() ?>"><?php echo (strlen(get_the_title()) > 50) ? substr(get_the_title(), 0, 50) . ' ...': the_title() ?></a></h3>
                <span class="location"><?php the_field('pr_city') ?></span>


              </div>
            </div>
          </div>

          <?php 
          } //end foreach
          } //end while
          } //end if
          wp_reset_query();
          wp_reset_postdata();

          ?>
          
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Footer -->
<?php get_footer() ?>
