<?php 

class CategoryPostController
{
	public $_data = [];

	public function __construct()
	{
		$category = Category::all();
		$cate_post = CategoryPost::all();
		$this->_data['category'] = $category;
		$this->_data['cat_post'] = $cate_post;

	}

	public function index($slug = '')
	{
		$num_post = count(Post::get_all());
		$page = ceil($num_post/6);
		$list_post = Post::get_all(6);
		$this->_data['list_post'] = $list_post;
		$bestseller = Product::get_best_seller();
		$this->_data['product'] = $bestseller;
		$this->_data['title'] = "Tin tức";
		$this->_data['page'] = $page;

		$view = new View('posts/category',$this->_data);
		$view->render();
	}
}


 ?>