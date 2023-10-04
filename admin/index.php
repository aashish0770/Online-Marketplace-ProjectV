<?php
include("./partials/header.php");
include("../partials/db.php");


// get total number of ads from table
$ads_sql = "SELECT * FROM ads";
$ads_query_run =mysqli_query($conn, $ads_sql);
$total_ads = mysqli_num_rows($ads_query_run);

// get total number of users from table
$users_sql = "SELECT * FROM user";
$users_query_run =mysqli_query($conn, $users_sql);
$total_users = mysqli_num_rows($users_query_run);

// get number of pending ads
$pending_ads_sql = "SELECT * FROM ads WHERE approval_status=0";
$pending_ads_query_run =mysqli_query($conn, $pending_ads_sql);
$total_pending_ads = mysqli_num_rows($pending_ads_query_run);

// get number of product added today
$today_ad_sql = "SELECT * FROM ads WHERE DATE(created_at) = CURDATE()";
$today_ad_query_run = mysqli_query($conn, $today_ad_sql);
$today_ads_count = mysqli_num_rows($today_ad_query_run);


// get number of user added today
$today_user_sql = "SELECT * FROM user WHERE DATE(created_at) = CURDATE()";
$today_user_query_run = mysqli_query($conn, $today_user_sql);
$today_users_count = mysqli_num_rows($today_user_query_run);


if (!isset($_SESSION["admin_email"])) {

    header("Location:login.php");
}
?>
    <?php include("./partials/nav.php")?>

    <div class="grid grid-cols-6">
        <div class=" col-span-1">
        <?php include("./partials/sidebar.php")?>

        </div>

        <div class=" col-span-5">

        <!-- <h4 class=" border-b-2 w-full text-lg font-bold">Dashboard</h4> -->

        <div class="m-4 grid grid-cols-2 gap-5">
                <div class=" p-6 text-center bg-green-200 rounded-md">
                    <h3 class="text-4xl font-bold mb-2"><?= $today_ads_count?></h3>
                    <p>Ads Posted Today</p>
                </div>
                <div class=" p-6 text-center bg-green-200 rounded-md">
                    <h3 class="text-4xl font-bold mb-2"><?= $today_users_count?></h3>
                    <p>New Users Today</p>
                </div>
                
            </div>

            <div class="m-4 grid grid-cols-3 gap-5">
                <div class=" p-6 text-center bg-green-200 rounded-md">
                    <h3 class="text-4xl font-bold mb-2"><?= $total_ads?></h3>
                    <p>Total Posted Ads</p>
                </div>
                <div class=" p-6 text-center bg-green-200 rounded-md">
                    <h3 class="text-4xl font-bold mb-2"><?= $total_users?></h3>
                    <p>Total Users</p>
                </div>
                <div class=" p-6 text-center bg-yellow-200 rounded-md">
                    <h3 class="text-4xl font-bold mb-2"><?= $total_pending_ads?></h3>
                    <p>Ads Approval Pending</p>
                </div>
            </div>

        </div>
    </div>
  
    
  
</body>
</html>