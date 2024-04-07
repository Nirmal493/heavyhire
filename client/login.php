<?php include 'db/db.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'links.php' ?>
    <title>Log in</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <form class="flex flex-col px-20 py-20" method="POST">
        <input value="abhinav@gmail.com" class="border-2 mb-10 py-3 rounded-[15px] px-5" type="email" placeholder="Enter email" name="email" required>
        <input value="abhinav" class="border-2 mb-10 py-3 rounded-[15px] px-5" type="password" name="pass" placeholder="Enter password" id="" required>
        <button type="submit" class="bg-teal-800 hover:bg-teal-900 text-white px-4 py-2 rounded-[15px] m-auto w-[30%]">Log in</button>
    </form>
    <?php include 'footer.php' ?>
</body>
</html>

<script>

    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch("../backend/login.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
            .then(data => {
                if(data.success){
                    localStorage.setItem('loggedIn', true)
                    localStorage.setItem('email', data.email)
                    localStorage.setItem('name', data.name)
                    localStorage.setItem('type_id', data.type_id)
                    localStorage.setItem('acc_id', data.acc_id)
                    window.location.replace('/heavyhire/client/')
                }else{
                    window.alert('Wrong password')
                }
            })
            .catch(error => {
                console.error(error);
            });
        });
</script>