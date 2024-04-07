<?php include '../db/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Vehicles</title>
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
                $query = "select * from vehicle where acc_id=$driver_id";
                $run = $con->query($query);
                while($run && $row = $run->fetch_assoc()){
                    $v_id = $row['v_id'];
                    $brand = $row['brand'];
                    $model = $row['model'];
                    $insurance = $row['insurance'];
                    $reg_no = $row['reg_no'];
                    $exp_date = $row['exp_date'];
                    echo "<div class='custom-shadow h-[100%] rounded-[20px] mb-10'><div class='flex justify-between'>
                    <div class='px-5 py-5'>
                        <h1 class='text-2xl font-bold mb-3'>$brand</h1>
                        <h3 class='text-xl font-semibold mb-3'>$model</h3>
                        <h3 class='text-md text-lg mb-3'><b>Insurance no</b>: $insurance</h3>
                        <h3 class='text-md text-lg mb-3'><b>Register no</b>: $reg_no</h3>
                        <h3 class='text-md text-lg mb-3'><b>Expiry</b>: $exp_date</h3>
                    </div>
                    <form id='delete_button' class='px-10 py-10 flex flex-col'>
                        <a href='editVehicle.php?v_id=$v_id' class='rounded text-white bg-blue-500 hover:bg-blue-700 px-5 py-2 mb-5 cursor-pointer text-center'>Edit</a>
                        <button onclick='runDelete(event, $v_id)' class='rounded text-white bg-red-500 hover:bg-red-700 px-5 py-2 text-center'>Delete</button>
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

<script>
    const deleteBtn = document.querySelector('.delete_btn')
    const runDelete = (event, v_id) => {
        event.preventDefault()
        fetch(`../../backend/deleteVehicle.php?v_id=${v_id}`, {
            method: "DELETE"
        })
        .then(response => response.json())
            .then(data => {
                window.location.replace('/heavyhire/client/driver/viewVehicles.php')
            })
            .catch(error => {
                console.error(error);
            });
    }
</script>

<?php
    if (isset($_POST['button_clicked'])) {
        echo "<script>document.getElementById('contact_button').innerHTML = 'ss';</script>";
    }
?>