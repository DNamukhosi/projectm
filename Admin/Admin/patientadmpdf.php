<!DOCTYPE html>
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
<button><a style = "text-decoration:none; color:#000;" href = "patientadm.php">Back</a></button>
<?php
    $_SESSION['date'] = date("d-m-Y");
   include("../../inc/connect.php") ;

   $ddt = date("Y-m-d");
    $tt="1";
    $query = $conn->query("SELECT distinct(p_medication.p_id),p_medication.name,bed,ward,patients.phone_no,patients.gender FROM `p_medication` left join patients on patients.p_id=p_medication.p_id  where admitted='$tt' and discharged <>'$tt' order by p_medication.p_id") or die(mysqli_error());
    //$fetch = $query->fetch_array();
?>

<br />
<br />
    <div id="print">
        <div style = "margin:10px;">    <br />      
            <center>Republic of Kenya</center>
            <center>Ministry of Health</center>
            <center>Mathari Hospital</center>
            <br />
             <center><b>Admitted Patients List</b></center>
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
                            <th style = "padding-right:20px;padding-left:20px;"><center>P. ID</center></th>
                            <th style = "padding-right:70px;padding-left:70px;"><center>Name</center></th>
                            <th style = "padding-right:20px;padding-left:20px;"><center>Gender</center></th>
                            <th style = "padding-right:20px;padding-left:20px;"><center>Phone</center></th>
                            <th style = "padding-right:30px;padding-left:30px;"><center>Ward</center></th>
                            <th style = "padding-left:30px; padding-right:30px;"><center>Bed</center></th>
                        </tr>
                <?php
       $tt="1";
    $query = $conn->query("SELECT distinct(p_medication.p_id),p_medication.name,bed,ward,patients.phone_no,patients.gender FROM `p_medication` left join patients on patients.p_id=p_medication.p_id  where admitted='$tt' and discharged <>'$tt' order by p_medication.p_id") or die(mysqli_error());


        $cnt=$query->num_rows;
                    for($a = 1; $a <= $cnt; $a++){
                        $fetch = $query->fetch_array();
$qry=$conn->query("SELECT * FROM `beds`  where b_id='$fetch[bed]'")or die (mysqli_error());
    $bd=$qry->fetch_array();
     $qy=$conn->query("SELECT * FROM `words`  where w_id='$fetch[ward]'")or die (mysqli_error());
    $wo=$qy->fetch_array();
                ?>
                    <tr>
                        <td><center><?php echo $fetch['p_id']?></center></td>
                        <td><center><?php echo $fetch['name']?></center></td>
                        <td><center><?php echo $fetch['gender']?></center></td>
                        <td><center><?php echo $fetch['phone_no']?></center></td>
                         <td><center><?php echo $wo['name']?></center></td>
                          <td><center><?php echo $bd['name']?></center></td>
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