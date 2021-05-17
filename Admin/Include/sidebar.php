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
        </div>
      </div>
     
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
            <i class="fa fa-user"></i> <span>Admin</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-user"></i>Admin List</a></li>
           </ul>
        </li>
       <li class="treeview">
            <a href="#">
              <i class="fa fa-laptop"></i> <span>Doctors</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="doctor.php"><i class="fa fa-list"></i> Doctors</a></li>
              <li><a href="attendant.php"><i class="fa fa-list"></i> Attendants</a></li>
             </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Wards</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="words.php"><i class="fa fa-briefcase"></i> Wards</a></li>
             <li><a href="beds.php"><i class="fa fa-briefcase"></i> Beds</a></li>
           </ul>
        </li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i> <span>Patients</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="patientadm.php"><i class="fa fa-plus-circle"></i>View In-patients</a></li>
            <li><a href="patients.php"><i class="fa fa-plus-circle"></i>View Out-patients</a></li>
            <li><a href="manage-words.php"><i class="fa fa-medkit"></i>Manage Wards</a></li>
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
            <li><a href="visitors.php"><i class="fa fa-plus-circle"></i> Reg. Visitors</a></li>
            <li><a href="appv.php"><i class="fa fa-plus-circle"></i>View Visitors</a></li>
          </ul>
        </li>
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>