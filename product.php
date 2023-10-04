<?php
include("partials/header.php");
include("partials/db.php");
$id = $_GET['id']; 

// echo $id;
$sql = "SELECT * FROM ads WHERE ad_id='$id'";
$query_run = mysqli_query($conn, $sql);

if(mysqli_num_rows($query_run) > 0){
 $ad = mysqli_fetch_assoc($query_run);
//  echo $ad['name'];
}

// Find User Who Posted Currently Viewing Ad
$posted_by = $ad['posted_by'];
$user = "SELECT * FROM user WHERE email='$posted_by'";
$find_user = mysqli_query($conn, $user);

if(mysqli_num_rows($find_user) > 0){
    $user = mysqli_fetch_assoc($find_user);
   }else{
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';
    sleep (5);
    header("Location:index.php");
   }
?>

<body>
    <?php include("partials/nav.php") ?>

    <div class="lg:px-14 p-2 grid grid-cols-1 gap-10 md:grid-cols-1 lg:grid-cols-2 py-10">
        <div class="">
            <img src="./media/uploads/ad/<?=$ad["image_1"]?>" alt="" class=" h-[70vh] w-full object-cover rounded-md overflow-hidden">

            <div class=" my-3 border-2 rounded-md p-2">
                <p>
                Note: We recommend you to physically inspect the product/ Service before making payment. Avoid paying fees or advance payment to sellers.
                </p>
            </div>
        </div>
        <div >
            <span
                class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800">AD
                ID : #00<?=$ad['ad_id']?></span>
            <h2 class=" text-4xl font-bold mt-2"><?=$ad['name'] ?></h2>
            <p class="mt-2"><?=$ad['description'] ?></p>
            <div class="flex my-3">
                <h3 class="text-2xl font-bold mr-5">Rs. <?=$ad['price'] ?></h3>
                <?php if(($ad["condition_id"] ) === '1'){ ?>
                    <span
                    class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800">Brand
                    New</span>
                <?php }elseif(($ad["condition_id"] ) === '2'){ ?>
                    <span
                    class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800">Like
                    New</span>
                <?php }elseif(($ad["condition_id"] ) === '3'){ ?>
                    <span
                    class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800">Used
                    </span>
                <?php }elseif(($ad["condition_id"] ) === '4'){ ?>
                    <span
                    class="inline-flex items-center rounded-md bg-gray-100 px-2.5 py-0.5 text-sm font-medium text-gray-800">Not Working</span>
                <?php } else {?>
                    <span class="text-sm my-3"></span>
                <?php }?>
                
            </div>
            <h3 class="font-bold mt-4">Seller Info</h3>
            <div class="flex border-2 rounded-md mt-2 items-center justify-between">
                <div class="flex content-center items-center">
                    <div class="h-16 w-16 overflow-hidden rounded-md m-1">
                        
                        <img src="./media/uploads/user/<?=$user['image']?>" alt="">
                    </div>
                    <div class="ml-4">
                       
                        <h4 class="font-bold text-gray-800"><?=$user['name']?> <span class="border-l-2 pl-1 text-sm text-gray-700"> 4 Ads</span></h4>
                        
                        <p><?=$user['phone']?> </p>
                    </div>

                </div>
                <div>
                    <a href="tel:<?=$user['phone']?>">
                        <i class="fa fa-phone text-gray-800 p-4 border-r-2"></i>
                    </a>
                    <a href="https://wa.me/977<?=$user['phone']?>">
                        <i class="fa fa-message text-gray-800 p-4"></i>
                    </a>
                </div>

            </div>

            <div class="my-4">
                <h3 class="font-bold mt-4 mb-2">General Info</h3>
                <div class=" bg-gray-100 px-5 py-2 rounded-md text-gray-800">
                    <div class="flex border-b-[1px] my-2 pb-2 gap-10">
                        <div>
                            <span>Location&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <div>
                            <span><?=$ad['location'] ?></span>
                        </div>
                    </div>
                    <div class="flex border-b-[1px] my-2 pb-2 gap-10">
                        <div>
                            <span>Delivery&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        </div>
                        <div>
                            <?php if($ad['delivery']==='0'){?>
                            <span>Not Avilable</span>
                            <?php 
                            }else{?>
                             <span>Avilable</span>
                             <?php }?>
                        </div>
                    </div>
                    <div class="flex border-b-[1px] my-2 pb-2 gap-10">
                        <div>
                            <span>Negotiable</span>
                        </div>
                        <div>
                            <?php if($ad['is_negotiable']==='0'){?>
                            <span>Fixed Price</span>
                            <?php 
                            }else{?>
                             <span>Negotiable</span>
                             <?php }?>
                        </div>
                    </div>
                    <div class="flex border-b-[1px] my-2 pb-2 gap-10">
                        <div>
                            <span>Ads Posted</span>
                        </div>
                        <div>
                            <span>
                            <?=$ad['created_at'] ?></span>
                        </div>
                    </div>
                    <div class="flex border-b-[1px] my-2 pb-2 gap-10">
                        <div>
                            <span>Ads Expiry&nbsp;</span>
                        </div>
                        <div>
                            <span><?=$ad['expiry_at'] ?></span>
                        </div>
                    </div>
                    

                </div>
            </div>

        </div>
    </div>
    <?php include("./partials/footer.php")?>
</body>

</html>