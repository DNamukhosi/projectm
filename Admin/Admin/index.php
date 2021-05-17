<?php
include"../../inc/connect.php";
//echo "string"; exit;
?>
<?php include"../Include/header.php";?>
<?php include"../Include/sidebar.php";?>
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
       <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
           <?php 
                $sql="SELECT count(*) FROM patients";
    $write =$conn->query($sql) or die(mysqli_error());
     $row=$write->fetch_array();
   //print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Patient</p>
            </div>
            <div class="icon">
              <i class="fa fa-wheelchair"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php 
                $sql="SELECT count(*) FROM p_appointments";
    $write =$conn->query($sql) or die(mysqli_error());
     $row=$write->fetch_array();
   //print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Appointment</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
                   <?php 
                $sql="SELECT count(*) FROM p_medication";
    $write =$conn->query($sql) or die(mysqli_error());
     $row=$write->fetch_array();
   //print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Medicine</p>
            </div>
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
                   <?php 
                $sql="SELECT count(*) FROM beds"             ;
     $write =$conn->query($sql) or die(mysqli_error());
     $row=$write->fetch_array();
   //print_r($row); exit;
                ?>
              <h3><?php echo $row[0];?></h3>

              <p>Services</p>
            </div>
            <div class="icon">
              <i class="fa fa-pencil-square-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
      <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
    
      </div>
    </section>
    <!-- /.content -->
  </div>
 <?php include"../Include/footer.php";?>