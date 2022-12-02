<?php get_header() ?>

<?php get_template_part('template-parts/breadcrumbs') ?>

<style>
	.page-title{
		height: 60vh;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	h1{

	}
</style>


<div class="page-title">
	<h1><?php the_title() ?> content</h1>
</div>




<?php get_footer() ?>