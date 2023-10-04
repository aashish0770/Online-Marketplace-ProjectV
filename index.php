<?php
include("partials/header.php");
include("partials/db.php");

?>

<?php include("partials/nav.php") ?>
<div class=" bg-gray-100 m-4 p-10 rounded-md">
    <div>
        <h1 class="text-center text-4xl font-bold">What are You Looking For?</h1>
    </div>
    <div class="flex justify-center items-center my-5">
        <form action="search.php" method="POST" class="flex flex-col lg:flex-row w-full lg:w-auto">
            <input type="text" name="query" required class="p-3 lg:w-[40vw] rounded-md border-2 border-gray-400">
            <input type="submit" name="submit" value="Search"
                class="lg:ml-3 bg-black py-3 px-5 rounded-md text-white border-2 hover:bg-white hover:text-gray-800 hover:border-gray-900 transition-all cursor-pointer mt-2 lg:mt-0">
        </form>
    </div>
</div>

<div class=" px-4 w-full my-4">
    <div class=" border-b-2">
        <h3 class="mt-2 mb-1 font-bold text-lg">Top Categories</h3>
    </div>
    <div class="mt-2 grid grid-cols-2 lg:grid-cols-7 gap-5 text-center">

        <?php
        $cat_query = "SELECT * FROM categories";
        $cat_query_run = mysqli_query($conn, $cat_query);
        if (mysqli_num_rows($cat_query_run) > 0) {
            foreach ($cat_query_run as $cat_item) { ?>
                <div class="p-4 bg-gray-200 rounded-md hover:bg-gray-300 transition-colors">
                    <a href="category.php?id=<?=$cat_item['cat_id']?>" class=" font-medium"><?=$cat_item['name']?></a>
                </div>
            <?php }
        } else { ?>
            <p>No categories found !!</>
            <?php } ?>



    </div>

</div>

<div class=" px-4 w-full my-4">
    <div class=" border-b-2">
        <h3 class="mt-2 mb-1 font-bold text-lg">Latest Uploads</h3>
    </div>
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-4">
        <?php
        $today = date("Y-m-d");
        $sql = "SELECT * FROM ads WHERE view_status = '1' AND approval_status=1 AND expiry_at>'$today' ";
        $query_run = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query_run) > 0) {
            foreach ($query_run as $item) { ?>


                <a href="product.php?id=<?= $item["ad_id"] ?>">
                    <div
                        class="mt-4 border-2 rounded-md p-2 border-white hover:border-gray-300 transition-all hover:bg-slate-50">
                        <div class="">
                            <img src="./media/uploads/ad/<?= $item["image_1"] ?>" alt=""
                                class="rounded-md h-48 w-96 object-cover">
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



            <?php } ?>
        <?php } ?>
    </div>


</div>
<?php include("./partials/footer.php") ?>
</body>

</html>