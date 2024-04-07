<?php include './db/db.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php' ?>
    <title>Sign up</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <form class="flex flex-col px-20 py-20" method="POST">
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" name="name" placeholder="Enter name" id="" required>
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="email" placeholder="Enter email" name="email" required>
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="password" name="pass" placeholder="Enter password" id="" required>
        <select class="border-2 mb-10 py-3 rounded-[15px] px-5" name="type_id" id="" required>
            <option value="1">Driver</option>
            <option value="2">User</option>
        </select>
        <input class="border-2 mb-10 py-3 rounded-[15px] px-5" type="text" placeholder="Enter phone" name="phone" required>
        <button type="submit" class="bg-teal-800 hover:bg-teal-900 text-white px-4 py-2 rounded-[15px] m-auto w-[30%]">Sign up</button>
    </form>
    <?php include 'footer.php' ?>
</body>
</html>

<script>


    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("../backend/signup.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
            .then(data => {
                if(data.success){
                    window.location.replace('/heavyhire/client/login.php')
                }else{
                    window.alert('Account already exists!')
                }
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>