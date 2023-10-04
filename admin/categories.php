<?php
include("./partials/header.php");
include("../partials/db.php");

if (!isset($_SESSION["admin_email"])) {

    header("Location:login.php");
}
include("./partials/nav.php");

// get form info
if (isset($_POST["submit"])) {
    $category = $_POST['category'];
    $sql = "INSERT INTO categories(name) VALUES('$category')";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
        echo '<script type="text/javascript">toastr.success("Category Added Successfully")</script>';
    } else {
        echo '<script type="text/javascript">toastr.error("Error Occoured !!")</script>';
    }
}

?>

<div class="grid grid-cols-6">
    <div class=" col-span-1">
        <?php include("./partials/sidebar.php") ?>

    </div>
    <div class=" m-5 col-span-5 ">
        <div>
            <h4 class=" border-b-2 w-full text-lg font-bold">Add New Category</h4>
        </div>

        <form action="categories.php" method="post">
            <div class="mt-3">
                <label for="product-name" class="block text-sm font-medium leading-6 text-gray-900">Category
                    Name</label>
                <div class="mt-2 block rounded-md shadow-sm w-full">

                    <input type="text" name="category" required class="block w-full flex-1 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm placeholder:pl-2
                  " placeholder="Enter Category Name">
                </div>
            </div>
            <input type="submit" name="submit" value="Add"
                class=" mt-3 text-white border-2 px-4 py-2 text-sm rounded-md bg-gray-700 hover:bg-gray-800 transition-all cursor-pointer	">
        </form>

        <div>
            <h4 class="mt-3 border-b-2 w-full text-lg font-bold">All Categories</h4>
        </div>

        <div>
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            ID</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <?php
                    $query = "SELECT * FROM categories";
                    $query_exe = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_exe) > 0) {
                        foreach ($query_exe as $item) { ?>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 ">
                                    <?= $item['cat_id'] ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <?= $item['name'] ?>
                                </td>
                                <td>
                                    <a href="deletecategory.php?id=<?= $item['cat_id'] ?>">
                                        <i class=" fa fa-trash text-red-600 border-r-2 pr-3 cursor-pointer" title="Delete"></i>
                                    </a>

                                    <i class=" fa fa-pencil cursor-pointer pl-2"></i>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>



                    <!-- More people... -->
                </tbody>
            </table>

        </div>

    </div>

</div>


</body>

</html>