<?php 
    include 'db/db.php'; 
    session_start(); 
    if(isset($_GET['from_id']) && isset($_GET['to_id']) && isset($_GET['time'])){
        $from_id = $_GET['from_id'];
        $to_id = $_GET['to_id'];
        $time = $_GET['time'];
        // echo $from_id . $to_id . $time;
        $query = "select * from available where '$time' between tfrom and tto and from_id = '$from_id' and to_id = '$to_id'";
    }else{
        $query = "select * from available";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Available Vehicles</title>
    <?php include 'links.php' ?>
</head>

<body>
    <?php include 'navbar.php'; ?>

    <div class="px-5 py-5 mt-5">
        <div class="custom-shadow h-[100px] rounded-[20px] px-10 py-8">
            <div class="flex justify-between">
            <select id="from_id" class="w-[40%] border-b text-gray-800 focus:outline-none" type="text" name="from_id">
            <option value="">--Select From--</option>
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
            <select id="to_id" class="w-[40%] border-b text-gray-800 focus:outline-none" type="text" name="to_id">
                <option value="">--Select To--</option>
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
                <input id="time" type="time" name="" id="">
                <button onclick="searchAvailable()" class="rounded text-white bg-green-800 py-2 px-3 hover:bg-green-700">Search</button>
            </div>
        </div>
    </div>
    <div class="px-5 py- mb-20">
        <div class="custom-shadow h-[100%] rounded-[20px]">
            <!-- Card -->
            <?php
                $user_id = $_SESSION['acc_id'];
                $run = $con->query($query);
                while($run && $row = $run->fetch_assoc()){
                    $avai_id = $row['avai_id'];
                    $Ufrom = $row['tfrom'];
                    $acc_id = $row['acc_id'];

                    $q_acc = "select * from accounts where acc_id = '$acc_id'";
                    $r_acc = $con->query($q_acc);
                    $f_acc = $r_acc->fetch_assoc();
                    $name = $f_acc['name'];

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
                    $checkBooked = "select * from book where user_id=$user_id AND avai_id=$avai_id AND type = 1";
                    $runCheckBooked = $con->query($checkBooked);
                    if($runCheckBooked->num_rows == 0){
                        echo "<div id='$avai_id' class='px-10 py-10 flex'>
                        <img src='../backend/availableImages/$image' class='w-[350px] h-[200px]' />
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
                            
                                <input type='hidden' name='avai_id' id='avai_id' value=$avai_id>
                                <input type='hidden' name='driver_id' id='driver_id' value=$acc_id>
                                <button onclick='submitForm()' class='rounded text-white bg-red-800 py-2 px-3 hover:bg-red-700 w-[1005] mb-5'>Book</button>
                            
                            <button onclick='document.getElementById('myForm').submit();' id='contact_button' class='rounded text-white bg-blue-800 py-2 px-3 hover:bg-blue-700 mb-5'>$phone</button>
                            <button onclick='messageDriver($acc_id, $user_id, \"" . htmlspecialchars($name, ENT_QUOTES) . "\")' class='rounded text-white bg-black py-2 px-3 hover:bg-slate-700'>Message</button>
                        </div> 
                        <!-- Hidden form to trigger PHP code on button click -->
                        <form id='myForm' method='POST'>
                            <input type='hidden' name='button_clicked' value='true'>
                        </form>
                    </div>";
                    }
                }
            ?>
            <!-- Card -->
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script>
        AOS.init();
    </script>
</body>

</html>

<script>
    const form = document.querySelector("#book_button");
    const submitForm = () => {
        const driver_id = document.querySelector("#driver_id").value
        const avai_id = document.querySelector("#avai_id").value
        const pick_up = document.querySelector("#from_id").value
        const drop_off = document.querySelector("#to_id").value
        console.log(driver_id, pick_up, drop_off, localStorage.getItem('acc_id'))
        const data = new FormData();
        data.append('avai_id', avai_id);
        data.append('user_id', localStorage.getItem('acc_id'));
        data.append('driver_id', driver_id);
        data.append('pick_up', pick_up);
        data.append('drop_off', drop_off);
        fetch("../backend/book.php", {
            method: "POST",
            body: data
        })
        .then(response => response.json())
            .then(data => {
                window.location.replace('/heavyhire/client/user/booked.php')
            })
            .catch(error => {
                console.error(error);
            });
        console.log(data)
    }

    function messageDriver(driver_id, user_id, name){
        localStorage.setItem('selected_user_id', driver_id)
        localStorage.setItem('selected_user_name', name)

        window.location.href = 'user/chat.php'
    }

    function searchAvailable(){
        const pick_up = document.querySelector("#from_id").value
        const drop_off = document.querySelector("#to_id").value
        const time = document.querySelector("#time").value
        window.location.href = `availableVehicles.php?from_id=${pick_up}&to_id=${drop_off}&time=${time}`
    }
</script>

<?php
    if (isset($_POST['button_clicked'])) {
        echo "<script>document.getElementById('contact_button').innerHTML = 'ss';</script>";
    }
?>