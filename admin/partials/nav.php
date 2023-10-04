<?php

?>

<nav class="bg-white shadow">
  <div class="container mx-auto px-4">
    <div class="flex justify-between items-center py-4">
      <a href="index.php" class="text-lg font-bold text-gray-800">RamroBazar- Admin</a>
      <div class="flex">
        
       
          <a href="addproduct.php" class="text-gray-600 hover:text-gray-800 mr-4  px-3 py-2  text-sm	"><?= $_SESSION["admin_email"]?></a>
         <a href="partials/logout.php" class="text-white border-2 px-3 py-2 text-sm rounded-md bg-gray-700 hover:bg-gray-800 transition-all cursor-pointer	">Log Out</a>

     

   
      </div>
    </div>
  </div>
</nav>

