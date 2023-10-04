<?php
include("../partials/db.php");
include("partials/header.php");

if (!isset($_SESSION["user_email"])) {

    header("Location:login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';

}

$sql = "DELETE FROM ads WHERE ad_id = '$id'";

$query_run = mysqli_query($conn, $sql);

// header("Location:userprofile.php");

if(mysqli_affected_rows($conn)>0){
    echo '<script type="text/javascript">toastr.success("Product Not Found !!!")</script>';
    header("Location:pendingproduct.php");
}else{
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';
}

?>