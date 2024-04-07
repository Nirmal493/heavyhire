<?php 
   include '../db/db.php';
   session_start();
?>
<!DOCTYPE html>
<html>
    <head>
      <title>Driver Dashboard</title>
    <meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="style.css" />
<link rel="icon" href="../images/favicon.png" type="image/x-icon">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- <script defer src="./assets/script.js"></script> -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
       <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 <?php include 'sidebar.php' ?>
 
 <div class="p-4 sm:ml-64">
   <label for="" class="text-2xl font-bold">Account Info</label>
    <div class="p-4 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
       <div class="grid grid-cols-1 gap-4 mb-4 w-full">
         <label for="" class="text-xl font-bold">Name</label>
         <?php
            $acc_id = $_SESSION['acc_id'];
            $get_profile = "select * from accounts where acc_id=$acc_id";
            $run_profile = $con->query($get_profile);
            $fetch_profile = $run_profile->fetch_assoc();
            $name = $fetch_profile['name'];
            $email = $fetch_profile['email'];
            $phone = $fetch_profile['phone'];

         ?>
         <input class="input border rounded-[10px] w-full px-5 py-2 text-xl" type="text" value="<?php echo $name; ?>"> 
       </div>

       <div class="grid grid-cols-4 gap-4 mb-4">
         <label for="" class="text-xl font-bold">Phone Number</label>
          <input class="input border rounded-[10px] w-full px-5 py-2 text-xl text-gray-500" type="string" placeholder="+91XXXXXXXXXX" value="<?php echo $phone ?>">
       </div>

       <div class="grid grid-cols-4 gap-4 mb-4">
         <label for="" class="text-xl font-bold">Email</label>
          <input class="input border rounded-[10px] w-full px-5 py-2 text-xl text-gray-500" type="email" value="<?php echo $email; ?>">
       </div>

       <div class="grid grid-cols-4 gap-4 mb-4">
         <label for="" class="text-xl font-bold">Address</label>
         <textarea class="input border brounded-[10px] w-full px-5 py-8 text-xl" type="text" value="Your address"></textarea>
       </div>

       <div class="grid grid-cols-10 gap-4 mb-4">
         <button class="bg-teal-950 text-white hover:bg-teal-800 py-2 px-4 rounded font-semibold">Save</button>
       </div>
 </div>
 
    </body>



</html>