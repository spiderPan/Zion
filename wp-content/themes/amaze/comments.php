<?php
/*
The comments page for persona
*/
// Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

  if ( post_password_required() ) { ?>
  	<div class="alert-box">
    	This post is password protected. Enter the password to view comments.
  	</div>
  <?php
    return;
  }


?>
<!-- Comments -->
<div class="comments-section">
	<h2 class="blog-caps"><?php _e( 'COMMENTS','auralang'); ?></h3>
	<?php 
		$num_comments = get_comments_number(); 
		if ($num_comments == 0) {
			echo '<p>';
			_e( 'There are no comments yet.','auralang');
			echo '</p>';
		} else { ?>
		<div class="comments">
			<ul class="commentlists">
				<?php 
				wp_list_comments( 'type=comment&avatar_size=32&callback=format_comments' ); 
				?>
			</ul>
		</div>	
	<?php } ?>
</div>

<div class="respond">

	<?php 	
	$commenter = wp_get_current_commenter();
	$args = array( 'fields' => apply_filters( 'comment_form_default_fields', 

		array(
		'author' => '<div class="comment-input"><div class="control-group"><label for="input-name" class="control-label">' . __( 'Name:' ,'auralang') . '</label>' .
					'     <div class="control"><div class="input-border"><input class="textbox" id="author" name="author" type="text" value="' .esc_attr( $commenter['comment_author'] ) . '"  /></div></div></div>',

		'email'  => '<div class="control-group"><label for="input-name" class="control-label">' . __( 'Email:','auralang' ) . '</label> ' .
					'<div class="control"><div class="input-border"><input id="email" class="textbox" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" /></div></div></div>',
		'url'    => '<div class="control-group"><label for="input-name" class="control-label">' . __( 'Website:','auralang' ) . '</label>' .
					'<div class="control"><div class="input-border"><input id="url" class="textbox" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div></div>' ) ),
		'comment_field' =>'<div class="comment-text"><label for="text-comment" class="control-label">' . __( 'Comment:','auralang') . '</label><div class="control">
													<div class="input-border"><textarea id="comment" class="textbox" name="comment" cols="45" rows="10" tabindex="4" aria-required="true"></textarea></div></div></div>',
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be logged in to post a comment.' ,'auralang') ) . '</p>',
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%s">%s</a>.</p>','auralang' ), admin_url( 'profile.php' ), $user_identity ),
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'id_form' => 'comments-form',
		'class_form' => 'commentform',
		'id_submit' => 'post-comment',
		'title_reply' => __( 'LEAVE A REPLY' ,'auralang'),
		'title_reply_to' => __( 'LEAVE A REPLY TO %s' ,'auralang'),
		'cancel_reply_link' => __( 'Cancel reply' ,'auralang'),
		'label_submit' => __( 'Post Comment' ,'auralang'),
	);
	comment_form($args);?>


</div>
