<?php $reply_data =  $this->forum_model->get_all_comments_reply($comment[0]->id); ?>
<li>  
	<div class="disussion first-reply">
		<ul class="discuission-list list-inline">
			<li><img src="http://www.graphicsmerlin.in/forumweb/webroot/images/users/c9a2476e-58b4-ef2f-5ca2-b5c0696c1049_140_140.jpg"></li>
			<li><a href="#" class="DiscussionBoard-username"><?php echo $comment[0]->full_name; ?></a></li>
			<li><?php echo get_timeago(strtotime($comment[0]->create_date)); ?></li>
		</ul>
	</div>
	<div class="DiscussionBoard-message VBEditorContent first-message"><?php echo $comment[0]->comment ?></div>
		<ul class="DiscussionBoard-actionList list-inline first-thanks"> 
			<li class="#"> [<span id="thanks_<?php echo $comment[0]->id; ?>">0</span>]<a id="thanks_txt<?php echo $comment[0]->id; ?>" href="javascript:void();" onclick="return do_thanks('<?php echo $comment[0]->id; ?>');">Thanks</a></li> 
			<li class="DiscussionBoard-actionItem"> <?php echo count($reply_data); ?>  <a onclick="show_reply_box('<?php echo $comment[0]->id; ?>');">Reply</a> </li>
		</ul> <br>
		<div class="DiscussionBoard-message VBEditorContent first-message replybox" id="replybox<?php echo $comment[0]->id; ?>" style="display:none">
		<form method="post" action="#" id="comment-form">
			<input type="hidden" name="post_id" value="<?php echo $comment[0]->id; ?>">	
			<input type="text" required name="comment" class="reply-field replyinput<?php echo $comment[0]->id; ?>" id="toggle-box">
			<input type="button" name="submitcomments" onclick="return save_reply('<?php echo $comment[0]->id; ?>','reply','show_reply<?php echo $comment[0]->id; ?>');" value="Reply" name="submit_reply" class="reply-btn">					  
		</form><br>
	</div>						
</li>