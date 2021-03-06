<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php 
	ob_start();
if(!isset($_SESSION)) {
	session_start();
	}	
if(!isset($_SESSION['user_name']) && isset($_COOKIE['user_name'])){
          $_SESSION['user_name'] = $_COOKIE['user_name'];
        }elseif (!isset($_SESSION['user_name']) && (!isset($_COOKIE['user_name']))){
        	header("Location: ./login.php");
        }
        $username = $_SESSION['user_name'];

include_once ('./include/head.php');?>
</head>
<body>
<script type="text/javascript" src="./template/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/on-scroll.js"></script>
<script type="text/javascript" src="./plugin/ckeditor/ckeditor.js"></script>
<!-- script type="text/javascript" src="./plugin/ckeditor/sample.js"></script -->
<script type="text/javascript" src="./js/post-info.js"></script>
<div id="wrapper"  class="container">
  <header>
    <?php include_once('./template/header.php');?>

  </header>
  <div id="main">
	   <article>
	 <div id="left">
	<div class="thongtinnhatro">
<form name="check" onsubmit="return checkpost()" action="postProcess.php" method="post" enctype="multipart/form-data">  <!-- 
    thuoc tinh action phai nam sau onsubmit thi du lieu moi duoc kiem tra truoc khi chuyen toi action
    -->
	<div id="thongtincoban" class="margin_bottom padding-10">
    <div class="headline_16">
			<h2><span class="label label-primary">1 - ĐIỀN THÔNG TIN NHÀ TRỌ</span></h2>
			<hr />
			<h4><span class="label label-warning"><strong>Lưu ý: </strong>Những mục có dấu * là thông tin phải điền đầy đủ. </span></h4>
	<br />
	</div>
        
		<?php 
		require_once ('./include/mysqlConnect.php');
		?>
		<fieldset>
    <div class="row">
        <div class="col-md-2">
				<label>Tên nhà trọ <span class="hightlight">*</span></label>
		</div> 
		<div>
		<div class="col-md-2">
				<select id="nhatro-type" name="nhatro-type" class="form-control" required>
					<option selected disabled>-- Chọn loại *--</option>
					<option value="1">Cho thuê phòng</option>
					<option value="2">Tìm người ở ghép</option>
				</select>
				<p id="jstype" class="hide" >* Chọn loại</p> 
		</div>
			<div class="col-md-8">
				<input id="title" class="form-control" maxlength="50" name="title" type="text" value="<?php if(isset($_POST['title'])) echo $_POST['title']; ?>" required/>
				<p class="hide" id="jstitle">* Cần nhập tên nhà trọ</p>
			</div>
			
		</div>
    </div>                
        <!-- Địa điểm -->
        
			<?php
			$sel_quan = $sel_phuong = $sel_duong ='';
			if(isset($_POST['option-quan'])) $sel_quan = $_POST['option-quan'];
			if(isset($_POST['option-phuong'])) $sel_phuong = $_POST['option-phuong'];
			if(isset( $_POST['option-duong'])) $sel_duong = $_POST['option-duong'];

				$sql_quan = sprintf('SELECT quan_id,quan_name FROM quan;');
				$rs1=$mysqli->query($sql_quan);
				$op_quan="";
					while ($rows = $rs1->fetch_array()){
					$op_quan.="<option value='".$rows['quan_id']."'".(($rows['quan_id']==1)?'selected=selected':'').">".$rows['quan_name']."</option>";
				}
				$sql_phuong = sprintf('SELECT phuong_id,phuong_name FROM phuong;');
				$rs2=$mysqli->query($sql_phuong);
					$op_phuong="";
					while($rows=$rs2->fetch_array()){
					$op_phuong.="<option value='".$rows['phuong_id']."'>".$rows['phuong_name']."</option>";
				}
				$sql_duong = sprintf('SELECT duong_id,duong_name FROM duong;');
				$rs3=$mysqli->query($sql_duong);
				$op_duong="";
					while($rows=$rs3->fetch_array()){
				$op_duong.="<option value='".$rows['duong_id']."'>{$rows['duong_name']}</option>";
					}
			?>
		<br />
		
		<div class="row">
			<div class="col-md-2">
				<label>Địa chỉ nhà trọ:  <span class="hightlight">*</span></label>
			</div>
			<div class="col-md-10">
				<div><input class="form-control" id="sonha" maxlength="100" name="sonha" placeholder="Số nhà" type="text" value="<?php echo (isset($_POST['sonha'])) ? $_POST['sonha'] : ''; ?>" required/>
		        <p id="jssonha" class="hide" >* Cần nhập số nhà</p> 
		        </div>
	        </div>
	    </div> 
	    <br />
	    <div class="row"> 
			<div class="col-md-offset-2 row">
			<div class="col-md-3 col-sm-3">
				<select class="form-control" id="option-quan" name="option-quan" disabled="disabled">
		                    <?php echo $op_quan; ?>
		        </select>
	        </div>
			 <div class="col-md-4 col-sm-3">
				<select id="option-phuong" class="form-control" name="option-phuong">
		                    <option selected disabled>Chọn Phường</option>
		                                    <?php echo $op_phuong; ?>
		        </select>
	        </div>

			<div class="col-md-4 col-sm-5">
				<select id="option-duong" class="form-control" name="option-duong" required>
		            <option selected disabled>Chọn Đường</option>
		                                    <?php echo $op_duong; ?>
		        </select> <!-- / -->
	        </div>
	       
	        
		
			 <!-- / -->
        	</div>
        </div>    <!-- // location -->
        <br />
        <h3>Đặc điểm nhà trọ:</h3>
        <hr />	

        <div class="row"> <!-- living_area -->
		
        	<div class="col-md-2">
        	<label>Diện tích:
        	</label>
			</div>
			<div class="col-md-4">
				<input id="dientich" class="form-control" maxlength="9" name="dientich" type="text" placeholder="Diện tích: (m2)" value="<?php if(isset($_POST['dientich'])) echo $_POST['dientich']; ?>" />

			</div>
			<div class="col-md-6">
				<div class="col-md-3"><label>Số phòng:</label>
				</div>
							<div class="col-md-9">
							<select  name="soluong" class="form-control">
					        		<option value="0" selected disabled>Số Phòng</option>
                          		  <?php for ($i=1;$i<=30;$i++)
                                   echo '<option value='.$i.'>'.$i.'</option>';
                          		  ?>
                </select>
                </div>
        	</div>
        </div> <!-- // row living_area -->
			<br />
        <div class="info-detail">
        	<label>Bấm chọn các đặc điểm: </label><p class="jscheck">*(tối thiểu chọn 2 đặc điểm)</p><br />
			
			<ul class="details col-md-offset-1">
				
				<li>
				<ul>
					<li><input type="checkbox" name="detail" id="1" value="1" /><label for="1">Gần chợ, siêu thị</label></li>
					<li><input type="checkbox" name="detail" id="2" value="2" /><label for="2">Có bang công, thoáng mát</label></li>
					<li><input type="checkbox" name="detail" id="3" value="3" /><label for="3">Có sẵn tủ quần áo</label></li>
					<li><input type="checkbox" name="detail" id="4" value="4" /><label for="4">Có máy lạnh</label></li>
					<li><input type="checkbox" name="detail" id="5" value="5" /><label for="5">Có kệ bếp nấu ăn trong phòng</label></li>
					<li><input type="checkbox" name="detail" id="6" value="6" /><label for="6">Phòng có toilet riêng</label></li>
				</ul>
				</li>
				<li>
				<ul>					
					<li><input type="checkbox" name="detail" id="7" value="7" /><label for="7">Phòng mới xây</label></li>
					<li><input type="checkbox" name="detail" id="8" value="8" /><label for="8">Chỗ để xe riêng</label></li>
					<li><input type="checkbox" name="detail" id="9" value="9" /><label for="9">Có cáp truyền hình</label></li>
					<li><input type="checkbox" name="detail" id="10" value="10" /><label for="10">Có Internet ADSL</label></li>
					<li><input type="checkbox" name="detail" id="11" value="11" /><label for="11">Có Internet Wifi</label></li>
					<li><input type="checkbox" name="detail" id="12" value="12" /><label for="12">Giờ giấc tự do</label></li>
					<li><input type="checkbox" name="detail" id="13" value="13" /><label for="13">Không cần đặt cọc</label></li>
				</ul>
				</li>
			</ul>
		</div>
		<div class="living_area">
			<label>Nội dung mô tả</label><br/>
						<div class="number">
							<textarea class="ckeditor" cols="20"  rows="100" id="Detail" name="Detail-more" style="height:80px;width:100%;float:none"></textarea>
						</div>
					<br />
		</div>
		<div class="row">
			<div class="col-md-2"><label>Giá cho thuê <span class="hightlight">*</span></label></div>
			<div class="col-md-4">
			<input id="cost" class="currency"  min="100" max="10000" step="50"  maxlength="6" name="cost" type="number" value="500" placeholder="Đơn vị nghìn đồng" style="height: 30px" required/>.000 VNĐ / tháng 
					<p class="hide" id="jscost">* Giá cho thuê tối thiểu 100.000đ tối đa 10.000.000 và phải là số có bội là 50.000đ</p>
			</div>
        </div>
		</fieldset>
		</div>
    </div>
	<div class="hinhanh">
	<label>Hình ảnh nhỏ *(bạn phải tải lên ít nhất một ảnh của nhà trọ)</label>
		<input type="file" name="img1" required>
		<input type="file" name="img2">
		<input type="file" name="img3">

	</div>

    <hr />
    <div id="thongtinlienhe" class="rounded_style_1 rounded_box col_900 margin_bottom">
    <?php
    	if(isset($username)){
    	$sqlprofile = "SELECT user_fullname,user_sdt,user_email FROM users WHERE user_name='{$username}' LIMIT 0,1";
    	$result = $mysqli->query($sqlprofile);
    	$row=$result->fetch_array();

    	}
    ?>
    <script type="text/javascript">
    	//Gan thong tin da lay duoc vao bien javascript

			hoten="<?php echo $row['user_fullname']; ?>";
			sdt = "<?php echo $row['user_sdt']; ?>";
			//email = "<?php echo $row['user_email']; ?>";
			//xu ly xu kien onclick
			function loadInfo(ckControl){
			if(ckControl.checked){
				document.getElementById("name").value=hoten;
				//document.getElementById("email").value=email;
				document.getElementById("ContactPhone").value=sdt;
			}
			else{
				document.getElementById("name").value='';
				//document.getElementById("email").value='';
				document.getElementById("ContactPhone").value='';
				}
			}
    </script>
        <div class="headline_16"><h2><span class="label label-warning">2 - THÔNG TIN LIÊN HỆ</span> </h2>
        </div>
        	<div class=""><input id="getinfo" type="checkbox" onClick="loadInfo(this)"><label for="getinfo">  Sử dụng thông tin của bạn</label></div>
        <hr />
		<div>
			<fieldset>
		<div class="row">
			<div class="col-md-2">Họ tên liên hệ<span class="hightlight">*</span></div>
			<div class="col-md-9">
				<input id="name" maxlength="50" name="ten" class="form-control" type="text" value="<?php if(isset($_POST['ten'])) echo $_POST['ten'];?>" placekholder="Nhập vào tên chủ nhà trọ hoặc người liên hệ share phòng" required />
			    <p class="hide" id="jsname">* Nhập họ tên</p>
			</div>
        </div>
        <br />
        <!--
        <div class="row">
			<div class="col-md-2">Email (nếu có):</div>
			<div class="col-md-9">
				<input id="email" maxlength="50" name="email-tro" class="form-control" type="email" value="<?php if(isset($_POST['email-tro'])) echo $_POST['email-tro'];?>" />
			    
			</div>
        </div>
        <br />
        -->
		<div class="row">
		<div class="col-md-2">Số điện thoại 1:  <span class="hightlight">*</span></div>
		<div class="col-md-3">
			<input id="ContactPhone" class="form-control" maxlength="20" name="ContactPhone1" type="text" value="<?php if(isset($_POST['ContactPhone1'])) echo $_POST['ContactPhone1'];?>" required/>
			<p class="hide" id="jsphone">* Nhập ít nhất một số điện thoại</p>
		</div>
		<div class="col-md-2">Số điện thoại 2:</div>
		<div class="col-md-3"><input id="ContactPhone2" class="form-control" maxlength="20" name="ContactPhone2" type="text" value="<?php if(isset($_POST['ContactPhone2'])) echo $_POST['ContactPhone2'];?>" /> 
		</div>
		</div>		
			
			</fieldset>
		</div>
    </div>
	<div>
				<p class="alert alert-danger">Khi nhấn nút <strong>ĐĂNG THÔNG TIN</strong>, bạn đã xác nhận hoàn toàn đồng ý với những <a href="./dieukhoan.php" target="_blank"><strong>Điều khoản và Nội quy</strong></a> của website</p>
	</div>
	<div id="check" class="hide alert alert-warning"></div>
	<div style="text-align: center">
	<button type="submit" name="Submit" id="Submit" class="btn btn-success btn-default"><span class="glyphicon glyphicon-ok"></span>  ĐĂNG THÔNG TIN</button>
        <button type="reset" value="Hủy bỏ" id="btnReset" class="btn btn-warning btn-default"><span class="glyphicon glyphicon-remove"></span>  HỦY BỎ</button>
    </div>	    
</form>
    </div> <!-- // THong tin nha tro -->
    
        </div> <!-- // End #left -->
        <div id="right">
          <?php 
      		include ('./template/right.php');
      	   ?>
        </div>
     </article>
</div> <!-- END Container -->
</div> <!-- // End Wrapper -->
<footer>
<?php 
    include_once ('./template/footer.php');
?>

</footer>
</body>
</html>