<?php
/*
  Launcher template: Creativ Comming Soon Five
  Template URI: http://drupalexp.com
  Description: Creativ Comming Soon Five
  Author: DrupalEXP
  Version: 1.0
  Author URI: http://drupalexp.com
  Supports: countdown timer, subscribe form, social icons
 */

if (!defined('ABSPATH'))
    die();
?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <?php wplauncher_head(); // title, favicon, meta description, noindex  ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php wplauncher_template_directory_uri(); ?>/style.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    </head>
    <body>

        <div class="wrap">
            <h1 id="logo" class="text-logo" itemprop="headline">
                <?php wplauncher_image('hideable=1&default=' . wplauncher_get_template_directory_uri() . '/logo.png'); ?>
            </h1>
            <div id="description">
                <?php wplauncher_text('type=textarea&edit_color=1&default=Our website is under construction, we are working very hard to give you the best experience with this one.'); ?>
            </div>
            <div id="countdown">
                <?php
                $options = get_option('wplauncher_options');
                if ($options['countdown']['date_formatted']) :
                    ?>
                    <div id="DateCountdown" data-date="<?php echo $options['countdown']['date_formatted']; ?>" ></div>
                <?php endif; ?>
            </div>
            <div id="subscribe">        	
                <?php wplauncher_subscribe(); ?>
                <?php if (wplauncher_get_field('subscribe_color')): ?>
                    <style type="text/css">.L_right .wplauncher-subscribe input[type="text"], .L_right .wplauncher-subscribe input[type="email"], .L_right .wplauncher-subscribe input[type="submit"] { border-color: <?php echo wplauncher_get_field('subscribe_color'); ?>; } .L_right .wplauncher-subscribe input[type="submit"] { background-color: <?php echo wplauncher_get_field('subscribe_color'); ?>; }</style>
                <?php endif; ?>
            </div>
            <div<?php wplauncher_color_attr('id=social_icons_color'); ?>>
                <?php wplauncher_social('hideable=1'); ?>
            </div>
        </div>
        <?php wplauncher_footer(); // includes editor scripts  ?>
        <script src="<?php echo get_template_directory_uri(); ?>/launcher/creativ-comming-soon-three/TimeCircles.js"></script>
        <script>
            jQuery(document).ready(function ($) {
                $("#DateCountdown").TimeCircles({
                    fg_width: 0.02, //  sets the width of the foreground circle.
                    bg_width: 1, // sets the width of the backgroundground circle.
                    text_size: 0.07, // This option sets the font size of the text in the circles.
                    total_duration: "Auto", // This option can be set to change how much time will fill the largest visible circle.
                });
            });
        </script>
    </body>
</html>