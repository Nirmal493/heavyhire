<?php 
    include '../db/db.php';
    session_start();
    $avai_id = $_GET['avai_id'];
    $getDetails = "select * from available where avai_id=$avai_id";
    $runDetails = $con->query($getDetails);
    while($row = $runDetails->fetch_assoc()){
        $v_id = $row['v_id'];
        $getVehicle = "select * from vehicle where v_id=$v_id";
        $runVehicle = $con->query($getVehicle);
        $fetchVehicle = $runVehicle->fetch_assoc();
        $brand = $fetchVehicle['brand'];
        $model = $fetchVehicle['model'];

        $Ufrom = $row['tfrom'];
        $acc_id = $row['acc_id'];
        $from = DateTime::createFromFormat('H:i:s.u', $Ufrom)->format('H:i');
        $Uto = $row['tto'];
        $to = DateTime::createFromFormat('H:i:s.u', $Uto)->format('H:i');
        $phone = $row['phone'];
        $image = $row['image'];

        $from_id = $row['from_id'];
        $to_id = $row['to_id'];
        $q_from = "select * from loc where loc_id = $from_id";
        $q_to = "select * from loc where loc_id = $to_id";
        $run_from = $con->query($q_from);
        $run_to = $con->query($q_to);
        $fetch_from = $run_from->fetch_assoc();
        $fetch_to = $run_to->fetch_assoc();
        $from_loc = $fetch_from['loc_name'];
        $to_loc = $fetch_to['loc_name'];
    }
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
    
    <title>Edit Listing</title>
</head>
<body>
    <?php include 'sidebar.php' ?>
    <div class="p-4 sm:ml-64">
        <a href="viewListings.php" class="bg-green-700 hover:bg-green-800 text-white px-3 py-2 rounded">Back</a>
    </div>
    <form class="flex flex-col p-4 sm:ml-64" method="POST" enctype="multipart/form-data">
        <input type="text" name="avai_id" value="<?php echo $avai_id ?>" class="hidden" id="">
        <input type="text" name="oimage" value="<?php echo $image ?>" class="hidden" id="">
        <select name="v_id" class="border-2 mb-10 py-3 rounded-[15px] px-5" id="">
            <?php
                $acc_id = $_SESSION['acc_id'];
                echo "<option value='$v_id' selected>$brand $model</option>";
                $get_user_vehicles = "select * from vehicle where acc_id=$acc_id and v_id!=$v_id";
                $run_user_vehicles = $con->query($get_user_vehicles);
                while($row = $run_user_vehicles->fetch_assoc()){
                    $Obrand = $row['brand'];
                    $Omodel = $row['model'];
                    $Ov_id = $row['v_id'];
                    echo "<option value='$Ov_id'>$Obrand $Omodel</option>";
                }
            ?>
        </select>
        <input class="hidden" type="text" id="acc_id" name="acc_id">
        <select class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" name="from_id">
            <?php
                echo "<option value='$from_id' selected>$from_loc</option>";
                $get_loc = "select * from loc where loc_id != $from_id";
                $run_loc = $con->query($get_loc);
                while($row = $run_loc->fetch_assoc()){
                    $loc_id = $row['loc_id'];
                    $loc_name = $row['loc_name'];
                
                    echo "<option value='$loc_id'>$loc_name</option>";
                }
            ?>
        </select>
        <select class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" name="to_id">
            <?php
                echo "<option value='$to_id' selected>$to_loc</option>";
                $get_loc = "select * from loc where loc_id != $to_id";
                $run_loc = $con->query($get_loc);
                while($row = $run_loc->fetch_assoc()){
                    $loc_id = $row['loc_id'];
                    $loc_name = $row['loc_name'];
                
                    echo "<option value='$loc_id'>$loc_name</option>";
                }
            ?>
        </select>
        <div class="flex">
            <input class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" value="<?php echo $from; ?>" type="time" name="tfrom">
            <input class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" value="<?php echo $to; ?>" type="time" name="tto">
        </div>
        <input value="<?php echo $phone; ?>" class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" placeholder="Enter Phone" name="phone">
        <label class="font-semibold mb-3 text-lg">Chosen Image</label>
        <img src="../../backend/availableImages/<?php echo $image; ?>" class='w-[350px] h-[200px]'  alt="">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" value="<?php echo $image; ?>" type="file" name="image">
        <button type="submit" class="bg-teal-800 hover:bg-teal-900 text-white px-4 py-2 rounded-[15px] m-auto w-[30%]">Confirm Edit</button>
    </form>
</body>
</html>

<script>

    const form = document.querySelector("form");
    document.getElementById('acc_id').value = localStorage.getItem('acc_id')
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("../../backend/editAvailability.php", {
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