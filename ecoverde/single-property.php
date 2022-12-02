<?php get_header() ?>
    <!-- END nav -->
    
    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="ftco-section ftco-property-details">
      <div class="container">
      	<div class="row justify-content-center">
      		<div class="col-md-12">
      			<div class="property-details">
      				<div class="img" style="background-image: url(<?php the_field('pr_image') ?>);">

      				</div>
      				<div class="text">
      					<span class="subheading"><?php the_field('pr_city') ?></span>
      					<h1><?php the_title() ?></h1>
      				</div>
      			</div>
      		</div>
      	</div>
      	<div class="row">
      		<div class="col-md-12 pills">
						<div class="bd-example bd-example-tabs">
							<div class="d-flex">
							  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

							    <li class="nav-item">
							      <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
							    </li>
							    <li class="nav-item">
							      <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
							    </li>

							  </ul>
							</div>

						  <div class="tab-content" id="pills-tabContent">
						    <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">

				    			<ul class="features">
				    				
				    				<!-- Lot Area -->
				    				<?php if (get_field('pr_lot_area')) {
				    					echo "<li class='check'><span class='fa fa-check-circle'></span>Lot Area: " . get_field('pr_lot_area') . " sq ft</li>";
				    				} ?>
				    				<!-- Bedrooms -->
				    				<?php if (get_field('pr_bedrooms')) {
				    					echo "<li class='check'><span class='fa fa-check-circle'></span>Bedrooms: " . get_field('pr_bedrooms') . "</li>";
				    				} ?>
				    				<!-- Bathrooms -->
				    				<?php if (get_field('pr_bathrooms')) {
				    					echo "<li class='check'><span class='fa fa-check-circle'></span>Bathrooms: " . get_field('pr_bathrooms') . "</li>";
				    				} ?>
				    				<!-- Price -->
				    				<?php if (get_field('pr_price')) {
				    					echo "<li class='check'><span class='fa fa-check-circle'></span>Price: " . get_field('pr_price') . "$ / month</li>";
				    				} ?>
				    				<!-- Type -->
				    				<?php if (get_field('pr_type')) {
				    					echo "<li class='check'><span class='fa fa-check-circle'></span>Type: " . get_field('pr_type') . "</li>";
				    				} ?>
				    				<!-- Garages -->
				    				<?php if (get_field('pr_garages')) {
				    					echo "<li class='check'><span class='fa fa-check-circle'></span>Garages: " . get_field('pr_garages') . "</li>";
				    				} ?>

				    			</ul>

						    </div>

						    <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
						      <?php if( !empty(get_the_content())){
						      	the_content();
						      }else{
						      	echo 'Oops, it\'s empty. You can return to the features tab';
						      } ?>
						    </div>


						  </div>
						</div>
		      </div>
				</div>
      </div>
    </section>

<!-- Footer -->
<?php get_footer() ?>