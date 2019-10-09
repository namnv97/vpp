<?php 

class ProductController
{
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
		$product = Product::get_product($slug);
		$relate = Product::get_relate($product->cat_id, $product->id);
		$this->_data['title'] = $product->name;
		$this->_data['product'] = $product;
		$this->_data['relate_product'] = $relate;
		$view = new View('category/product',$this->_data);
		$view->render();
	}

}





 ?>