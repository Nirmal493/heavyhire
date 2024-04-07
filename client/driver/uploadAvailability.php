<?php 
    include '../db/db.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../style.css" />
      <link rel="icon" href="../images/favicon.png" type="image/x-icon">
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      <script src="https://cdn.tailwindcss.com"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <title>Upload Availability</title>
</head>
<body>
    <?php include 'sidebar.php' ?>
    <form class="flex flex-col p-4 sm:ml-64" method="POST" enctype="multipart/form-data">
        <select name="v_id" class="border-2 mb-10 py-3 rounded-[15px] px-5" id="">
            <option>--Select a vehicle--</option>
            <?php
                $acc_id = $_SESSION['acc_id'];
                $get_user_vehicles = "select * from vehicle where acc_id=$acc_id";
                $run_user_vehicles = $con->query($get_user_vehicles);
                while($row = $run_user_vehicles->fetch_assoc()){
                    $brand = $row['brand'];
                    $model = $row['model'];
                    $v_id = $row['v_id'];
                    echo "<option value='$v_id'>$brand $model</option>";
                }
            ?>
        </select>
        <input class="hidden" type="text" id="acc_id" name="acc_id">
        <select class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" name="from_id">
            <option>--From--</option>
            <?php
                $get_loc = "select * from loc";
                $run_loc = $con->query($get_loc);
                while($row = $run_loc->fetch_assoc()){
                    $loc_id = $row['loc_id'];
                    $loc_name = $row['loc_name'];
                
                    echo "<option value='$loc_id'>$loc_name</option>";
                }
            ?>
        </select>
        <select class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" name="to_id">
            <option>--To--</option>
            <?php
                $get_loc = "select * from loc";
                $run_loc = $con->query($get_loc);
                while($row = $run_loc->fetch_assoc()){
                    $loc_id = $row['loc_id'];
                    $loc_name = $row['loc_name'];
                
                    echo "<option value='$loc_id'>$loc_name</option>";
                }
            ?>
        </select>
        <!-- <input value="Kochi" class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" placeholder="Enter location" name="loc"> -->
        <div class="flex">
            <input class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" value="09:45" type="time" name="tfrom">
            <input class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" value="10:30" type="time" name="tto">
        </div>
        <input value="+919778393558" class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" placeholder="Enter Phone" name="phone">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="file" name="image">
        <button type="submit" class="bg-teal-800 hover:bg-teal-900 text-white px-4 py-2 rounded-[15px] m-auto w-[30%]">Upload</button>
    </form>
</body>
</html>

<script>

    const form = document.querySelector("form");
    document.getElementById('acc_id').value = localStorage.getItem('acc_id')
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("../../backend/uploadAvailability.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
            .then(data => {
                window.location.replace('/heavyhire/client/driver/viewListings.php')
                console.log(data)
            })
            .catch(error => {
                console.error(error);
            });
        });
</script>