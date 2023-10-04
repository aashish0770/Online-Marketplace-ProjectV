<?php
include("partials/header.php");
include("partials/nav.php");
include('partials/db.php');



if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';

}

$cat_sql = "SELECT * FROM categories where cat_id = '$id'";
$cat_query_run = mysqli_query($conn, $cat_sql);

if (mysqli_num_rows($cat_query_run) > 0) {
    $cat = mysqli_fetch_assoc($cat_query_run);
}

?>

<div class=" bg-gray-100 m-4 p-10 rounded-md">
    <div>
        <h1 class="text-center text-2xl font-bold">Category:
            <?= $cat['name']; ?>
        </h1>
    </div>
</div>


    <div class=" px-4 w-full my-4">
    <div class=" border-b-2">
        <h3 class="mt-2 mb-1 font-bold text-lg">Ads in <?= $cat['name']; ?>  Category</h3>
    </div>
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">
        <?php
        $today = date("Y-m-d");
        $product_sql = "SELECT * FROM ads WHERE category='$id' AND approval_status=1 AND expiry_at >'$today'";
        $product_sql_run = mysqli_query($conn, $product_sql);

        if(mysqli_num_rows($product_sql_run)>0){ 
        foreach($product_sql_run as $item){?>


                <a href="product.php?id=<?= $item["ad_id"] ?>">
                    <div
                        class="mt-4 border-2 rounded-md p-2 border-white hover:border-gray-300 transition-all hover:bg-slate-50">
                        <div class="">
                            <img src="./media/uploads/ad/<?= $item["image_1"] ?>" alt=""
                                class="rounded-md h-48 w-96 object-cover overflow-hidden">
                            <h4 class="font-bold text-gray-800 mt-3">
                                <?= $item["name"] ?>
                            </h4>
                            <?php if (($item["condition_id"]) === '1') { ?>
                                <span class="text-sm my-3">Brand New</span>
                            <?php } elseif (($item["condition_id"]) === '2') { ?>
                                <span class="text-sm my-3">Like New</span>
                            <?php } elseif (($item["condition_id"]) === '3') { ?>
                                <span class="text-sm my-3">Used</span>
                            <?php } elseif (($item["condition_id"]) === '4') { ?>
                                <span class="text-sm my-3">Not Working</span>
                            <?php } else { ?>
                                <span class="text-sm my-3"></span>
                            <?php } ?>

                            <p class="text-gray-800 font-bold">Rs.
                                <?= $item["price"] ?>
                            </p>
                        </div>
                    </div>
                </a>



                <?php    } }else{?>
            <p class=" m-5">No Ads Found in This Category !! </p>
        <?php }?>
    </div>


</div>

<?php include("./partials/footer.php") ?>
</body>

</html>