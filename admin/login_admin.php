<?php
require '../classes/db.class.php';
session_start();
$connect= new DB();
$con=$connect->connect();
if(isset($_POST['ok'])){
	if($_POST['txtuser'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="login_admin.php";
		</script>
		<?php
		exit();

	}else{
		$u=$_POST['txtuser'];
	}
	if($_POST['txtpass'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Mật Khẩu. Vui lòng Nhập Mật Khẩu!!");
		window.location="login_admin.php";
		</script>
		<?php
		exit();
	}else{
		$p=$_POST['txtpass'];
	}
	if($u && $p){
		
		//require("../includes/config.php");

		$query="select * from user where username='$u' and password='$p'";
		$results = mysqli_query($con,$query);
		if	($numrows = mysqli_num_rows($results) == 0){
			?>
		<script type="text/javascript">
		alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác. Vui Lòng Nhập Lại!!");
		window.location="login_admin.php";
		</script>
		<?php
		exit();
			
		}else{
			$data=mysqli_fetch_assoc($results);
			$_SESSION['ses_username']=$data['USERNAME'];
	
			$_SESSION['ses_userid']=$data['USERID'];
			$_SESSION['password']=$data['PASSWORD'];
			header("location:index.php");
			exit();
		}

	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG QUẢN TRỊ VIÊN</title>

  
      <!-- <link rel="stylesheet" href=""> -->

  
</head>


<style>
               @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://www.google.com.vn/search?q=icon+giao+duc&espv=2&biw=1366&bih=662&tbs=isz:ex,iszw:50,iszh:50&tbm=isch&source=lnt#imgrc=AXqcbuABd8wL2M%3A) format('woff');
            }

            body {
                background: #448ed3 ;
                font-family: "Lato" ;
                }
            .wrap {
                width:300px;
                height: auto;
                margin: auto;
                margin-top: 5%;
            }
            .avatar {
                width: 100%;
                margin: auto;
                width: 65px;
                border-radius: 100px;
                height: 65px;
                background: #448ed3 ;
                position: relative;
                bottom: -15px;
            }
            .avatar img {
                width: 55px;
                height: 55px;
                border-radius: 100px;
                margin: auto;
                border:3px solid #fff;
                display: block;
            }
            .wrap input {
                border: none;
                background: #fff;
                font-family:Lato ;
                font-weight:700 ;
                font-size: 20px;
                display: block;
                height: 40px;
                outline: none;
                width: calc(100% - 24px) ;
                margin: auto;
                padding: 6px 12px 6px 12px;
            }
            .bar {
                width: 100%;
                height: 1px;
                background: #fff ;
            }
            .bar i {
                width: 95%;
                margin: auto;
                height: 1px ;
                display: block;
                background: #d1d1d1;
            }
            .wrap input[type="text"] {
                border-radius: 7px 7px 0px 0px ;
            }
            .wrap input[type="password"] {
                border-radius: 0px 0px 7px 7px ;
            }

            .forgot_link {
                color: #83afdf ;
                color: #83afdf;
                text-decoration: none;
                font-size: 14px;
                position: relative;
                left: 229px;
                top: -36px;
            }
            .wrap button {
                width: 100%;
                border-radius: 7px;
                background: #deb63d;
                text-decoration: center;
                border: none;
                color: #51771a;
                margin-top:-5px;
                padding-top: 14px;
                padding-bottom: 14px;
                outline: none;
                font-size: 13px;	
                border-bottom: 3px solid #307d63;
                cursor: pointer;
            }
    </style>

<body>
<div style="margin-top:60px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRƯỜNG THPT CẦU KÈ</div>
<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRANG QUẢN TRỊ</div>
  <div class="wrap">
		<div class="avatar">
      <img src="../assets/img/images/boss.png" >
		</div>
		<form action="login_admin.php" method="post" >  
		<input type="text" name="txtuser" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpass" placeholder="Mật Khẩu" required>
		<a href="" class="forgot_link">làm mới ?</a>
		<button><input  type="submit" name="ok" value="Đăng Nhập" /></button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>