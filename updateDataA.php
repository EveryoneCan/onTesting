<?php  session_start();
include_once('nNdbCon/nnCon.php');  
$DATAidno=$_SESSION["idNo"];


$dte="";

//trim the data
function tt_inpt($dte)
{  
    $dte = trim($dte);
    $dte = stripslashes($dte);
    $dte = htmlspecialchars($dte);
    return $dte;
}

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
$std_FName=tt_inpt($_POST['vafirstName']);
$std_Lname=tt_inpt($_POST['vaLastName']);
$std_Password=tt_inpt(md5($_POST['vaPassword']));
$std_Emil=tt_inpt($_POST['vaEmail']);
$std_Address=tt_inpt($_POST['vaAdress']);

}

//revert to the index when the records are empty or null
if(empty($std_FName) || $std_FName==''){
    header("location:updateData.php");
    die();
}


$sql = "UPDATE emp_info SET emp_Salutation='$std_Lname' WHERE empId='$DATAidno'";
if(mysqli_query($nnConnString, $sql)){
    echo "Records were updated successfully.";
} 




?>

