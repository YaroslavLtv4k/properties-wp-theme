<?php /* Template Name: Properties */ ?>

<?php get_header() ?>
<!-- END nav -->
    
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="ftco-section goto-here">
      <div class="container">
          <!-- Offer Header -->
          <?php $args = [
            'offer_under_title' => get_field('offer_under_title'),
            'offer_title' => get_field('offer_title'),
          ];
          get_template_part( 'template-parts/header', 'offer', $args );?>

          <!-- Property posts and Pagination -->
          <?php get_template_part('template-parts/all', 'properties') ?>

      </div>
    </section>

    

    <!-- Footer -->
<?php get_footer() ?>