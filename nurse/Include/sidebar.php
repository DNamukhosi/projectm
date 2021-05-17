<?php
 include"../../inc/connect.php";
//echo "string"; exit;
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
           <?php
$sql="SELECT * FROM sys_user";
    $write =$conn->query($sql) or die(mysqli_error());
     $row=$write->fetch_array();
   
     ?>

          <img src="../../Upload/download.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $row2['firstname'];?>&nbsp;
           <?php echo $row2['lastname'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
         </a>
        </li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i> <span>Patients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="patients.php"><i class="fa fa-plus-circle"></i>Manage Patients</a></li>
           </ul>
        </li>
       <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Visitors</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="visitors.php"><i class="fa fa-user"></i> Visitors</a></li>
              <li><a href="approvevisit.php"><i class="fa fa-list"></i> Approve Visitors</a></li>
             </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Words</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="words.php"><i class="fa fa-briefcase"></i> Words</a></li>
           </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i> <span>My Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="profile.php"><i class="fa fa-#"></i> Manage My Account</a></li>
           </ul>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>