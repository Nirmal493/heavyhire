<?php include '../db/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Clients</title>
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
    <div class="flex flex-col p-10 sm:ml-64">
            <!-- Card -->
            <div class="grid grid-cols-2 gap-10">
                <?php
                    $driverId = $_SESSION['acc_id'];
                    $getClients = "select * from book where driver_id=$driverId and type=1";
                    $runClients = $con->query($getClients);
                    while($row = $runClients->fetch_assoc()){
                        $user_id = $row['user_id'];
                        $book_id = $row['book_id'];
                        $pickUp = $row['pick_up'];
                        $dropOff = $row['drop_off'];

                        
                        $avai_id = $row['avai_id'];
                        $getAvai = "select * from available where avai_id=$avai_id";
                        $runAvai = $con->query($getAvai);
                        $fetchAvai = $runAvai->fetch_assoc();
                        $tfrom = $fetchAvai['tfrom'];
                        $tto = $fetchAvai['tto'];
                        $v_id = $fetchAvai['v_id'];
                        
                        $from_id = $fetchAvai['from_id'];
                        $to_id = $fetchAvai['to_id'];
                        $q_from = "select * from loc where loc_id = $from_id";
                        $q_to = "select * from loc where loc_id = $to_id";
                        $run_from = $con->query($q_from);
                        $run_to = $con->query($q_to);
                        $fetch_from = $run_from->fetch_assoc();
                        $fetch_to = $run_to->fetch_assoc();
                        $pick_up = $fetch_from['loc_name'];
                        $drop_off = $fetch_to['loc_name'];

                        $getVehicle = "select * from vehicle where v_id=$v_id";
                        $runVehicle = $con->query($getVehicle);
                        $fetchVehicle = $runVehicle->fetch_assoc();
                        $brand = $fetchVehicle['brand'];
                        $model = $fetchVehicle['model'];


                        $userId = $row['user_id'];
                        $getUser = "select * from accounts where acc_id=$userId";
                        $runUser = $con->query($getUser);
                        $fetchUser = $runUser->fetch_assoc();
                        $name = $fetchUser['name'];




                        echo "<div class='custom-shadow h-[100%] rounded-[20px] mb-10'>
                        <div class='px-10 py-5'>
                            <div class='flex'>
                                <div>
                                    <img src='../images/default.png' class='w-[150px]' alt='>
                                    <p class='font-bold text-center mt-2'>$name</p>
                                </div>
                                <div class='ml-5'>
                                    <h3 class='font-semibold text-2xl'>$pick_up - $drop_off</h3>
                                    <p class='text-lg mt-3'><span class='font-semibold'>Timing</span>: $tfrom - $tto</p>
                                    <p class='text-lg mt-3'><span class='font-semibold'>Vehicle</span>: $brand $model</p>
                                </div>
                            </div>
                            <div class='flex justify-around mt-5'>
                                <button onclick='messageUser($user_id)' class='bg-blue-500 hover:bg-blue-700 rounded text-white text-center px-5 py-2'><i class='fa-solid fa-message mr-2'></i>Chat</button>
                                <button onclick='markAsDone(event, $book_id)' class='bg-green-500 hover:bg-green-700 rounded text-white text-center px-5 py-2'><i class='fa-solid fa-circle-check mr-2'></i>Mark as done</button>
                            </div>
                        </div>
                    </div>";
                    }
                ?>
            </div>
            <!-- Card -->
    </div>
    <script>
        AOS.init();
        const markAsDone = (event, book_id) => {
            event.preventDefault()
            fetch(`../../backend/mark.php?book_id=${book_id}&type=0`, {
                method: "PUT"
            })
            .then(response => response.json())
                .then(data => {
                    window.location.reload()
                    // console.log('done')
                })
                .catch(error => {
                    console.error(error);
                });
        }

        function messageUser(user_id){
            localStorage.setItem('selected_user_id', user_id)

            window.location.href = 'chat.php'
        }
    </script>
</body>

</html>

