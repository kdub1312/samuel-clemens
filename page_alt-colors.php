<?php
/* Template Name: Alt Colors Template */

get_header(); ?>
<style>
    #main {
        background-color: lightgoldenrodyellow !important;
    }
    .search-submit {
        background-color: pink;
    }
    .search-submit:hover {
        background-color: royalblue;
    }
    input[type="search"].search-field:focus {
        background-color: black;
        color: lawngreen;
        font-family: sans-serif;
    }
    
</style>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	    <p style="color: navy;">THIS LINE OF TEXT IS COMING FORM THE ALT COLORS TEMPLATE!!!</p>
		<?php
		// Start the loop.
		while ( have_posts() ) :
			the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
