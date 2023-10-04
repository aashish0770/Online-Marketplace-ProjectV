<?php
include("partials/db.php");
$id = $_GET['id']; 

$sql = "DELETE FROM ads WHERE ad_id = '$id'";

$query_run = mysqli_query($conn, $sql);

// header("Location:userprofile.php");

if(mysqli_affected_rows($conn)>0){
    echo '<script type="text/javascript">toastr.success("Product Not Found !!!")</script>';
    header("Location:userprofile.php");
}else{
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';
}

?>