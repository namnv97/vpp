<?php 

class PostController{

	public $_data = [];


	public function __construct()
	{
		$category = Category::all();
		$posts = Post::get_feature_post();
		$cate_post = CategoryPost::all();
		$this->_data['category'] = $category;
		$this->_data['feature_post'] = $posts;
		$this->_data['cat_post'] = $cate_post;
	}


	public function index($slug)
	{
		$post = Post::get_post($slug);
		// $bestseller = Product::get_best_seller();
		// $this->_data['product'] = $bestseller;
		Post::setPostView($post->ID,$post->view);
		$this->_data['post'] = $post;
		$this->_data['title'] = $post->title;
		$view = new View('posts/index',$this->_data);
		$view->render();

	}




}


 ?>