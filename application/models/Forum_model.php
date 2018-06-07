<?php 
class Forum_model extends CI_Model
{	
	protected $cat_table = 'tbl_forum_category';
	protected $topic_table = 'tbl_forum_posts';
	/*start forum category model*/
	public function add_category($data)
	{
		$this->db->insert($this->cat_table,$data);
	}
	public function get_all_category()
	{
		return $this->db->get($this->cat_table)->result();
	}
	public function get_category_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->cat_table)->result();
	}
	public function update_category_by_id($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->cat_table,$data);
	}
	public function get_all_active_category()
	{
		$this->db->where('status',1);
		return $this->db->get($this->cat_table)->result();
	}
	
	function get_categoty_with_post($cat_id)
	{
		$result['category'] = $this->get_category_by_id($cat_id);		
		$result['topics'] = $this->select_topics_by_cat_id($cat_id);
		return $result;	
	}
	/*end forum category model*/
	
	/*start topic methods */
	public function topics_with_relations()
	{
		$this->db->select('topic.id, topic.title,topic.status, topic.create_date, category.title as category_name, CONCAT(user.fname, " ",user.lname) as user_name, count(comment.id) as total_comments');
		$this->db->from($this->topic_table.' as topic');
		$this->db->join('tbl_forum_category as category','category.id=topic.cat_id','left');
		$this->db->join('tbl_users as user','user.id=topic.user_id','left');
		$this->db->join('tbl_post_comments as comment','comment.post_id=topic.id', 'left');
		$this->db->group_by('topic.id');
		$this->db->order_by('topic.id','desc');
		return $this->db->get()->result();
	}
	
	public function select_topics_with_cat_name()
	{
		$this->db->select("tbl_forum_posts.*,CONCAT(tbl_users.fname, ' ',tbl_users.lname) as full_name, tbl_forum_category.title as category_name");
		$this->db->from($this->topic_table);
		$this->db->join('tbl_users', 'tbl_users.id = tbl_forum_posts.user_id', 'left');
		$this->db->join('tbl_forum_category', 'tbl_forum_posts.cat_id = tbl_forum_category.id', 'left');
		$this->db->where('tbl_forum_posts.status','1');
		$this->db->order_by('tbl_forum_posts.id','desc');
		return $this->db->get()->result();
	}
	
	public function save_topic_data($data)
	{
		$this->db->insert($this->topic_table,$data);
	}
	
	public function select_topics_by_cat_id($cat_id)
	{
		$this->db->select("tbl_forum_posts.*,CONCAT(tbl_users.fname, ' ',tbl_users.lname) as full_name");
		$this->db->from($this->topic_table);
		$this->db->join('tbl_users', 'tbl_users.id = tbl_forum_posts.user_id', 'left');
		$this->db->where('tbl_forum_posts.cat_id',$cat_id);
		$this->db->order_by('tbl_forum_posts.id','desc');
		return $this->db->get()->result();
	}
	
	public function select_topics_by_user_id($id)
	{		
		$this->db->where('user_id',$id);
		return $this->db->get('tbl_forum_posts')->result();
	}	
	
	public function select_topic_data_with_reletion($id)
	{
		$this->db->select("post.*,CONCAT(user.fname, ' ',user.lname) as full_name, user.image as user_image, category.title as category_name, count(comment.id) as total_comments");
		$this->db->from('tbl_forum_posts as post');
		$this->db->join('tbl_users as user', 'user.id = post.user_id', 'left');
		$this->db->join('tbl_forum_category as category', 'category.id = post.cat_id', 'left');
		$this->db->join('tbl_post_comments as comment', 'comment.post_id = post.id', 'left');
		$this->db->where('post.id',$id);
		//$this->db->order_by('post.id','desc');
		return $this->db->get()->result();
	}
	
	public function all_topic_data_with_reletion($limit=5)
	{
		$this->db->select("post.*,CONCAT(user.fname, ' ',user.lname) as full_name, user.image as user_image, category.title as category_name");
		$this->db->from('tbl_forum_posts as post');
		$this->db->join('tbl_users as user', 'user.id = post.user_id', 'left');
		$this->db->join('tbl_forum_category as category', 'category.id = post.cat_id', 'left');
		$this->db->order_by('post.id','desc');
		$this->db->limit($limit);
		return $this->db->get()->result();
	}
	
	function count_all_post_comments_reply($post_id)
	{
		$this->db->select("count(id) as total_comments");
		$this->db->from('tbl_post_comments');
		$this->db->where('post_id',$post_id);
		return $this->db->get()->result();
	}
	
	public function select_topic_title($id)
	{
		$this->db->select("title");		
		$this->db->where('id',$id);
		return $this->db->get('tbl_forum_posts')->result();
	}
	
	public function select_topic_by_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('tbl_forum_posts')->result();
	}
	public function update_topic_data($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update($this->topic_table,$data);
	}
	/*end topic methods */
	
	/*start post comment methods */
	public function save_topic_comments($data)
	{
		$this->db->insert('tbl_post_comments',$data);
		 return $this->db->insert_id();
	}
	
	public function get_all_comments($id)
	{
		$this->db->select("comments.*,CONCAT(user.fname, ' ',user.lname) as full_name, user.image as user_image");
		$this->db->from('tbl_post_comments as comments');
		$this->db->join('tbl_users as user', 'user.id = comments.user_id', 'left');
		$this->db->where('comments.post_id',$id);
		$this->db->where('comments.parent_id',0);  //check is parent
		$this->db->where('comments.type','comment'); //check is comment
		$this->db->order_by('comments.id','desc');
		return $this->db->get()->result();
	}
	
	public function get_all_comments_reply($comment_id)
	{
		$this->db->select("comments.*,CONCAT(user.fname, ' ',user.lname) as full_name, user.image as user_image");
		$this->db->from('tbl_post_comments as comments');
		$this->db->join('tbl_users as user', 'user.id = comments.user_id', 'left');
		$this->db->where('comments.parent_id',$comment_id);  //check is reply
		$this->db->where('comments.type','reply'); //check is comment
		$this->db->order_by('comments.id','desc');
		return $this->db->get()->result();
	}
	
	public function get_comments_reply_by_id($id)
	{
		$this->db->select("comments.*,CONCAT(user.fname, ' ',user.lname) as full_name");
		$this->db->from('tbl_post_comments as comments');
		$this->db->join('tbl_users as user', 'user.id = comments.user_id', 'left');
		$this->db->where('comments.id',$id);  //check is reply
		return $this->db->get()->result();
	}
	/*end post comment methods */
	
	/*start subscribe methods */
	public function get_subcribe_data_by_post_user($post_id,$user_id)
	{
		$this->db->where('post_id',$post_id);
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_subscribe')->result();
	}
	function save_subcribe_data($data)
	{
		$this->db->insert('tbl_subscribe',$data);
	}
	function update_subcribe_data($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_subscribe',$data);
	}
	
	
	public function get_all_subscriber($post_id)
	{		
		$this->db->where('post_id',$post_id);
		$this->db->where('status','1');
		return $this->db->get('tbl_subscribe')->result();
	}
	
	public function save_notification_data($data)
	{
		$this->db->insert('tbl_notification',$data);
	}
	/*end subscribe methods */
	/*start upvote methods */
	public function get_upvote_data_by_post_user($post_id,$user_id)
	{
		$this->db->where('post_id',$post_id);
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_upvote')->result();
	}
	public function get_upvote_data($post_id)
	{
		$this->db->where('post_id',$post_id);
		return $this->db->get('tbl_upvote')->result();
	}
	function save_upvote_data($data)
	{
		$this->db->insert('tbl_upvote',$data);
	}
	function update_upvote_data($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_upvote',$data);
	}
	
	function get_user_upvote_subcribe_data($post_id,$user_id)
	{
		$data['upvote'] = $this->get_upvote_data_by_post_user($post_id,$user_id);
		$data['subscribe'] = $this->get_subcribe_data_by_post_user($post_id,$user_id);
		return $data;
	}
	/*end upvote methods */
	
	/*start comment thanks methods */
	public function get_thanks_data_by_comment_user($comment_id,$user_id)
	{
		$this->db->where('comment_id',$comment_id);
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_comments_thanks')->result();
	}
	function save_thanks_data($data)
	{
		$this->db->insert('tbl_comments_thanks',$data);
	}
	function update_thanks_data($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('tbl_comments_thanks',$data);
	}
	function count_all_thanks($comment_id,$status)
	{
		$this->db->select("count(id) as total_thanks");
		$this->db->from('tbl_comments_thanks');
		$this->db->where('comment_id',$comment_id);
		$this->db->where('status',$status);
		return $this->db->get()->result();
	}
	
	function check_user_do_thanks($comment_id,$user_id)
	{
		$this->db->where('comment_id',$comment_id);
		$this->db->where('user_id',$user_id);
		$this->db->where('status','1');
		return $this->db->get('tbl_comments_thanks')->result();
	}
	/*end comment thanks methods */
	
	/*notofications methods*/
	function get_notifications_unread($user_id)
	{
		$this->db->where('user_id',$user_id);
		$this->db->where('view_status','0');
		return $this->db->get('tbl_notification')->result();
	}

	function get_notifications_all($user_id)
	{
		$this->db->where('user_id',$user_id);
		return $this->db->get('tbl_notification')->result();
	}
	
	function get_topic_report($post_id)
	{
		$this->db->where('post_id',$post_id);
		return $this->db->get('tbl_report')->result();
	}
	
}
