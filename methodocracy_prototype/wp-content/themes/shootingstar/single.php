<?php
/**
 * The post template file.
 * @package ShootingStar
 * @since ShootingStar 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="entry-headline-wrapper">
  <div class="entry-headline-wrapper-inner">
    <h1 class="entry-headline title single-title entry-title"><?php the_title(); ?></h1>
<?php shootingstar_get_breadcrumb(); ?>
  </div>
</div>
<div class="entry-content">
  <div class="entry-content-inner">
<?php shootingstar_get_display_image_post(); ?>
<?php if ( get_theme_mod('shootingstar_display_meta_post') != 'Hide' ) { ?>
    <p class="post-meta">
      <span class="post-info-author vcard author"><i class="icon_pencil-edit" aria-hidden="true"></i><span class="fn"><?php the_author_posts_link(); ?></span></span>
      <span class="post-info-date post_date date updated"><i class="icon_clock_alt" aria-hidden="true"></i><?php echo get_the_date(); ?></span>
<?php if ( comments_open() ) : ?>
      <span class="post-info-comments"><i class="icon_comment_alt" aria-hidden="true"></i><a href="<?php comments_link(); ?>"><?php printf( _n( '1 Comment', '%1$s Comments', get_comments_number(), 'shootingstar' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?></a></span>
<?php endif; ?>
    </p>
    <div class="post-info">
      <p class="post-category"><span class="post-info-category"><i class="icon_folder-alt" aria-hidden="true"></i><?php the_category(', '); ?></span></p>
      <p class="post-tags"><?php the_tags( '<span class="post-info-tags"><i class="icon_tag_alt" aria-hidden="true"></i>', ', ', '</span>' ); ?></p>
    </div>
<?php } ?>
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'shootingstar' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( 'Edit', 'shootingstar' ), '<p class="edit-link">', '</p>' ); ?>
<?php endwhile; endif; ?>
<?php if ( get_theme_mod('shootingstar_next_preview_post') != 'Hide' ) { ?>
<?php shootingstar_prev_next('shootingstar-post-nav'); ?>
<?php } ?>
  </div>
</div>

<?php if ( get_the_author_meta( 'description' ) && get_theme_mod('shootingstar_display_about_author') != 'Hide' ) { ?>
<div class="entry-content author-info-box">
  <div class="entry-content-inner">
    <h2 class="about-author"><?php _e( 'About Author', 'shootingstar' ); ?></h2> 
    <div class="author-info">
		  <div class="author-description">
        <div class="author-avatar">
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'shootingstar_author_bio_avatar_size', 90 ) ); ?>
		    </div>
			  <p><span class="vcard"><?php echo get_the_author(); ?></span><br /><?php the_author_meta( 'description' ); ?></p>
		  </div>
		</div>
  </div>
</div>
<?php } ?>

<?php comments_template( '', true ); ?>   
</div> <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>