<?php include '../db/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>All chats</title>
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
                $user_id = $_SESSION['acc_id'];
                $query = "select * from chats where sender_acc_id='$user_id'";
                $run = $con->query($query);
                $receivers = array();
                while($run && $row = $run->fetch_assoc()){
                    $receiver_id = $row['reciever_acc_id'];
                    $q_user = "select * from accounts where acc_id = '$receiver_id'";
                    $r_user = $con->query($q_user);
                    $f_user = $r_user->fetch_assoc();
                    $phone = $f_user['phone'];
                    $name = $f_user['name'];
                    if(!in_array($receiver_id, $receivers)){
                        array_push($receivers, $receiver_id);
                        echo "<div class='custom-shadow h-[100%] rounded-[20px] mb-10'><div class='flex justify-between'>
                        <div class='px-5 py-5'>
                            <h1 class='text-2xl font-bold mb-3'>$name</h1>
                        </div>
                        <div class='px-10 py-10 flex flex-col'>
                            <a class='rounded text-white bg-blue-500 hover:bg-blue-700 px-5 py-2 mb-5 cursor-pointer text-center'>$phone</a>
                            <button onclick='messagePerson($receiver_id)' class='rounded text-white bg-green-500 hover:bg-green-700 px-5 py-2 text-center'>Message</button>
                        </div>
                    </div></div>";
                    }
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
    function messagePerson(receiver_id){
        localStorage.setItem('selected_user_id', receiver_id)

        window.location.href = 'chat.php'
    }
</script>

<?php
    if (isset($_POST['button_clicked'])) {
        echo "<script>document.getElementById('contact_button').innerHTML = 'ss';</script>";
    }
?>