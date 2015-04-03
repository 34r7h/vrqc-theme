<?php
    $comments = get_comments(array('post_id' => $post->ID, 'status'=>'approve'));
foreach($comments as $comment) :
echo '<div class="col-xs-5 text-center"><h1><i class="col-xs-12 fa fa-user fa-4x"></i></h1><b>'.($comment->comment_author).'</b></div>';
echo '<div class="col-xs-7 panel panel-default"><div class="panel-body">'.($comment->comment_content).'</div></div><hr class="col-xs-12"/>';
endforeach;
?>
<hr class="col-xs-12 clearfix"/>
<?php
    $arr = array(
        'fields'=>array(
            'author' => '<p class="comment-form-author col-xs-12 col-sm-6"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input class="col-xs-12" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',
            'email'  => '<p class="comment-form-email col-xs-12 col-sm-6"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input class="col-xs-12" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',
            'url'    => ''
        ),
        'title_reply'=>'Write a Review',
        'label_submit'=> 'Submit this Review',
        'comment_field'=>'<p class="comment-form-comment"><textarea class="col-xs-12 col-sm-7 pull-left" id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Describe your stay with us."></textarea></p>',
        'comment_notes_after'=>'<div class="col-xs-12 col-sm-5"><p>Thank you for taking the time to rate your stay with us.</p>',
        'comment_form_after'=>'</div>'
);
comment_form($arr);
?>

