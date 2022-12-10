<?php
// Plugin Name: Social Media



function social_media_plugin($atts){
    
    $twitter = get_option( 'socmedia_twitter' );
    $facebook = get_option( 'socmedia_facebook' );
    $instagram = get_option( 'socmedia_instagram' );
    $youtube = get_option( 'socmedia_youtube' );

    // Twitter
    if($twitter){
        $tw = shortcode_atts( array(
            'link' => $twitter,
        ), $atts );
    }
    // Facebook
    if($facebook){
        $fb = shortcode_atts([
            'link' => $facebook,
        ], $atts);
    }
    // Instagram
    if($instagram){
        $inst = shortcode_atts([
            'link' => $instagram,
        ], $atts);
    }
    // YouTube
    if($youtube){
        $yt = shortcode_atts([
            'link' => $youtube,
        ], $atts);
    }
?>

<!-- HTML -->



<?php

if ($twitter) {
    $twitter_icon = '
    <li class="ftco-animate fadeInUp ftco-animated">
        <a href="' . ($tw['link']) . '" target="_blank"><span class="fa fa-twitter"></span></a>
    </li>
    ';
}
if ($facebook) {
    $facebook_icon = '
    <li class="ftco-animate fadeInUp ftco-animated">
        <a href="' . ($fb['link']) . '" target="_blank"><span class="fa fa-facebook"></span></a>
    </li>
    ';
}
if ($instagram) {
    $instagram_icon = '
    <li class="ftco-animate fadeInUp ftco-animated">
        <a href="' . ($inst['link']) . '" target="_blank"><span class="fa fa-instagram"></span></a>
    </li>
    ';
}
if ($youtube) {
    $youtube_icon = '
    <li class="ftco-animate fadeInUp ftco-animated">
        <a href="' . ($yt['link']) . '" target="_blank"><span class="fa fa-youtube"></span></a>
    </li>
    ';
}

$html_soc_media_widget = array(
    $twitter_icon, $facebook_icon, $instagram_icon, $youtube_icon,
);

$i = 0;
$widget_icon = '';

for($i; $i <= count($html_soc_media_widget); $i++){
    $widget_icon .= $html_soc_media_widget[$i];
}

return '<ul class="ftco-footer-social list-unstyled mt-5">' . $widget_icon . '</ul>';



}


add_shortcode( 'social_media', 'social_media_plugin' );