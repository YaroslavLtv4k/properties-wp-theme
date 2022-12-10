<?php get_header() ?>

<?php get_template_part('template-parts/breadcrumbs') ?>

<style>
	.page-section{
		height: 60vh;
		min-height: 500px;		
	}
	.page-title{
		text-align: center;
		padding: 30px;
	}
	.page-content{
		text-align: center;
	}
</style>


<div class="page-section">

	<div class="page-title">
		<h1><?php the_title() ?> content</h1>
	</div>

	<div class="page-content">
		<?php the_content(); ?>
	</div>

</div>







<?php get_footer() ?>