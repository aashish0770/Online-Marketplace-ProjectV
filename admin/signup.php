<?php
include("../partials/header.php");
include("../partials/db.php");


// Check if data come from POST action
if (isset($_POST["submit"])) {
   
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // $password_hash =password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO admin_user (name, email, password) VALUES ('$name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo '<script type="text/javascript">toastr.error("Account Created")</script>';
        header('Location:login.php');
    } else {
        echo '<script type="text/javascript">toastr.error("Error Occoured")</script>';
    }

}

?>
<div class="h-full bg-gray-100">

    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Create a New Account</h2>
            </div>
            <form class="mt-8 space-y-6" action="signup.php" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class=" rounded-md shadow-sm">
                    <div>
                        <label for="name">Name</label>
                        <input id="name" name="name" type="text" required
                            class="relative block w-full  rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Full Name">
                    </div>
                    <div class="pt-4">
                        <label for="email-address">Email Address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="relative block w-full  rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Email address">
                    </div>
                    
                    <div class="pt-4">
                        <label for="password">Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="relative block w-full  rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Password">
                    </div>
                </div>
                <div>
                    <input type="submit" value="Sign Up" name="submit"
                        class="group relative flex w-full justify-center rounded-md  border-transparent bg-black border-2 py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 hover:bg-white hover:border-black hover:text-gray-800 transition-all" />

                </div>
            </form>
        </div>
    </div>
</div>
</body>

</html>