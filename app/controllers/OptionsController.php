<?php 

class OptionsController
{
	public $_data = [];
	public function __construct()
	{

	}

	public function general_setting()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['general']) && $_POST['general'] == 'general'):
			$logo = str_replace('/VPP/public/','',$_POST['thumnails']);
			$phone = trim($_POST['phone']);


			// $ft1 = trim($_POST['footer-1']);
			// $ft2 = trim($_POST['footer-2']);
			// $ft3 = trim($_POST['footer-3']);
			// $ft4 = trim($_POST['footer-4']);


			if(!empty($logo))
			{
				$key = 'logo';
				$op = Options::get_by_key($key);
				if(empty($op)):
					Options::insert($key,$logo);
				else:
					Options::update($key,$logo);
				endif;

				
			}
			if(!empty($phone))
			{
				$key = 'phone';
				$op = Options::get_by_key($key);
				if(empty($op))
				{
					Options::insert($key,$phone);
				}
				else
				{
					Options::update($key,$phone);
				}
			}
			

			$copyright = trim($_POST['copyright']);
			if(!empty($copyright)):
				$key = 'copyright';
				$op = Options::get_by_key($key);
				if(empty($op)):
					Options::insert($key,$copyright);
				else:
					Options::update($key,$copyright);
				endif;
			endif;

			header("Refresh:0");

		endif;
		$logo = Options::get_by_key('logo');
		$phone = Options::get_by_key('phone');
		$slider = Options::get_by_key('slide');
		$copyright = Options::get_by_key('copyright');
		if(!empty($logo)):
		$this->_data['logo'] = $logo->value;
		endif;
		if(!empty($phone)):
		$this->_data['phone'] = $phone->value;
		endif;

		
		if(!empty($copyright)):
		$this->_data['copyright'] = $copyright->value;
		endif;
		$this->_data['title'] = "Thiết lập chung";
		$view = new View('admin/options/general',$this->_data);
		$view->render();
	}


	public function home_setting()
	{
		if($_SERVER['REQUEST_METHOD'] == "POST"):
			$slides = (isset($_POST['slide']))?$_POST['slide']:FALSE;
			if(!empty($slides)):
				foreach($slides as $key => $slide)
				{
					$slides[$key] = str_replace('/VPP/public/','',$slide);
				}

				$slider = json_encode($slides);

				$key = 'slide';
				$sl = Options::get_by_key($key);
				if(empty($sl))
				{
					Options::insert($key,$slider);
				}
				else
				{
					Options::update($key,$slider);
				}
			else:
				$key = 'slide';
				$sl = Options::get_by_key($key);
				if(!empty($sl)) Options::delete($key);
			endif;

			// $icon = $_POST['img'];
			// $title = $_POST['title'];
			// $content = $_POST['content'];
			// $arr = [];
			// for($i = 0; $i < 3; $i ++):
			// 	$arr[$i]['icon'] = $icon[$i];
			// 	$arr[$i]['title'] = $title[$i];
			// 	$arr[$i]['content'] = stripslashes($content[$i]);
			// endfor;

			// print_r(json_encode($arr));

			// die();

			
			header("Refresh:0");

		endif;

		$slider = Options::get_by_key('slide');
		if(!empty($slider)):
		$this->_data['slider'] = $slider->value;
		endif;
		$this->_data['title'] = "Thiết lập chung";
		$view = new View('admin/options/home',$this->_data);
		$view->render();
	}

	public function header_setting()
	{

	}


	public function footer_setting()
	{

	}

}


 ?>