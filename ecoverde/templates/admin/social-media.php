<h1>Social Media</h1>
<p>Please fill in your social media</p>
<?php settings_errors(); ?>

<form action="options.php" method="POST">
	<?php
		settings_fields( 'social-media-group' );
		do_settings_sections( 'social-media' ); 
		submit_button( 'Save' );
	?>
</form>