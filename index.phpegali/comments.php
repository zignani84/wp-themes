<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package egali
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$argsComment = array(
	'comment_field' => 
		'<small>' . _x( 'Comment', 'noun' ) . '</small>
		<div class="form-group mt-4 mb-4">
			<textarea id="comment" name="comment" class="form-control" placeholder="Comente algo..." rows="5" aria-required="true"></textarea>
		</div>',
	'title_reply' => '',
	'comment_notes_after' => '<a href="#" id="enviarComentario" class="btn btn-secondary no-bg-after">'. _x( 'Enviar' ) .'</a>',
	'must_log_in' => '',
	'logged_in_as' => '',
);
?>

<div class="line-h-100 float-left mt-5"></div>

<div id="comments" class="comments-area">

	<?php
	comment_form($argsComment);
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		the_comments_navigation();
	?>

	<ul class="list-comments mb-5">

		<?php

		//wp_list_comments('type=comment&callback=format_comment');

		wp_list_comments( array(
			'type'      => 'comment',
			'callback' => 'format_comment',
			'short_ping' => true,
			'avatar_size' => 62
		) );

		?>

	</ul>
	<?php
	the_comments_navigation();

	endif; // Check for have_comments().

	?>

</div><!-- #comments -->
