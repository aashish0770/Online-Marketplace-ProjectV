<?php

?>

<nav class="bg-white shadow">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
      <a href="index.php" class="text-lg font-bold text-gray-800">RamroBazar</a>
      <div class="flex">
        
        <?php if(isset($_SESSION["user_email"])):?>
          <a href="addproduct.php" class="text-gray-600 hover:text-gray-800 mr-4 border-2 px-3 py-2 rounded-md text-sm	">Post Your Ad</a>
         <a href="userprofile.php" class="text-white border-2 px-3 py-2 text-sm rounded-md bg-gray-700 hover:bg-gray-800 transition-all	">
          <i class="fa fa-user"></i>
         </a>
         <a href="logout.php" class="text-white border-2 px-3 py-2 text-sm rounded-md bg-red-600 hover:bg-red-800 transition-all cursor-pointer	">
          <i class=" fa fa-arrow-right-from-bracket"></i>
         </a>

          <?php else: ?>
            <a href="login.php" class="text-gray-600 hover:text-gray-800 mr-4 border-2 px-3 py-2 rounded-md text-sm	">Post Your Ad</a>
        <a href="signup.php" class="text-white border-2 border-gray-800 px-3 py-2 text-sm rounded-md bg-gray-800 hover:bg-white hover:border-grey-600 hover:text-gray-600 transition-all	">Register</a>

        <?php endif?>
      </div>
    </div>
  </div>
</nav>

