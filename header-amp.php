<?php
/**
 *  Header template for all AMP pages that loads navbar.php
 *
 *  i.    HTML declaration
 *  ii.   SEO Meta
 *  iii.  AMP boilerplate code
 *  iv.   AMP JS head scripts
 *  v.    Fonts (AMP-valid)
 *  vi.   CSS (AMP-valid/compiled)
 *  vii.  Body class (opens)
 *  viii. AMP JS body scripts
 *  ix.   Navbar.php
 *
 */
?>
<!doctype html>
<html ⚡ lang="en">
<head><meta charset="utf-8"><?php get_template_part('amp/meta'); ?><?php get_template_part('amp/ampboilerplate'); ?><?php get_template_part('amp/headscripts'); ?><?php get_template_part('fonts/ampfonts'); ?><style amp-custom><?php include 'dist/css/main.css'; ?></style></head><body <?php body_class(); ?>><?php get_template_part('amp/bodyscripts'); ?>
<?php get_template_part( 'templates/navbar' ); ?>
