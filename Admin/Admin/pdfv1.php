<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="../css/jquery-ui.css" />
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
    </script>
    <style>
        @media print{
            @page{
                size: 8.5in 11in;
            }
        }
        
        #print{
            border:2px solid #000;
            width:700px;
            height:850px;
            max-width:650px;
            max-height:800px;
            margin:auto;
            font-size:12px;
        }
        table {
            border-collapse: collapse;
            }

        table, td, th {
            border: 1px solid black;
        }
    </style>
</head> 
<body> 
<button onclick="printContent('print')">Print Content</button>
<button><a style = "text-decoration:none; color:#000;" href = "visitors.php">Back</a></button>
<?php
include("../../inc/connect.php") ;
 $_SESSION['date'] = date("d-m-Y");
     
    $query = $conn->query("SELECT p_visitor.v_id,concat(firstname,' ',middlename,' ',lastname) as name,phone_no,idno,bed_trans.p_id,bed_trans.name as pat FROM p_visitor left join bed_trans on bed_trans.v_id=p_visitor.phone_no where bed_trans.v_id is not null order by p_visitor.v_id") or die(mysqli_error());
    $f = $query->fetch_array();
?>

<br />
<br />
    <div id="print">
        <div style = "margin:10px;">    <br />      
            <center>REPUBLIC OF KENYA</center>
            <center>MOH</center>
            <center>MATHARI HOSPITAL</center>
            <br />
             <center><b>PATIENTS VISITORS</b></center>
            <br />
            <label>Date:
                <?php echo "<u>".
                       date("d-m-Y")."</u>";
                    ?>
            <br />
            <br />
            <center>
                <table>
                        <tr>
                            <th style = "padding-right:20px;padding-left:20px;"><center>ID.</center></th>
                            <th style = "padding-right:70px;padding-left:70px;"><center>Visitor</center></th>
                            <th style = "padding-left:20px; padding-right:20px;"><center>Phone</center></th>
                            <th style = "padding-right:20px;padding-left:20px;"><center>ID NO</center></th>
                            <th style = "padding-right:20px;padding-left:20px;"><center>P ID</center></th>
                            <th style = "padding-right:60px;padding-left:60px;"><center>Patient</center></th>
                        </tr>
                <?php
               
               /*  if(isset($_POST['print_patient'])){
        $from =  date("d/m/Y", strtotime($_POST['date']));
        $to =date("d/m/Y", strtotime( $_POST['dateto']));
        $gender= $_POST['gender'];
        $region = $_POST['region'];

        //if($gender==null  && $region==null){
          $query =$conn->query( "SELECT `id`,concat(fname,' ',lname) as name,`phone`,`gender`,`address` FROM patient order by id") or die(mysqli_error());

       }else if( $gender !=null  && $region==null){
            $query = $conn->query( "SELECT patient.pat_no,concat(firstname,' ',lastname) as name,gender,address,civil_status,huduma_no FROM patient left join patient_hrecold on patient_hrecold.pat_no=patient.pat_no where patient_hrecold.date between '$from' and '$to' and gender= '$gender' order BY patient.pat_no '")or die(mysqli_error());
        }else if( $gender !=null  && $region !=null){
            $query= $conn->query( "SELECT patient.pat_no,concat(firstname,' ',lastname) as name,gender,address,civil_status,huduma_no FROM patient left join patient_hrecold on patient_hrecold.pat_no=patient.pat_no where patient_hrecold.date between '$from' and '$to' and gender= '$gender' and  address= '$region' order BY patient.pat_no '") or die(mysqli_error());
       }else if( $gender ==null  && $region !=null){
             $query = $conn->query( "SELECT patient.pat_no,concat(firstname,' ',lastname) as name,gender,address,civil_status,huduma_no FROM patient left join patient_hrecold on patient_hrecold.pat_no=patient.pat_no where patient_hrecold.date between '$from' and '$to' and  address= '$region' order BY patient.pat_no '") or die(mysqli_error());
        }*/
        $query = $conn->query("SELECT p_visitor.v_id,concat(firstname,' ',middlename,' ',lastname) as name,phone_no,idno,bed_trans.p_id,bed_trans.name as pat FROM p_visitor left join bed_trans on bed_trans.v_id=p_visitor.phone_no where bed_trans.v_id is not null order by p_visitor.v_id") or die(mysqli_error());
        $cnt=$query->num_rows;
                    for($a = 1; $a <= $cnt; $a++){
                        $fetch = $query->fetch_array()
                ?>
                    <tr>
                        <td><center><?php echo $fetch['v_id']?></center></td>
                        <td><center><?php echo $fetch['name']?></center></td>
                        <td><center><?php echo $fetch['phone_no']?></center></td>
                        <td><center><?php echo $fetch['idno']?></center></td>
                        <td><center><?php echo $fetch['p_id']?></center></td>
                        <td><center><?php echo $fetch['pat']?></center></td>
                    </tr>
                <?php
                    }
                    $conn->close();
                ?>
                </table>
            </center>
        </div>
    </div>
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
</html>