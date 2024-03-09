<?php
require '../classes/db.class.php';
session_start();
$u=$_SESSION['ses_MaGV'];
$pgv=$_SESSION['ses_passwordgv'];
?>
<?php
$connect=new DB();
$con=$connect->connect();
$old=$new=$pre=" ";
if(isset($_POST['gv'])){
	if($_POST['txtpassgv'] == null){
		echo "Ban chua nhap mat khau!!";
	}else{
		if($_POST['txtpassgv'] != $pgv){
			echo "Mat khau moi va mat khau cu khong trung!!";
		}else{
			$old=$_POST['txtpassgv'];
		}
	}
	if($_POST['txtpassgv2'] == null){
		echo "Ban chua nhap mat khau moi!!";
	}else{
		if($_POST['txtpassgv2'] != $_POST['txtpassgv3']){
			echo "Mat khau nhap vao khong trung nhau!!";
		}else{
			$mk="/^[a-zA-Z0-9]{6,}$/";
			if(preg_match($mk,$_POST["txtpassgv2"])) {
				$new = $_POST['txtpassgv2'];
			}else{
				?>
				<script type="text/javascript">
					alert("Password Nhap Vao Khong Hop Le!!");
					window.location="repass1.php";
				</script>
				<?php
				exit();
			}
		}
	}
	if($u && $pgv && $old && $new && $pre){
		$query="update giaovien SET GV_PASSWORD = '$new' where GV_MA = $u";
		$results = mysqli_query($con,$query);
		?>
		<script type="text/javascript">
		alert("Đa Thay doi mat khau thanh cong!!");
		window.location="qlgv.php";
		</script>
		<?php
		exit();

	}
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Thay Đổi Mật Khẩu</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <!-- <link rel="stylesheet" href="../assets/css/css/style.css"> -->

  
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
  <div class="wrap">
		<div class="avatar">
      <img src="../assets/img/images/gv.jpg">
		</div>
		<form action="repass1.php" method="post">
		<input type="password" name="txtpassgv" placeholder="Mật khẩu" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpassgv2" placeholder="Mật khẩu mới" required>
		<div class="bar">
			<i></i>
		</div>
		<input type="password" name="txtpassgv3" placeholder="Nhập lại mật khẩu mới" required>
		<a href="" class="forgot_link">forgot ?</a>
		<button><input type="submit" name="gv" value="Thay đổi" /></button>
	</form>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>