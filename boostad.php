<?php
include("partials/header.php");
include("partials/nav.php");
include('partials/db.php');
// $id = $_GET['id']; 
if (!isset($_SESSION["user_email"])) {

    header("Location:login.php");
}

$cur_user = $_SESSION["user_email"];
?>


<div class="p-5">
    <div class=" text-center">
        <h1 class="text-4xl font-bold my-4">Ramro Boost</h1>
        <h3 class="text-xl font-bold">We want to help you sell faster</h3>
        <p>Boost helps your product reach more potential buyers with top of the category placement for limited time,
            this as- sures high engagement and visibility on product.</p>
    </div>

    <div class="grid  grid-cols-1 gap-10 mt-5 lg:grid-cols-6">
        <div class="col-span-3 bg-gray-200 rounded-md">
            <p class="text-center m-2 font-bold">Pricing</p>
            <table class="min-w-full divide-y divide-gray-400">
                <thead class=" bg-gray-100">
                    <tr>

                        <th>Number Of Hours</th>
                        <th>Price</th>

                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">
                    <tr class="text-center">
                        <td>2 Hour</td>
                        <td>Rs.2000</td>
                    </tr>
                    <tr class="text-center">
                        <td>2 Hour</td>
                        <td>Rs.2000</td>
                    </tr>
                    <tr class="text-center">
                        <td>2 Hour</td>
                        <td>Rs.2000</td>
                    </tr>
                </tbody>
            </table>

        </div>

        <div class="col-span-3 bg-gray-200 rounded-md">
            <p class="text-center m-2 font-bold">Boost Your Listing</p>
            <form action="boostad.php">
                <div class="flex flex-col p-3">
                    <label for="email-address">Select Your Boosting Plan</label>
                    <select name="plan" id="plan" class="p-2 rounded-md">
                        <option value="1">Plan 1</option>
                        <option value="1">Plan 2</option>
                        <option value="1">Plan 3</option>
                    </select>

                </div>
                <div class="flex flex-col items-center my-3">
                    <img src="./media/static/qr.png" alt="qr" class="rounded-md">
                    <p>Esewa/Phonepay</p>
                </div>

                <div class="flex flex-col p-3">
                    <label for="pay_id">Payment Id</label>
                    <input type="text" name="pay_id" id="" class="p-2 rounded-md" required>

                </div>
                <input type="submit" value="Submit for Review"
                    class=" cursor-pointer m-4 relative rounded-md  border-transparent bg-black border-2 py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 hover:bg-white hover:border-black hover:text-gray-800 transition-all">
            </form>


        </div>

    </div>
    
    <div class="my-4">
            <p>Note:


            </p>
            <p> - Boost requests are accepted between 10AM-5PM and every request is manually monitored to assure safe
                community guidelines.
            </p>
            <p> - The payments made are non-refundable. Please keep the payment receipt.</p>
        </div>
</div>

<?php include("partials/footer.php"); ?>

</body>

</html>