<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Referal forum - <?php echo $RESULT[0]->title; ?></title>
<link href="<?php echo base_url('assets/front/') ?>css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/style.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/responsive.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/aos.css" >
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/front/') ?>css/font-awesome.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
</head>
<body>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->

<div class="bottom-line">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul class="breadcrumb custom-breadcrumb">
          <li><a href="#">Forum</a></li>
          <li class="active"><?php echo $RESULT[0]->category_name; ?></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php $current_url = uri_string(); ?>
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php if(empty($user_id)){ $login_url = base_url('user/login').'?redirect='.$current_url; } ?>
<!--- Home  Page Banner Background -->
<section class="login-form forum-down">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9">
				<h1 id="thread-title" class="ThreadView-title"><?php echo $RESULT[0]->title; ?></h1>
				<div class="thread-details">   
					<span class="thread-author">by <span><?php echo $RESULT[0]->full_name; ?></span> &nbsp;  &nbsp;</span>
					<time class="ThreadView-author-item ThreadView-published">Posted: <?php echo get_timeago(strtotime($RESULT[0]->create_date)); ?>  &nbsp;  &nbsp;</time>
					<span class="ThreadView-author-item ThreadView-comment-count"><?php echo $RESULT[0]->total_comments; ?> coments</span>  
				</div>
				<div class="media post-media">
					<div class="media-left">
					<ul class="upvote list-inline">
						<?php if(!empty($user_id)){  //when user login ?>
						<li><a data-toggle="modal"><i class="fa fa-caret-up" aria-hidden="true"></i> <span onclick="return upvote(<?php echo $RESULT[0]->id; ?>)" id="upvotetxt"> <?php echo (count($SUB_VOT['upvote'])==0 || $SUB_VOT['upvote'][0]->status==0)?'upvote':'upvoted'; ?></span> </a></li>
						<li><a href="javascript:void()" id="subcribedtxt" onclick="return subscribed('<?php echo $RESULT[0]->id; ?>')"><?php echo (count($SUB_VOT['subscribe'])==0 || $SUB_VOT['subscribe'][0]->status==0)?'subscribe':'subscribed'; ?></a></li>
						<?php }else{ ?>
						<li><a href="<?php echo $login_url; ?>"><i class="fa fa-caret-up" aria-hidden="true"></i>upvote</a></li>
						<li><a href="<?php echo $login_url; ?>" >subscribe</a></li>
						<?php } ?>
					</ul>
				   </div>
					<div class="media-right">
						<!-- Go to www.addthis.com/dashboard to customize your tools -->
						<!--
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5aa267b8c3576252"></script>
						<div class="addthis_inline_share_toolbox"></div>
						-->
					</div>
				</div>
				<div id="main-post" class="post-content">
					<?php echo $RESULT[0]->description; ?>
				</div>
				
				<div class="media post-media">
					<div class="media-left" style="width:25%">
						<strong><?php echo count($COMMENTS); ?> Comments</strong>
					</div>
					<div class="media-body" style="text-align: right;">
						<?php if(!empty($user_id)){  //when user login ?>
							<a href='javascript:void(0);'  id='addcommenrt'>Add a comment</a>
						<?php }else{ ?>
							<a href='<?php echo $login_url; ?>'  id='addcommenrt'>Add a comment</a>
						<?php } ?>
					</div>
				</div>
				
				<div class="media comment-box commentbox" style="display:none;">					
					<div class="media-left">
						<div class="icon-user-reply">
							<img src="http://www.graphicsmerlin.in/forumweb/webroot/images/users/c9a2476e-58b4-ef2f-5ca2-b5c0696c1049_140_140.jpg">
						</div>
					</div>		  
					<div class="media-body">
						<form method="post" action="#" id="comment-form">
							<input type="hidden" name="post_id" value="<?php echo $RESULT[0]->id; ?>">	
							<input type="text" required name="comment" class="reply-field replyinput0" id="toggle-box">
							<input type="button"  name="submitcomments" onclick="return save_reply('0','comment','show_reply0');" value="Reply" class="reply-btn">					  
						</form><br>
					</div>
				</div>				
				<?php echo $this->session->flashdata('msg'); ?>
				<ul class="list-item-disussion">
					<span class="show_reply0"></span>
					<?php $user_id = $this->session->userdata('USER_ID'); ?>
					<?php foreach($COMMENTS as $comment): ?>
					<?php $reply_data =  $this->forum_model->get_all_comments_reply($comment->id); ?>
					<?php $thanks_data = $this->forum_model->count_all_thanks($comment->id,'1') ?>
					<?php $login_user_thanks = $this->forum_model->check_user_do_thanks($comment->id,$user_id) ?>
					
					<li>  
						<div class="disussion first-reply">
							<ul class="discuission-list list-inline">
								<li><img src="<?php echo check_profile_pic('uploads/profile_pic/',$comment->user_image); ?>"></li>
								<li><a href="#" class="DiscussionBoard-username"><?php echo $comment->full_name; ?></a></li>
								<li><?php echo get_timeago(strtotime($comment->create_date)); ?></li>
							</ul>
						</div>
						<div class="DiscussionBoard-message VBEditorContent first-message"><?php echo $comment->comment ?></div>
						<?php if(!empty($user_id)){  //when user login ?>
						<ul class="DiscussionBoard-actionList list-inline first-thanks"> 
							<li class="#"> [<span id="thanks_<?php echo $comment->id; ?>"><?php echo $thanks_data[0]->total_thanks; ?></span>]<a id="thanks_txt<?php echo $comment->id; ?>" href="javascript:void();" onclick="return do_thanks('<?php echo $comment->id; ?>');"><?php echo(count($login_user_thanks)!=0)?'Remove Thanks':'Thanks'; ?></a></li> 
							<li class="DiscussionBoard-actionItem"> <?php echo count($reply_data); ?>  <a onclick="show_reply_box('<?php echo $comment->id; ?>');">Reply</a> </li>
						</ul> <br>
						<?php }else{ ?>
						<ul class="DiscussionBoard-actionList list-inline first-thanks"> 
							<li class="#"> [<span ><?php echo $thanks_data[0]->total_thanks; ?></span>]<a href="<?php echo $login_url; ?>">Thanks</a></li> 
							<li class="DiscussionBoard-actionItem"> <?php echo count($reply_data); ?>  <a href="<?php echo $login_url; ?>">Reply</a> </li>
						</ul> <br>
						<?php } ?>
						<div class="DiscussionBoard-message VBEditorContent first-message replybox" id="replybox<?php echo $comment->id; ?>" style="display:none">
							<form method="post" action="#" id="comment-form">
								<input type="hidden" name="post_id" value="<?php echo $comment->id; ?>">	
								<input type="text" required name="comment" class="reply-field replyinput<?php echo $comment->id; ?>" id="toggle-box">
								<input type="button" name="submitcomments" onclick="return save_reply('<?php echo $comment->id; ?>','reply','show_reply<?php echo $comment->id; ?>');" value="Reply" name="submit_reply" class="reply-btn">					  
							</form><br>
						</div>
						<span class="show_reply<?php echo $comment->id; ?>"></span>
						<?php if(count($reply_data)>0){ ?>
						<?php foreach($reply_data as $reply_row){ ?>
						<?php $thanks_data = $this->forum_model->count_all_thanks($reply_row->id,'1') ?>
						<?php $login_user_thanks = $this->forum_model->check_user_do_thanks($reply_row->id,$user_id) ?>	
						<div id="replybox_7">					
							<div class="disussion sub-parent">
								<ul class="discuission-list list-inline">
									<li><img src="<?php echo check_profile_pic('uploads/profile_pic/',$reply_row->user_image); ?>"></li>
									<li><a href="#" class="DiscussionBoard-username"><?php echo $reply_row->full_name; ?></a></li>
									<li><?php echo get_timeago(strtotime($reply_row->create_date)); ?></li>
								</ul>
							</div>
							<div class="DiscussionBoard-message VBEditorContent sub-child"><?php echo $reply_row->comment; ?></div>
							<?php if(!empty($user_id)){  //when user login ?>
							<ul class="DiscussionBoard-actionList list-inline sub-thank"> 
								<li class="#"> [<span id="thanks_<?php echo $reply_row->id; ?>"><?php echo $thanks_data[0]->total_thanks; ?></span>]<a id="thanks_txt<?php echo $reply_row->id; ?>" href="javascript:void();" onclick="return do_thanks('<?php echo $reply_row->id; ?>');"><?php echo(count($login_user_thanks)!=0)?'Remove Thanks':'Thanks'; ?></a></li>  
								<li class="DiscussionBoard-actionItem"> <a href="javascript:void(0);" onclick="return add_report('<?php echo $reply_row->id; ?>');">Report</a> </li> 
							</ul> 
							<?php }else{ ?>
							<ul class="DiscussionBoard-actionList list-inline sub-thank"> 
								<li class="#"> [<span><?php echo $thanks_data[0]->total_thanks; ?></span>]<a href="<?php echo $login_url; ?>">Thanks</a></li>  
								<li class="DiscussionBoard-actionItem"> <a href="<?php echo $login_url; ?>">Report</a> </li> 
							</ul>
							<?php } ?>
						</div><br>
						<?php } ?>
						<?php } ?>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			
           
			<div class="col-sm-4 col-md-3">
				<div class="recent-post">
					<img src="<?php echo base_url('assets/front/images/side-banner.jpg'); ?>">   
				</div>
				<div class="select-category">
					<h3 class="cat-title">Select a Category</h3>
					<hr class="cat-line">
					<ul>
						<?php foreach($all_cat as $cats): ?>
						<li>
							<div class="media">
								<div class="media-body">
									<h4 class="media-heading">
									<a href="<?php echo base_url('topics/'.create_slug($cats->title).'_'.encode_url($cats->id)); ?>"><?php echo $cats->title; ?></a></h4>
								</div>								
							</div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div> <!-- End Column -->      
			<div class="clearfix"></div>
	    </div> <!-- End Row -->
    </div> <!-- End Container  -->
</section>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3 class="modal-title">Report</h3>
			</div>
			<form action="#" id="report_form" class="form-horizontal">
				<input type="hidden" name="post_id" value="<?php echo $RESULT[0]->id; ?>">
				<input type="hidden" name="reply_id" id="reply_id" value="">
				<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
				<div class="modal-body form">				      
					<div class="form-body">	
						<div class="form-group">
							<label class="col-sm-3 control-label"> Description</label>
							<div class="col-sm-9">
								<textarea class="form-control ckeditor" required name="report" rows="4" cols="50" id="description"></textarea>
							</div>
						</div>														  
					</div>				
				</div>				
				<div class="modal-footer">
					<button type="submit" id="btnSavedata" class="btn btn-primary">Submit</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</form>	
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  <!-- End Bootstrap modal -->

<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#comment-form').parsley();	
	$('#addcommenrt').click(function(){
		$('.commentbox').slideToggle();
	});
});
function add_report(REPLY_ID)
{
    $('#report_form')[0].reset(); // reset form on modals
	$('#reply_id').val(REPLY_ID);
    $('#modal_form').modal('show'); // show bootstrap modal
}

function save_reply(COMMENT_ID,TYPE,RESPONSE_DIV)
{
	var reply_input = $('.replyinput'+COMMENT_ID);
	if(reply_input.val()=="")
	{
		reply_input.focus();
		reply_input.addClass('error_input');
		return false;
	}
	else
	{
		$.ajax({
			type:'post',
			url:'<?php echo base_url('forums/save_reply'); ?>',
			data:{'parent_id':COMMENT_ID,'post_id':<?php echo $RESULT[0]->id; ?>,'type':TYPE,'comment':reply_input.val()},
			beforeSend: function() {
				$('.'+RESPONSE_DIV).html('<img src="<?php echo base_url('assets/front/images/loading.gif'); ?>"  width="70"/>');
			},
			success:function(responce_data)
			{
				if(responce_data!='error')
				{
					$('.commentbox').hide();
					$('.replybox').hide();
					reply_input.removeClass('error_input');
					reply_input.val('');
					$('.'+RESPONSE_DIV).html(responce_data);
				}
				else
				{ alert('oops something wrong!'); }
			}		
		});
	}
}

function show_reply_box(BOX_ID)
{
	$('.replybox').hide();
	$('#replybox'+BOX_ID).show();
}
function subscribed(POST_ID)
{
	if(POST_ID!='')
	{
		$.ajax({
			type:'post',
			url:'<?php echo base_url('forums/subscribe_ajax'); ?>',
			data:{'post_id':POST_ID},
			success:function(responce_data)
			{
				if(responce_data!='error')
				{
					$('#subcribedtxt').html(responce_data);
				}else{ alert('oops something wrong!'); }	
			}			
		});
	}
	else{
		alert('oops something wrong!');
	}
}

function upvote(POST_ID)
{
	if(POST_ID!='')
	{
		$.ajax({
			type:'post',
			url:'<?php echo base_url('forums/upvote_ajax'); ?>',
			data:{'post_id':POST_ID},
			success:function(responce_data)
			{
				if(responce_data!='error')
				{
					$('#upvotetxt').html(responce_data);
				}else{ alert('oops something wrong!'); }	
			}
			
		});
	}
	else{
		alert('oops something wrong!');
	}	
}

function do_thanks(COMMENT_ID)
{
	if(COMMENT_ID!='')
	{
		$.ajax({
			type:'post',
			url:'<?php echo base_url('forums/do_thanks_ajax'); ?>',
			data:{'comment_id':COMMENT_ID},
			success:function(responce_data)
			{
				if(responce_data!='error')
				{
					$('#thanks_txt'+COMMENT_ID).html(responce_data);
					var get_comment_count = $('#thanks_'+COMMENT_ID).html();					
					if(responce_data=='Thanks'){ $('#thanks_'+COMMENT_ID).html(parseInt(get_comment_count)-1); }
					if(responce_data=='Remove Thanks'){ $('#thanks_'+COMMENT_ID).html(parseInt(get_comment_count)+1); }
				}else{ alert('oops something wrong!'); }	
			}
			
		});
	}
	else{
		alert('oops something wrong!');
	}	
}
</script>
</body>
</html>