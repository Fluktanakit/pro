<?php
session_start();
?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Document</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="m_img/<?php echo $_SESSION['m_img']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $_SESSION['m_name']; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-header">ผู้ดูแลระบบ</li>
          <!-- <li class="nav-item">
            <a href="index.php" class="nav-link <?php if($menu=="index"){echo "active";} ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>สาขาเทคโนโลยีสารสนเทศ</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="department.php" class="nav-link <?php if($menu=="department"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการปีการศึกษา</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="calendar.php" class="nav-link <?php if($menu=="calendar"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดปฏิทินการศึกษา</p>
            </a>
          </li>
     
          <li class="nav-item">
            <a href="member.php" class="nav-link <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการสมาชิก</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="type.php" class="nav-link <?php if($menu=="type"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการประเภท</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="doc.php" class="nav-link <?php if($menu=="doc"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>จัดการเอกสาร</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="check_pro.php" class="nav-link <?php if($menu=="check_pro"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>ตรวจเล่มโครงงาน</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="view_comment.php" class="nav-link <?php if($menu=="view_comment"){echo "active";} ?> ">
              <i class="nav-icon fas fa-edit"></i>
              <p>คอมเม้น</p>
            </a>
          </li>

     
          <li class="nav-header">ออกจากระบบ</li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link"  onclick="return confirm('ยืนยันออกจากระบบ !!');">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">ออกจากระบบ</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>