<?php
/* Thong ke.php
Người viết: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com

*/
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] != 3)
{
	header('location: index.php');
}else{
 
require ('../include/mysqlConnect.php');
$time_now = time();    // lưu thời gian hiện tại
$time_out = 60; // khoảng thời gian chờ để tính một kết nối mới (tính bằng giây)
$ip_address = $_SERVER['REMOTE_ADDR'];    // lưu lại IP của kết nối
//require_once('connect.php');    // nhúng file kết nối CSDL vào
// kiểm tra xem thời gian hiện tại so với lần truy cập cuối có lớn hơn khoảng thời gian chờ không    
//- nếu không thì thôi    
//- nếu có thì thêm vào như là một kết nối mới
if ( $mysqli->query("SELECT `ip_address` FROM `counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now AND `ip_address` = '$ip_address'")->num_rows)
   $mysql->query("INSERT INTO `counter` VALUES ('$ip_address', NOW())")->num_rows;
// đếm số người đang online
$online = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE UNIX_TIMESTAMP(`last_visit`) + $time_out > $time_now")->num_rows;
// đếm số người ghé thăm trong ngày (từ 0h ngày hôm đó đến thời điểm hiện tại)// z- là số thứ tự ngày trong năm, năm đây là năm có 365 ngày
$day = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 1) . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm ngày hôm qua// . (date('z') +1+ 0) .  =  . (date('z') + 1 ) .  =>  . (date('z') + 1 - 1 ) . = . (date('z') + 0) .// lùi lại 1 ngày nên trừ đi 1
$yesterday = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE DAYOFYEAR(`last_visit`) = " . (date('z') + 0) . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm trong tuần (từ 0h ngày thứ 2 đến thời điểm hiện tại)

$week = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE WEEKOFYEAR(`last_visit`) = " . date('W') . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm tuần rồi//.date('W') . =. (date('W') ). =. (date('W') + 0 ).  => . (date('W') + 0 -1 ). . (date('W')  -1 ). // lùi lại 1 tuần nên trừ 1
$lastweek = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE WEEKOFYEAR(`last_visit`) = " . (date('W') -1 ) . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;

// đếm số người ghé thăm trong tháng
$month = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE MONTH(`last_visit`) = " . date('n') . " AND YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm số người ghé thăm trong năm
$year = $mysqli->query("SELECT `ip_address` FROM `counter` WHERE YEAR(`last_visit`) = " . date('Y'))->num_rows;
// đếm tổng số người đã ghé thăm
$visit = $mysqli->query("SELECT `ip_address` FROM `counter`")->num_rows;

//mysql_close();
?> 
 
<html>
<head>
</head>
<div>
	<h3>Bảng điều khiển</h3>
	<div  class="thongke"> <!-- khung thống kê -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thống kê</h2>
		  </div>
		  <div class="panel-body">
		     <div class="col-md-4" >
			     <div class="padding-5"><a href="./danhmuc.php"><span class="glyphicon glyphicon-pushpin"></span>Danh mục: <span class="badge">
			     <?php 
			     // count_sql('danhmuc');
			     ?>
			     </span></a></div>
			     <div class="padding-5"><a href="./kenh.php"><span class="glyphicon glyphicon-sound-stereo"></span>Tổng số kênh: <span class="badge">
			     <?php 
			     // count_sql(); // đếm tổng số kênh hiện có 
			     ?>
			     </span></a></div>
			     <div class="padding-5"><a href="?tab=gopy"><span class="glyphicon glyphicon-envelope"></span>Góp ý: <span class="badge">
		     	<?php 
		     	//count_sql('gopy'); // Đếm tổng số góp ý
			     ?>
		     	</span></a></div>
			 </div>
		     <div class="col-md-4" >
		     	<div class="padding-5"><span class="glyphicon glyphicon-stats"></span>Số lượt xem hôm nay :<span class="badge">
			     <?php echo $day; // đếm tổng số kênh hiện có 
			     ?></span></div>
			     <div class="padding-5"><span class="glyphicon glyphicon-stats"></span>Tổng số lượt xem: <span class="badge">
			     <?php echo $visit; // đếm tổng số kênh hiện có 
			     ?></span></div>
			     <div class="padding-5" ><span class="glyphicon glyphicon-user"></span>Đang trực tuyến: <span class="badge">
			      <?php echo $online; // đếm tổng số kênh hiện có 
			     ?>
			     </span></div>
			 </div>
		  </div>
		</div>
	</div>
	<div class="panel panel-default them_kenh">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thêm kênh nhanh</h2>
		  </div>
		  <div class="panel-body">
		    <div class="kenh_label" style="width: 30%;height: inherit;float: left; padding: 10px 0;" >
				<span>Tên kênh: </span>
				<span>Mô tả: </span>
				<span>Nhà cung cấp: </span>
				<span>Link phát: </span>
				<span>Link logo: </span>
				<span>Danh mục: </span>
				<span>Sắp xếp: </span>
			</div>
			
			<div class="input"style="width: 69%;height: inherit;float: left;">	
			<form method="post" action="./updatechanel.php"  enctype="multipart/form-data">
				<input class="form-control" type="textbox" name="kenh_name" placeholder="Nhập tên kênh *" required />
				<input class="form-control" type="textbox" name="kenh_des" placeholder="Nhập mô tả ngắn, hoặc tên đầy đủ của kênh *" required />
				<input class="form-control" type="textbox" name="kenh_cungcap" placeholder="Nhà cung cấp" />
				<input class="form-control" type="textbox" name="kenh_url" placeholder="URL *" required />
				<input class="form-control" type="file" name="logo">
				<select class="dropdown input-group" name="catid">
					<?php show_option_cat();  // chon danh muc
					?> 	
				</select>
				<input class="form-control" type="textbox" name="kenh_stt" placeholder="Vị trí (Mặc định: 1) " />
				<input class="btn btn-default" type="button" name="check" value="Kiểm tra link" onclick="checkChanel()" style="padding: 5px; margin: 10px; float: left;"/>
				<input class="btn btn-default" type="submit" name="add" value="Thêm Kênh" style="padding: 5px; margin-top: 10px; float: left; "/>

			</form>

			</div>
		  </div>
		</div>
<!--
	<div  class="themnhanh"> 
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h4 class="panel-title">Thêm kênh nhanh</h4>
		  </div>
		  <div class="panel-body">
		    Panel content
		  </div>
		</div>
	</div>
	-->
</div>
</html>
<?php 
	mysql_close();
} //End if else
 ?>