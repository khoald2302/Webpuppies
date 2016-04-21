<?php
/*
  Launcher template: Creativ Comming Soon Four
  Template URI: http://drupalexp.com
  Description: Creativ Comming Soon Fours
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
    <body 

        <div class="wrap">
            <h1 id="logo" class="text-logo" itemprop="headline">
                <?php wplauncher_image('hideable=1&default=' . wplauncher_get_template_directory_uri() . '/logo.png'); ?>
            </h1>
            <div id="description">
                <?php wplauncher_text('type=textarea&edit_color=1&default=Our website is under construction, we are working very hard to give you the best experience with this one.'); ?>
            </div>
            <div id="countdown">
                <?php wplauncher_countdown(array('format' => '
				<span class="counting wplauncher-days"><span class="count_num">%D</span><span class="count_text">Days</span></span>
				<span class="counting wplauncher-hours"><span class="count_num">%H</span><span class="count_text">Hours</span></span>
				<span class="counting wplauncher-minutes"><span class="count_num">%M</span><span class="count_text">Minutes</span></span>
				<span class="counting wplauncher-seconds"><span class="count_num">%S</span><span class="count_text">Seconds</span></span>
			', 'edit_color' => 1)); ?>
                <?php if (wplauncher_get_field('countdown_color')): ?>
                    <style type="text/css">.count_num { color: <?php echo wplauncher_get_field('countdown_color'); ?>; }</style>
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
    </body>
</html>