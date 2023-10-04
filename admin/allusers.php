<?php
include("./partials/header.php");
include("../partials/db.php");


if (!isset($_SESSION["admin_email"])) {

    header("Location:login.php");
}
include("./partials/nav.php")

    ?>
<div class="grid grid-cols-6">
    <div class="col-span-1">
        <?php include("./partials/sidebar.php") ?>

    </div>
    <div class=" m-5 col-span-5 ">
        <div>
        <h4 class=" border-b-2 w-full text-lg font-bold">All Users</h4>

        </div>
        <div>
        <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                           User ID</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Phone</th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        <!-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th> -->
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <?php
                    $query = "SELECT * FROM user";
                    $query_exe = mysqli_query($conn, $query);
                    if (mysqli_num_rows($query_exe) > 0) {
                        foreach ($query_exe as $item) { ?>
                            <tr>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 ">
                                    <?= $item['user_id'] ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <?= $item['name'] ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <?= $item['email'] ?>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <?= $item['phone'] ?>
                                </td>
                                <td>
                                <span
                                    class="inline-flex items-center rounded-full bg-green-200 px-2.5 py-0.5 text-xs font-medium text-gray-800">Active</span>
                                </td>
                                <!-- <td>
                                 <a href="#" class=" bg-red-800 p-2 rounded-md text-white">Suspend</a>
                                </td> -->
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