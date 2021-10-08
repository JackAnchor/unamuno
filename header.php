<?php
/**
 *  Header template for non AMP pages that loads navbar-theme.php
 *
 */
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php get_template_part( 'templates/navbar-theme' ); ?>
