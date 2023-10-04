<?php
include("../partials/header.php");
include("../partials/db.php");

if (isset($_POST["submit"])) {
    
  
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if Username and Password is empty
    if(empty($email)){
        echo '<script type="text/javascript">toastr.error("Email is required !!")</script>';
    }
    if(empty($password)){
        echo '<script type="text/javascript">toastr.error("Password is required !!")</script>';
    }

    $sql = "SELECT * FROM admin_user WHERE email = '$email' AND password = '$password'";
    
    $res = mysqli_query($conn, $sql);
    $user = $res->fetch_assoc();

    if(mysqli_num_rows($res)==1){
        echo '<script type="text/javascript">toastr.error("Account Created")</script>';
        session_start();
        $_SESSION["admin_email"]=$email;
        header('Location:index.php');
    }else{
        echo '<script type="text/javascript">toastr.error("Wrond Email/password Combination")</script>';
    }
}


?>
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Ramrobazar-Admin Login</h2>
            </div>
            <form class="mt-8 space-y-6" action="login.php" method="POST">
                <input type="hidden" name="remember" value="true">
                <div class="-space-y-px rounded-md shadow-sm">
                    <div>
                        <label for="email-address">Email address</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                            class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Email address">
                    </div>
                    <div class="pt-6">
                        <label for="password" >Password</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                            class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                            placeholder="Password">
                    </div>
                </div>
                <div>
                    <input type="submit" value="Log In" name="submit"
                        class="group relative flex w-full justify-center rounded-md  border-transparent bg-black border-2 py-2 px-4 text-sm font-medium text-white  focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2 hover:bg-white hover:border-black hover:text-gray-800 transition-all"/>
                   
                </div>

           
            </form>
        </div>
    </div>
</body>

</html>