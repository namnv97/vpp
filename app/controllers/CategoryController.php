<?php

/**
* 
*/
class CategoryController
{

	public $_data;
	public function __construct()
	{
		$category = Category::all();
		$posts = Post::get_feature_post();
		$cate_post = CategoryPost::all();
		$this->_data['category'] = $category;
		$this->_data['feature_post'] = $posts;
		$this->_data['cat_post'] = $cate_post;
	}

public function index()
{	
	header('location: '.base_url);
}


public function category($slug)
{
	
	$single_category = Category::get_category($slug);
	$array = '';
	if($single_category->cat_parent == 0):
		$array .='(';
		$cate_child = Category::get_child($single_category->id);
		foreach($cate_child as $key => $kate):
			if($key == (count($cate_child)-1)) $array .= $kate->id;
			else $array .= $kate->id.',';
		endforeach;
		$array .= ')';
	else:
		$array = '('.$single_category->id.')';
	endif;
	
	$list_product = Product::get_by_category($array);

	
	$title = $single_category->name;

	$this->_data['list_cat'] = $array;
	$this->_data['title'] = $title;
	$this->_data['cate'] = $single_category;
	$this->_data['products'] = $list_product;
	$view = new View('category/category',$this->_data);
	$view->render();
}

}