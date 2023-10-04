<?php
include("partials/header.php");
include("partials/nav.php");
include('partials/db.php');
// $id = $_GET['id']; 
if (!isset($_SESSION["user_email"])) {

    header("Location:login.php");
}

$cur_user = $_SESSION["user_email"];

$sql = "SELECT * FROM user WHERE email='$cur_user'";
$query_run = mysqli_query($conn, $sql);

if (mysqli_num_rows($query_run) > 0) {
    $user = mysqli_fetch_assoc($query_run);

}

?>

<div class="grid lg:grid-cols-6 lg:px-20 py-5 px-5 gap-5 grid-cols-1">
    <div class="lg:border-r-2 col-span-2 flex items-center flex-col border-r-0 ">
        <img src="./media/uploads/user/avatar.png" alt="avatar-image" class="h-24 w-24 rounded-full border-2 ">
        <!-- <input type="file" name="user-image" class="" > -->
        <h3 class="font-bold text-xl">
            <?= $user['name'] ?>
        </h3>
        <a href="tel:<?= $user['phone'] ?>" class=" underline underline-offset-2 my-3"><?= $user['phone'] ?></a>
        <p>Member Since:
            <?= date("j F Y", strtotime($user['created_at'])) ?>
        </p>
        <a href="#"
            class="text-white border-2 border-gray-800 px-4 py-2 my-3 text-sm rounded-md bg-gray-800 hover:bg-white hover:border-grey-600 hover:text-gray-600 transition-all	">
            <i class="fa fa-edit"></i>
            Edit Profile
        </a>
    </div>

    <div class="col-span-4">
        <h3 class="text-2xl font-bold border-b-2 mb-4 ">Your Ads</h3>

        <?php

        // $cur_user= $_SESSION["user_email"];
        $query = "SELECT * FROM ads WHERE posted_by='$cur_user'";
        $product_query = mysqli_query($conn, $query);



        if (mysqli_num_rows($product_query) > 0) {
            foreach ($product_query as $item) { ?>



                <div class="flex gap-4 border-2 p-1 rounded-md mb-3">
                    <div>
                        <a href="product.php?id=<?= $item["ad_id"] ?>">
                            <img src="./media/uploads/ad/<?= $item["image_1"] ?>" alt=""
                                class=" w-40 h-28 rounded-md object-cover">
                        </a>
                    </div>

                    <div class="">
                        <a href="product.php?id=<?= $item["ad_id"] ?>">
                            <?php if ($item["approval_status"] === '0') { ?>
                                <span
                                    class="inline-flex items-center rounded-full bg-yellow-200 px-2.5 py-0.5 text-xs font-medium text-gray-800">Pending</span>
                            <?php } elseif ($item["approval_status"] === '1') { ?>
                                <span
                                    class="inline-flex items-center rounded-full bg-green-200 px-2.5 py-0.5 text-xs font-medium text-gray-800">Approved</span>
                            <?php } elseif ($item["approval_status"] === '2') { ?>
                                <span
                                    class="inline-flex items-center rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-gray-800">Rejected</span>
                            <?php } ?>

                            <?php
                            $today = date("Y-m-d");
                             if(($item['expiry_at'])<$today){?>
<span
                                    class="inline-flex items-center rounded-full bg-red-200 px-2.5 py-0.5 text-xs font-medium text-gray-800">Expired</span>
                            <?php } ?>
                            <h3 class="font-bold">
                                <?= $item['name'] ?>
                            </h3>
                            <p>
                                <?= substr($item['description'], 0, 100) ?>......
                            </p>

                        </a>
                    </div>

                    <div class=" flex flex-col items-center text-gray-700 border-l-2 px-2">
                        <!-- <a href="boostad.php" title="Boost" class="text-green-700 border-b-[1px] pb-1">
                            <i class="fa fa-rocket"></i>
                        </a> -->
                        <a href="deleteproduct.php?id=<?= $item["ad_id"] ?>" title="Delete"
                            class="text-red-900 border-b-[1px] pb-1">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="updateproduct.php?id=<?= $item["ad_id"] ?>" title="Edit" class="border-b-[1px] pb-1">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <a href="toggleview.php?id=<?= $item["ad_id"] ?>" title="Hide/Show" class=" ml-auto">
                            <?php if ($item["view_status"] === '1') { ?>
                                <i class="fa fa-eye"></i>
                            <?php } else { ?>
                                <i class="fa fa-eye-slash"></i>
                            <?php } ?>
                        </a>





                    </div>
                </div>

            <?php }
        } else { ?>
            <p>No Ads Found !!</p>
        <?php } ?>



    </div>
</div>



</body>

</html>