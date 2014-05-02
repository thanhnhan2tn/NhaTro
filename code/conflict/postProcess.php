<html>
<head>
<meta charset="utf-8">
</head>
<body>

<?php
ob_start();
 
 if(!isset($_SESSION)) session_start();

      if(!isset($_SESSION['user_name']) && isset($_COOKIE['user_name'])){
          $_SESSION['user_name'] = $_COOKIE['user_name'];
        }elseif (!isset($_SESSION['user_name']) && (!isset($_COOKIE['user_name']))){
        	header("Location: ./login.php");
        }
        $username = $_SESSION['user_name'];
           
if(isset($_POST['Submit'])){
		if(($_POST['nhatro-type']!=null) ||($_POST['title']!='')|| ($_POST['sonha']!='')
		||($_POST['sonha']!='') ||($_POST['cost']!='')||($_POST['ten']!='')||($_POST['ContactPhone1']!=''))
		{
			require_once './include/function.php';
			 
			$img1= upload_img($_FILES['img1']);
			if(isset($_FILES['img2'])) { $img2 = upload_img($_FILES['img2']); }
			if(isset($_FILES['img3'])) { $img2 = upload_img($_FILES['img3']); }

			$nhatro_img = $img1.", ".$img2.", ".$img3; 
			$nhatro_type = $_POST['nhatro-type'];
			//($_POST['nhatro-type']);
			$nhatro_name = ($_POST['title']);
			//$username;

			$phuong_id=($_POST['option-phuong']);
			$duong_id=($_POST['option-duong']);
			//if(isset($_POST['option-quan'])){ $quan_id=($_POST['option-quan']); }
			$nhatro_dacdiem = ($_POST['detail']);
			$nhatro_mota = ($_POST['Detail-more']);
			$nhatro_sdt = ($_POST['ContactPhone1'].",".$_POST['ContactPhone2']);
			$nhatro_diachi = $_POST['sonha'];
			$nhatro_gia = ($_POST['cost'])*1000;
			//$nhatro_conphong=1; // mac dinh khi moi dang conphong=true
			$nhatro_soluong = ($_POST['soluong']);
			// set the default timezone to use. Available since PHP 5.1
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$ngaydang = Date("H:i, d/m/Y");
			//$nhatro_trangthai =1; // mặc dinh khi mới đăng trạng thái mở
			
			$nhatro_lienhe = $_POST['ten'];
			if(isset($_POST['email-tro'])){$nhatro_email = $_POST['email-tro'];}
			if(isset($_POST['ContactPhone1'])){$nhatro_sdt2 = $_POST['ContactPhone1'];}
			
		
		// insert csdl
		require_once './include/mysqlConnect.php';
		$insert_nhatro = "
			INSERT INTO `csdl_n8`.`nhatro` (`nhatro_id`, `nhatro_name`, `nhatro_type`, `user_name`, `duong_id`, `phuong_id`, `nhatro_dacdiem`, `nhatro_mota`, `nhatro_sdt`, `nhatro_diachi`, `nhatro_gia`, `nhatro_soluong`, `ngaydang`,`nhatro_img`) 
			VALUES (NULL, '".$nhatro_name."', '".$nhatro_type."', '".$username."', '".$duong_id."','".$phuong_id."', '".$nhatro_dacdiem."', '".$nhatro_mota."', '".$nhatro_sdt."', '".$nhatro_diachi."', '".$nhatro_gia."', '".$nhatro_soluong."', '".$ngaydang."','".$nhatro_img."');
			";
		$rs = $mysqli->query($insert_nhatro);

		if($rs==1){
			echo "Thành Công";
			}
		
	} //end submit
		else{
		echo "<script>alert('Thông tin chưa đúng!');</script>";
		header("Location: ./post-info.php");
	}
}else{
		echo "<script>alert('Thông tin chưa đúng!');</script>";
		header("Location: ./post-info.php");
	}

?>

</body>
</html>