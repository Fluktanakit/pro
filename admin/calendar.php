<!DOCTYPE html>
<html lang="en">
<?php $menu = "calendar";?>
<?php include("head.php"); ?> 

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include("navbar.php"); ?> 
  <!-- /.navbar -->
  <?php include("menu.php"); ?> 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
         <a href="calendar.php?act=add" class="btn btn-app bg-success">
            <i class="fas fa-users"></i> เพิ่มข้อมูล</a> 
          <!-- ./col -->
           <div class="col-md-10">
            <?php 
            $act = (isset($_GET['act']) ? $_GET['act'] : '');
            if ($act == 'add') {
            include('calendar_add.php');
            }elseif ($act == 'edit') {
            include('calendar_edit.php');
            }
            else{
            include('calendar_list.php'); 
            }
            ?>
          </div>
        </div>
        <!-- /.row -->
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("footer.php"); ?> 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
  <?php include("script.php"); ?> 
</body>
</html>
