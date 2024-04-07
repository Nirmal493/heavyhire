<?php include '../db/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Listings</title>
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
</head>

<body>
    <?php include 'sidebar.php' ?>
    <div class="flex flex-col p-4 sm:ml-64">
            <!-- Card -->
            <?php
                $driver_id = $_SESSION['acc_id'];
                $query = "select * from available where acc_id=$driver_id";
                $run = $con->query($query);
                while($run && $row = $run->fetch_assoc()){
                    $avai_id = $row['avai_id'];
                    $Ufrom = $row['tfrom'];
                    $acc_id = $row['acc_id'];
                    $from = DateTime::createFromFormat('H:i:s.u', $Ufrom)->format('H:i');
                    $Uto = $row['tto'];
                    $to = DateTime::createFromFormat('H:i:s.u', $Uto)->format('H:i');
                    $v_id = $row['v_id'];
                    $query_vehicle = "select * from vehicle where v_id = $v_id";
                    $run_vehicle = $con->query($query_vehicle);
                    $vehicle_data = $run_vehicle->fetch_assoc();
                    $brand = $vehicle_data['brand'];
                    $model = $vehicle_data['model'];
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

                    $allStars = "select * from rating where acc_id = $acc_id";
                    $run_allStars = $con->query($allStars);
                    $sumStars = 0;
                    while($row_star = $run_allStars->fetch_assoc()){
                        $sumStars += $row_star['rating'];
                    }
                    if($run_allStars->num_rows == 0){
                        $rating = 0;
                    }else{
                        $rating = floor($sumStars / $run_allStars->num_rows);
                    }
                        echo "<div class='custom-shadow h-[100%] rounded-[20px] mb-10'><div class='px-10 py-10 flex'>
                        <img src='../../backend/availableImages/$image' class='w-[350px] h-[200px]' />
                        <div class='ml-5'>
                            <h2 class='text-2xl font-bold'>$brand $model</h2>";
                            for($i=1; $i<=$rating; $i++){
                                echo "<i class='fa-solid fa-star text-yellow-500 cursor-pointer mr-2'></i>";
                            }
                            for($i=1;$i<=5-$rating; $i++){
                                echo "<i class='fa-regular fa-star text-yellow-500 cursor-pointer mr-2'></i>";
                            }
                            echo "
                            <p class='text-gray-800 text-lg'>Locations :-</p>
                            <ul class='list-disc ml-5'>
                                <li>$from_loc - $to_loc</li>
                            </ul>
                            <div class='mb-5 flex'>
                            </div>
                            <p class='text-gray-800 text-lg'>Available timings :-</p>
                            <ul class='list-disc ml-5'>
                                <li>$from am - $to am</li>
                            </ul>
                        </div>
                        <div class='flex flex-col ml-auto'>
                            <form id='edit'>
                                <input type='hidden' name='avai_id' value=$avai_id>
                                <a href='editListing.php?avai_id=$avai_id' type='submit' class='rounded text-white bg-green-800 py-2 px-3 hover:bg-green-700 w-[1005] mb-5'>Edit</a>
                            </form>
                            <button onclick='document.getElementById('myForm').submit();' id='contact_button' class='rounded text-white bg-blue-800 py-2 px-3 hover:bg-blue-700 mb-5'>$phone</button>
                            <!--<button class='rounded text-white bg-black py-2 px-3 hover:bg-slate-700'>Message</button>-->
                        </div> 
                        <!-- Hidden form to trigger PHP code on button click -->
                        <form id='myForm' method='POST'>
                            <input type='hidden' name='button_clicked' value='true'>
                        </form>
                    </div></div>";
                }
            ?>
            <!-- Card -->
    </div>
    <script>
        AOS.init();
    </script>
</body>

</html>