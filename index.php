<?
session_start();
//include('flag.txt');
$flag=file_get_contents('flag.txt');
$m=$_GET['m'];
if($m=='login'){
	if($_POST['username']=='spring'){
		//判断用户是否登陆
		$myflag=date('his',time());
		$username=addslashes($_POST['username']);
		$_SESSION['username']=$username;
		//保证当前用户肯定可以登陆成功
		$_SESSION['myflag']=$myflag;
		file_put_contents('flag.txt', $myflag);
		echo "success";
		exit;
	}
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>
	</head>
	<body>
		<form action="?m=login" method="post">
			<input type="text" name="username" />
			<input type="submit" value="submit">
		</form>
	</body>
	</html>
<?
}else{
	//判断当前用户是否为最近的用户
	if(!$_SESSION['username'] || $_SESSION['myflag']!=$flag){
		session_destroy();
		header('Location:?m=login');
	}else{
		echo "You are loging";
	}
}
?>
