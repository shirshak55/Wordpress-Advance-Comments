<?php
function delete_comment_link($id) {
	if ( current_user_can( 'administrator' ) ) {
		echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">del</a> ';
		echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">spam</a>';
	}
}
function advanced_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; 
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="group comment_box" id="comment-<?php comment_ID() ?>">
			<div class="comment-avatar grid-1-5"><?php echo get_avatar($comment,$size='160'); ?></div>

			<div class="comment-body group grid-4-5">
				<div class="h3"><?php printf(__('%s'), get_comment_author_link()) ?></div>
					
				<?php if ($comment->comment_approved == '0') : ?><em>Your Comment is Waiting Moderation .</em><br /><?php endif; ?>

				<div class="comment-text"><?php comment_text()  ?></div>

				<div class="reply"><?php comment_reply_link(array_merge( $args, array("reply_text"=>" Reply &darr; ",'depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php delete_comment_link(get_comment_ID()); ?></div>
			</div>
		</div>

<?php } ?>