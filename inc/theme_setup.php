<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( '_sbs_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * @since 1.0.0
 */
function _sbs_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TutorialFor.Me, use a find and replace
	 * to change _SBS_TEXT_DOMAIN to the name of your theme in all the template files
	 */
	load_theme_textdomain( _SBS_TEXT_DOMAIN, get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/**
	 * Load custom css on wordpress tinymce editor
	 * 
	 * @link http://codex.wordpress.org/Function_Reference/add_editor_style
	 */
	add_editor_style( _SBS_ASSETS . '/css/editor-style.css' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', _SBS_TEXT_DOMAIN ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'audio', 'video', 'status', 'chat', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_sbs_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _sbs_setup
add_action( 'after_setup_theme', '_sbs_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 * @since 1.0.0
 */
function _sbs_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', _SBS_TEXT_DOMAIN ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer', _SBS_TEXT_DOMAIN ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div class="col-md-3"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', '_sbs_widgets_init' );

/**
 * Search form customization.
 *
 * @link http://codex.wordpress.org/Function_Reference/get_search_form
 * @since 1.0.0
 */
function _sbs_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div class="input-group">
	<input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" />
	<span class="input-group-btn"><input type="submit" id="searchsubmit" class="btn btn-default" value="'. esc_attr__( 'Search' ) .'" /></span>
	</div>
	</form>';

	return $form;
}
add_filter( 'get_search_form', '_sbs_search_form' );

/**
 * Template for comments and pingbacks.
 * 
 * Used as a callback by wp_list_comments() for displaying the comments.
 * 
 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
 * @since 1.0.0
 */
if ( ! function_exists( '_sbs_comment' ) ) :

function _sbs_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', _SBS_TEXT_DOMAIN ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', _SBS_TEXT_DOMAIN ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 56 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', _SBS_TEXT_DOMAIN ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', _SBS_TEXT_DOMAIN ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', _SBS_TEXT_DOMAIN ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', _SBS_TEXT_DOMAIN ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', _SBS_TEXT_DOMAIN ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

function _sbs_comment_form() {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
	    'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name', _SBS_TEXT_DOMAIN ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	        '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
	    'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email', _SBS_TEXT_DOMAIN ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .
	        '<input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
	    'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website', _SBS_TEXT_DOMAIN ) . '</label>' .
	    	'<input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		);

	$comments_args = array(
		'fields' =>  $fields,
		'title_reply'=>'Post your valuable comment',
		'class_submit' => 'btn btn-default',
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', _SBS_TEXT_DOMAIN ) . '</label><br /><textarea id="comment" class="form-control" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		);

	comment_form($comments_args);
}