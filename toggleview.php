<?php
include('partials/db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';

}

$sql = "SELECT * FROM ads WHERE ad_id='$id'";
$query_run = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query_run);

$view = $data['view_status'];

if($view === '1'){
    $view  = '0';

}else {
    $view = '1';
}
$update = "UPDATE ads SET view_status = '$view' WHERE ad_id='$id'";
$set_view = mysqli_query($conn, $update);


if(mysqli_affected_rows($conn)>0){
    echo '<script type="text/javascript">toastr.success("Ad view Changed")</script>';
    header("location:userprofile.php");
}else{
    echo '<script type="text/javascript">toastr.error("Error Occoured !!!")</script>';
}

?>