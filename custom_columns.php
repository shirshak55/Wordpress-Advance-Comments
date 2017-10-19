<?php
add_filter( 'manage_edit-comments_columns', function($columns){
	$columns['_commentsvote'] = __( 'Votes' );
	return $columns;
});
add_filter( 'manage_comments_custom_column', function($column,$comment_ID){
	if ( '_commentsvote' == $column ) {
		if ( $meta = get_comment_meta( $comment_ID, $column , true ) ) {
			echo $meta;
		}
	}
}, 10, 2 );
?>