<?php 
 /*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Marsh Corporate
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
		<div class="single-featured-image">
			<?php the_post_thumbnail(); ?>
        </div><!-- .featured-image -->
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'marsh-corporate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php marsh_corporate_posts_tags(); ?>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'marsh-corporate' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>	

	<div class="entry-meta">
		<?php marsh_corporate_posted_on();
		marsh_corporate_entry_meta(); ?>
	</div><!-- .entry-meta -->	
</article><!-- #post-## -->