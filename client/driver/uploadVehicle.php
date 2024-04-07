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
    
    <title>Upload Vehicles</title>
</head>
<body>
    <?php include 'sidebar.php' ?>
    <form class="flex flex-col p-4 sm:ml-64" method="POST" enctype="multipart/form-data">
        <input class="hidden" type="text" id="acc_id" name="acc_id" value="<?php echo $_SESSION['acc_id'] ?>">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" placeholder="Enter Brand" name="brand">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" placeholder="Enter Model" name="model">
        <div class="flex">
            <input placeholder="Enter register no" class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" type="number" name="reg_no">
            <input class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" type="date" name="exp_date">
        </div>
        <input placeholder="Enter insurance.." class="border-2 mb-10 py-3 rounded-[15px] px-5 w-[50%]" type="number" name="insurance">
        <button type="submit" class="bg-teal-800 hover:bg-teal-900 text-white px-4 py-2 rounded-[15px] m-auto w-[30%]">Upload</button>
    </form>
</body>
</html>

<script>

    const form = document.querySelector("form");
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("../../backend/uploadVehicle.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
            .then(data => {
                window.location.replace('/heavyhire/client/driver/driverDashboard.php')
                console.log(data)
            })
            .catch(error => {
                console.error(error);
            });
        });
</script>