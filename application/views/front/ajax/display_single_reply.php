<div id="replybox_7">					
	<div class="disussion sub-parent">
		<ul class="discuission-list list-inline">
			<li><img src="http://localhost/forum_project/webroot/images/users/c9a2476e-58b4-ef2f-5ca2-b5c0696c1049_140_140.jpg"></li>
			<li><a href="#" class="DiscussionBoard-username"><?php echo $comment[0]->full_name; ?></a></li>
			<li><?php echo get_timeago(strtotime($comment[0]->create_date)); ?></li>
		</ul>
	</div>
	<div class="DiscussionBoard-message VBEditorContent sub-child"><?php echo $comment[0]->comment; ?></div>
	<ul class="DiscussionBoard-actionList list-inline sub-thank"> 
		<li class="#"> [<span id="thanks_<?php echo $comment[0]->id; ?>">0</span>]<a id="thanks_txt<?php echo $comment[0]->id; ?>" href="javascript:void();" onclick="return do_thanks('<?php echo $comment[0]->id; ?>');">Thanks</a></li>  
		<li class="DiscussionBoard-actionItem"> <a href="#">Report</a> </li> 
	</ul> 
</div><br>