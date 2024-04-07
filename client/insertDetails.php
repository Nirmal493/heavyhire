<?php include './db/db.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php' ?>
    <title>Insert Details</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <form class="flex flex-col px-20 py-20" action="<?php echo $url ?>/signup"  method="POST">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" name="name" placeholder="Enter name" id="">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="email" placeholder="Enter email" name="email">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="password" name="pass" placeholder="Enter password" id="">
        <select class="border-2 mb-10 py-3 rounded-[15px] px-5" name="type_id" id="">
            <option value="1">Driver</option>
            <option value="2">User</option>
        </select>
        <button type="submit" class="bg-teal-800 hover:bg-teal-900 text-white px-4 py-2 rounded-[15px] m-auto w-[30%]">Sign up</button>
    </form>
    <?php include 'footer.php' ?>
</body>
</html>