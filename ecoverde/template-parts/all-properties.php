<div class="property_type_tabs">
  <ul>
    <li id="pr-all" class="active" data-filter="*">All</li>
    <li id="pr-rent" data-filter=".rent">Rent</li>
    <li id="pr-sale" data-filter=".sale">Sale</li>
  </ul>
</div>

<div class="row all-properties">

<?php 

$args = [
'post_type'        => 'property',
'order' => 'ASC',
'tax_query' => array(
  array (
      'taxonomy' => 'property_type',
      'field' => 'slug',
      'terms' => ['rent', 'sale'],
      )
  ),
'paged' => $paged,     
];

$query = new WP_Query( $args ); 
if ( $query->have_posts() ) {
while ( $query->have_posts() ) {
$query->the_post();

$terms = get_the_terms( $post->ID, 'property_type' );
foreach ( $terms as $term ) {
              
$tax_name = $term->name;
?>

<div class="col-md-4 property-item <?php echo $term->slug ?>">
  <div class="property-wrap ftco-animate">
    <a href="<?php the_permalink() ?>" class="img" style="background-image: url(<?php the_field('pr_image') ?>);">
      <div class="rent-sale">
        <?php
        // What the type of Property
        if ($tax_name == 'Rent') {
          echo "<span class='rent'>" . $tax_name . "</span>";
        }elseif ($tax_name == 'Sale') {
          echo "<span class='sale'>" . $tax_name . "</span>";
        }else{
          echo '';
        }

        ?>
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

<!-- Pagination -->

<div class="row mt-5">
<div class="col text-center">
  <div class="block-27">
    <ul>
      <?php 
      $paginateLinks = paginate_links([ 
      'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
      'total'        => $query->max_num_pages,
      'current'      => max( 1, get_query_var( 'paged' ) ),
      'format'       => '?paged=%#%',
      'show_all'     => false,
      'type'         => 'array',
      'end_size'     => 2,
      'mid_size'     => 1,
      'prev_next'    => true,
      'prev_text'    => sprintf( '<i></i> %1$s', '<' ),
      'next_text'    => sprintf( '%1$s <i></i>', '>' ),
      'add_args'     => false,
      'add_fragment' => '',
        ]);
      if ($paginateLinks) {
        foreach ( $paginateLinks as $page ) {
              echo "<li>$page</li>";
         }
      }
    
      ?>
    </ul>
  </div>
</div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
   $(document).ready( function() {   

$('.all-properties').isotope({
  itemSelector: '.property-item',
});

// filter items on button click
$('.property_type_tabs').on( 'click', 'li', function() {
  var filterValue = $(this).attr('data-filter');
  $('.all-properties').isotope({ filter: filterValue });
  $('.property_type_tabs li').removeClass('active');
  $(this).addClass('active');
});


})
</script>