<?php 

session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] != 3)
{
	header('location: index.php');
}else{
include ('./template/header.php');
?>


    <!-- bat dau Thân trang web -->
<div id="wrap" class="container">  
  <div class="left_col">
      <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  </div>
        
  <div class="right_col">
<?php
	 
?>
        </div> <!-- end Right -->
</div><!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->
<?php
include ('template/footer.php');
}
?>

