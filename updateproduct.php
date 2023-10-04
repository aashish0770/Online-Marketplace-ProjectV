<?php
include("partials/header.php");
include("partials/nav.php");
include('partials/db.php');



if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo '<script type="text/javascript">toastr.error("Product Not Found !!!")</script>';

}
$query = "SELECT * FROM ads WHERE ad_id ='$id' ";
$query_exe = mysqli_query($conn, $query);

if (mysqli_num_rows($query_exe) > 0) {
    $form_data = mysqli_fetch_assoc($query_exe);
} else {
    echo '<script type="text/javascript">toastr.error("Error Fetching Product Data !!!")</script>';
    exit();
}


if (!isset($_SESSION["user_email"])) {

    header("Location:login.php");
}
if (isset($_POST["submit"])) {


    $ad_id = $_POST['product-id'];
    $name = $_POST['product-name'];
    $description = $_POST['product-description'];
    $category = $_POST['product-category'];
    $condition = $_POST['product-condition'];
    $location = $_POST['product-location'];
    $used = $_POST['product-used'];
    $price = $_POST['product-price'];
    $negotiable = (int) $_POST['product-negotiable'];
    $delivery = (int) $_POST['product-delivery'];
    $expiry = date('Y-m-d', strtotime($_POST['ad-expiry']));
    $posted_by = $_SESSION['user_email'];

    $new_image = $_FILES['product-photo']['name'];
    $old_image = $_POST['product-photo-old'];

    if ($new_image != '') {
        $image = $_FILES['product-photo']['name'];
    } else {
        $image = $old_image;
    }

    if(file_exists("media/uploads/ad/".$_FILES['product-photo']['name'])){
        echo '<script type="text/javascript">toastr.error("File Already Exists !!")</script>';

    }else{
        $query ="UPDATE ads SET name ='$name', description='$description', image_1='$image', condition_id='$condition', category='$category', location='$location', used_for='$used', price='$price',is_negotiable='$negotiable',expiry_at='$expiry', delivery='$delivery', approval_status=0 WHERE ad_id = '$ad_id'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            if ($new_image != '') {
                move_uploaded_file($_FILES['product-photo']['tmp_name'], 'media/uploads/ad/' . $_FILES['product-photo']['name']);
            
            }

            
            echo "Ad uploaded Succsessfully";
            header("Location:userprofile.php");

        } else {
            echo (mysqli_error($conn));

        }
    }



    // // Image Validate
    // $allowed_extension = ['png', 'jpg', 'jpeg', 'webp'];
    // $file_extension = pathinfo($image, PATHINFO_EXTENSION);

    // //File Name
    // $file_name = time() . '.' . $file_extension;

    // if (!in_array($file_extension, $allowed_extension)) {
    //     echo "Invalid file format";
    //     exit();
    // } else {
    //     $sql = "INSERT INTO ads(name, description, image_1, category, condition_id, location, used_for, price, is_negotiable, posted_by, expiry_at, delivery ) 
    //     VALUES('$name', '$description', '$file_name', '$category', '$condition', '$location', '$used', '$price', '$negotiable', '$posted_by', '$expiry', '$delivery')";
    //     $query_run = mysqli_query($conn, $sql);
    //     if ($query_run) {
    //         move_uploaded_file($_FILES['product-photo']['tmp_name'], 'media/uploads/ad/' . $file_name);
    //         echo "Ad uploaded Succsessfully";
    //         header("Location:index.php");

    //     } else {
    //         echo (mysqli_error($conn));

    //     }
    // }


}

?>
<div class="px-10 lg:px-10">
    <div>
        <div class="">
            <div class="md:col-span-1 my-4">
                <div class="px-4 sm:px-0">
                    <h3 class=" font-semibold text-gray-900 text-lg">Edit Advertisment</h3>
                    <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what
                        you share.</p>
                </div>
            </div>
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class=" bg-white px-4 py-5 sm:p-6 border-b-2">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="product-name"
                                        class="block text-sm font-medium leading-6 text-gray-900">Product Name</label>
                                    <div class="mt-2 block rounded-md shadow-sm">

                                        <input type="hidden" name="product-id" required value="<?= $form_data['ad_id'] ?>"/>
                                            <input type="text" name="product-name" required
                                            value="<?= $form_data['name'] ?>"
                                            class="block w-full flex-1 rounded-md border-0 py-1.5 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:text-sm placeholder:pl-2"
                                            placeholder="">
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label for="product-description"
                                    class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                                <div class="mt-2">
                                    <textarea rows="10" name="product-description"  required
                                        class="mt-1 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-gray-600 sm:py-1.5 sm:text-sm placeholder:pl-2"><?= $form_data['description'] ?></textarea>
                                </div>

                            </div>
                            <div>
                                <label class="block text-sm font-medium leading-6 text-gray-900">Add Photos</label>
                                <input type="file" name="product-photo" value="<?= $form_data['image_1'] ?>">
                                <input type="hidden" name="product-photo-old" 
                                    value="<?= $form_data['image_1'] ?>">
                            </div>
                        </div>
                        <div class="bg-white px-4 py-5 sm:p-6  border-b-2">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-category"
                                        class="block text-sm font-medium leading-6 text-gray-900">Category</label>
                                    <?php
                                    $sql = "SELECT * FROM categories";
                                    $query_run = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($query_run) > 0) { ?>
                                        <select name="product-category" required
                                            class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                            <?php foreach ($query_run as $item) { ?>
                                                <option value="<?= $item["cat_id"] ?>"><?= $item["name"] ?></option>
                                            <?php } ?>
                                        </select>

                                    <?php } ?>





                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-condition"
                                        class="block text-sm font-medium leading-6 text-gray-900">Condition</label>
                                    <select name="product-condition" required
                                        class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                        <option value="1">Brand New</option>
                                        <option value="2">Like New</option>
                                        <option value="3">Used</option>
                                        <option value="4">Not Working</option>
                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-location"
                                        class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                                    <input type="text" name="product-location" required
                                        value="<?= $form_data['location'] ?>"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-used"
                                        class="block text-sm font-medium leading-6 text-gray-900">Used For</label>
                                    <input type="text" name="product-used" value="<?= $form_data['used_for'] ?>"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400">
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-price"
                                        class="block text-sm font-medium leading-6 text-gray-900">Price</label>
                                    <input type="text" name="product-price" required value="<?= $form_data['price'] ?>"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-negotiable"
                                        class="block text-sm font-medium leading-6 text-gray-900">Negotiable ?
                                    </label>
                                    <select name="product-negotiable" required
                                        class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                        <option value="0">Negotiable</option>
                                        <option value="1">Fixed</option>

                                    </select>
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="product-delivery"
                                        class="block text-sm font-medium leading-6 text-gray-900">Delivery ?
                                    </label>
                                    <select name="product-delivery" required
                                        class="mt-2 block w-full rounded-md border-0 bg-white py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">
                                        <option value="0">Not Avliable</option>
                                        <option value="1">Avilable</option>

                                    </select>
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="ad-expiry"
                                        class="block text-sm font-medium leading-6 text-gray-900">Expiry Date</label>
                                    <input type="date" name="ad-expiry" required min="<?php echo date('Y-m-d'); ?>"
                                        value="<?= date("Y-m-d", strtotime($form_data['expiry_at'])) ?>"
                                        class="mt-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-2">
                                </div>


                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit" name="submit"
                                class="inline-flex justify-center text-white border-2 border-gray-800 px-4 py-2 text-sm rounded-md bg-gray-800 hover:bg-white hover:border-grey-600 hover:text-gray-600 transition-all	">Update
                                Advertisment</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>






</div>
</body>

</html>