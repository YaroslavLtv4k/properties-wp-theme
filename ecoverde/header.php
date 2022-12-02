<!DOCTYPE html>
<html lang="en">
  <head>
  	<!-- Because of the function with h1 on front page -->
    <title><?php echo str_replace(' / ', ' ', get_the_title()); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <?php wp_head() ?>
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?php echo home_url(); ?>">Ecoverde</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	      	<?php

			    wp_nav_menu(
			      array(
			        'theme_location' => 'top-menu',
			        'menu_class' => 'navbar-nav ml-auto',
			        'container' => false,
			        'list_item_class'  => 'nav-item',
    				'link_class'   => 'nav-link'
			      )
			    );

		    ?>
	      </div>
	    </div>
	  </nav>