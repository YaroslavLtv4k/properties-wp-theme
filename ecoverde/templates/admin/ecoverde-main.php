<h1>Main Theme Settings</h1>
<p>You are on main theme settings page</p>
<?php settings_errors(); ?>

<form action="options.php" method="POST">
	<?php
		settings_fields( 'ecoverde-main-group' );
		do_settings_sections( 'ecoverde-settings' ); 
		submit_button( 'Save' );
	?>
</form>