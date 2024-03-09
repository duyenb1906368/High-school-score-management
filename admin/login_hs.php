<?php
session_start();
require '../classes/db.class.php';
$connect=new DB();
$con=$connect->connect();
$uhs=$phs="";

if(isset($_POST['hs'])){
	if($_POST['txtuserhs'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập Tên Tài Khoản.");
		window.location="login_hs.php";
		</script>
		<?php
		exit();
	}else{
		$uhs=$_POST['txtuserhs'];

	}
	if($_POST['txtpasshs'] == null){
		?>
		<script type="text/javascript">
		alert("Bạn Chưa Nhập mật khẩu Tài Khoản.");
		window.location="login_hs.php";
		</script>
		<?php
		exit();
	}
	else{
		$phs=$_POST['txtpasshs'];
	}
	if($uhs && $phs){
		
		//require("../includes/config.php");
		

		$query="select * from hocsinh where HS_MA='$uhs' and HS_PASSWORD='$phs'";
		$results = mysqli_query($con,$query);
		if($rowcount=mysqli_num_rows($results) ==0) {
				?>
				<script type="text/javascript">
					alert("Tên Truy cập Hoặc Mật Khẩu chưa chính Xác. Vui Lòng Nhập Lại!!");
					window.location = "login_hs.php";
				</script>
				<?php
				exit();
			} else {
				$data=mysqli_fetch_assoc($results);
				$_SESSION['ses_MaHS'] = $data['HS_MA'];
				$_SESSION['ses_passwordhs']=$data['HS_PASSWORD'];
				header("location:qlhs.php");
				exit();
			}
		}
	$dis=$con->close();
}
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>TRANG ĐĂNG NHẬP HỌC SINH</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

      <!-- <link rel="stylesheet" href="../../assets/style.css"> -->

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
<div style="margin-top:20px;text-align: center;font-weight: bold;font-size: 25px;font-family: Tahoma ">TRA CỨU ĐIỂM</div>
  <div class="wrap" style="margin-top:30px">
		<div class="avatar">
      <img src="../assets/img/images/hs.png">
		</div>
		<form action="login_hs.php" method="post">
		<input type="text" name="txtuserhs" placeholder="Tên tài khoản" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpasshs" placeholder="Mật Khẩu" required>
		<a href="" class="forgot_link">Làm mới lại?</a>
		<button><input type="submit" name="hs" value="Đăng Nhập" /></button>
	</form>
	</div>
<br/>
<div style="border: 1px solid #CDCDCD;background-color: #e4e0d8;width: 500px;margin-left: 440px;font-family: Tahoma">
	<h6 style="font-weight: bold">Một số hướng dẫn cần thiết :</h6>
	<li>Đối tượng sử dụng : Học Sinh THPT Cầu Kè.</li>
	<li>Học sinh đăng nhập vào hệ thống bằng mã số học sinh.</li>
	<li>Mật khẩu mặc định là mã số học sinh.</li>
	<li>Khi truy cập lần thứ nhất, học sinh lưu ý :</li>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Phải thay đổi mật khẩu.</h6>
	<h6>&nbsp &nbsp &nbsp &nbsp &nbsp - Trong quá trình truy cập, nếu có thắc mắc gì hay quên</h6>
		<h6>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp&nbsp&nbsp mật khẩu truy cập học sinh liên hệ nhà trường tạo qua</h6>
			<h6>&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp địa chỉ email: quanlyhs@gmail.com.</h6>
</div>
    <script src="js/index.js"></script>

</body>&nbsp
</html>