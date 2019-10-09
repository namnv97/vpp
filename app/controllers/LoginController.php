<?php 
class LoginController
{

	public function __construct()
	{
		
	}

	public function login()
	{
		if(isset($_POST) && isset($_POST['login']) && $_POST['login'] == 'login')
		{
			$username = trim($_POST['username']);
			$pass = trim($_POST['password']);
			$url = $_POST['url'];
			

			$user = Users::getbyusername($username);

			if($user != null)
			{
				if(password_verify($pass,$user->password) && $user->status == 1)
				{
					$_SESSION['user_login']['id'] = $user->id;
					$_SESSION['user_login']['name'] = $user->fullname;
					$_SESSION['user_login']['role'] = $user->role;

					if($user->role > 1) header('location: '.base_url.'admin');
					else header("location: $url");
				}

				else {
					$_SESSION['msg_login'] = "Mật khẩu không chính xác. Vui lòng kiểm tra lại.";
					header("location: $url");
				}
			}

			else {
				$_SESSION['msg_login'] = "Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại.";
				header("location: $url");
			} 
		}
	}

	public function logout()
	{
		unset($_SESSION['user_login']);
		header('location: '.base_url);
	}






}



 ?>