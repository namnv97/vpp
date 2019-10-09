<?php 

function get_price($id=NULL)
{
	if(!empty($id)):
		$product = Product::get_price_by_id($id);
		return $product->price;
	endif;
	
}

function get_sale_price($id)
{
	if(empty($id)):
		$product = Product::get_sale_price_by_id($id);
		return $product->sale;
	endif;
}

function get_the_title($id = NULL)
{
	if(!empty($id))
	{
		$product = Product::get_by_id($id);
		return $product->name;
	}
}


function get_relate_post($id)
{
	$relate = Post::get_relate_post($id);
	return $relate;
}


function get_product_cat($id)
{
	$cat = Category::get_by_id($id);
	return $cat->name;
}

function get_thumbnail($id)
{
	$cat = Product::get_by_id($id);
	return $cat->thumbnail;
}


function send_mail($email="namnguyen.pveser@gmail.com",$name="VPP",$subject="Thông báo đơn hàng",$content="Bạn vừa đặt đơn hàng tại VPP")
{

	$mail = new PHPMailer\PHPMailer\PHPMailer(true);

	try {
		$mail->SMTPDebug = 0;
		$mail->isSMTP();
		$mail->Host       = 'smtp.gmail.com';
		$mail->SMTPAuth   = true;
		$mail->Username   = 'n4m.nv.1997@gmail.com';
		$mail->Password   = 'rublvpsglaycrgyc';
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;



		$mail->setFrom('n4m.nv.1997@gmail.com', 'Văn Phòng Phẩm');
		$mail->addAddress($email, $name);
		$mail->addReplyTo('n4m.nv.1997@gmail.com', 'Reply');


		$mail->isHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $content;
		$mail->CharSet = "utf-8";

		$ck = $mail->send();
		if($ck)
		{
			echo("<script>location.href = '".base_url."thankyou';</script>");
		}
	} catch (Exception $e) {
		?>
		<script type="text/javascript">
			Swal.fire({
				type: 'error',
				text: "Có lỗi xảy ra trong quá trình gửi Mail. Đơn hàng sẽ được gửi đến bạn sớm nhất",
			})
		</script>
		<?php
	}

}


function current_url()
{
	return 'http://'.$_SERVER['HTTP_HOST'].':'.$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
}

function create_code($slug)
{
	$slug = mb_strtolower($slug);
	$slug = preg_replace("/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/", 'a',$slug);
	$slug = preg_replace("/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/", 'e' , $slug);
	$slug = preg_replace("/i|í|ì|ỉ|ĩ|ị/", 'i',$slug);
	$slug = preg_replace("/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/", 'o',$slug);
	$slug = preg_replace("/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/", 'u',$slug);
	$slug = preg_replace("/ý|ỳ|ỷ|ỹ|ỵ/", 'y',$slug);
	$slug = preg_replace("/đ/", 'd',$slug);
	$slug = preg_replace("/\`|\~|\!|\@|\#|\||\$|\%|\^|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/", '',$slug);
	$slug = preg_replace("/\&/", 'va',$slug);
	$slug = preg_replace("/ /", "-",$slug);
	$slug = preg_replace("/[\-]+/", '-',$slug);
	return $slug;
}


function trim_word_cus($text, $limit=10,$str='...') {

	if (str_word_count($text, 1) > $limit) {
		$text = preg_replace('/((\w+\W*){'.($limit-1).'}(\w+))(.*)/', '${1}', $text).$str;
	}

	return $text;
}


$logo_de = Options::get_by_key('logo')->value;
$phone_de = Options::get_by_key('phone')->value;
$copy = Options::get_by_key('copyright')->value;
// $ft1_de = Options::get_by_key('footer-1')->value;
// $ft2_de = Options::get_by_key('footer-2')->value;
// $ft3_de = Options::get_by_key('footer-3')->value;
// $ft4_de = Options::get_by_key('footer-4')->value;
define('logo',base_url.$logo_de);
define('phone',$phone_de);
define('copyright',$copy);
// define('ft1',$ft1_de);
// define('ft2',$ft2_de);
// define('ft3',$ft3_de);
// define('ft4',$ft4_de);


?>