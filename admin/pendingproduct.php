<?php
include("./partials/header.php");
include("../partials/db.php");

if (!isset($_SESSION["admin_email"])) {

    header("Location:login.php");
}
include("./partials/nav.php")

    ?>
<div class="grid grid-cols-6">
    <div class=" col-span-1">
        <?php include("./partials/sidebar.php") ?> 

    </div>
    <div class=" m-5 col-span-5">
        <div>
        <h4 class=" border-b-2 w-full text-lg font-bold">Pending Ads</h4>

        </div>
        <div class="my-5 w-full">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">ID</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Image</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created At</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Expiry At</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Location</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            <?php 
            $sql = "SELECT * FROM ads WHERE approval_status=0";
            $query_run = mysqli_query($conn, $sql);
            if(mysqli_num_rows($query_run)>0){ 
                foreach($query_run as $item) { ?>
                    <tr>

                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 "><?=$item['ad_id']?></td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 "><?=$item['name']?></td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 ">
                        <img src="../media/uploads/ad/<?=$item["image_1"]?>" alt="" srcset="" class="w-32">
                    </td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 ">Rs. <?=$item['price']?></td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 "><?=$item['created_at']?></td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 "><?=$item['expiry_at']?></td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 "><?=$item['location']?></td>
                    <td class=" py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6 flex flex-col text-center ">
                        <a href="../product.php?id=<?=$item['ad_id']?>" class="fa fa-eye p-2 bg-gray-100 rounded-md my-1 " title="View"></a>
                        <a href="approvead.php?id=<?=$item['ad_id']?>" class="fa fa-circle-check	 text-green-700 p-2 bg-gray-100 rounded-md my-1 " title="Approve"></a>
                        <a href="rejectad.php?id=<?=$item['ad_id']?>" class="fa fa-close	 text-red-600 p-2 bg-gray-100 rounded-md my-1 " title="Reject"></a>
                        <a href="deleteproduct.php?id=<?=$item['ad_id']?>" class="fa fa-trash-can text-red-700 p-2 bg-gray-100 rounded-md my-1 " title="Delete"></a>
                    </td>
                    </tr>
            

            <?php }} else{?>
              
                <p class=" p-5 bg-red-200 text-center">No Pending Ads !!</p>
                
                
            <?php }?>
            </tbody>
          </table>
            
        </div>
        
    </div>

</div>


</body>

</html>