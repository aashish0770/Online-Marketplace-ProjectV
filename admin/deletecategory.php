<?php
include("../partials/db.php");
$id = $_GET['id']; 

$sql = "DELETE FROM categories WHERE cat_id = '$id'";

$query_run = mysqli_query($conn, $sql);

// header("Location:userprofile.php");

if(mysqli_affected_rows($conn)>0){
    echo '<script type="text/javascript">toastr.success("Deleted Successfully")</script>';
    header("Location:categories.php");
}else{
    echo '<script type="text/javascript">toastr.error("ID Not Found !!!")</script>';
}

?>