<html lang="en">
<?php
    include 'db/db.php';
    $q_leader = "SELECT acc_id, SUM(rating) AS total_rating
    FROM rating
    GROUP BY acc_id
    ORDER BY total_rating DESC
    LIMIT 3";

    $r_leader = $con->query($q_leader);
?>

<head>
    <?php include 'links.php' ?>
    <title>Leaderboard</title>
</head>

<body>
    <?php include 'navbar.php' ?>
    <section class="text-white body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <?php
                    while($row = $r_leader->fetch_assoc()){
                        $total = $row['total_rating'];
                        $acc_id = $row['acc_id'];
                        $q_acc = "select * from accounts where acc_id = '$acc_id'";
                        $r_acc = $con->query($q_acc);
                        $f_acc = $r_acc->fetch_assoc();
                        $name = $f_acc['name'];
                        $phone = $f_acc['phone'];

                        $q_avai = "select * from available where acc_id = '$acc_id'";
                        $r_avai = $con->query($q_avai);
                        $f_avai = $r_avai->fetch_assoc();
                        $image = $f_avai['image'];

                        $v_id = $f_avai['v_id'];
                        $query_vehicle = "select * from vehicle where v_id = $v_id";
                        $run_vehicle = $con->query($query_vehicle);
                        $vehicle_data = $run_vehicle->fetch_assoc();
                        $brand = $vehicle_data['brand'];
                        $model = $vehicle_data['model'];

                        echo "<div class='p-4 md:w-1/2'>
                            <div class='h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden'>
                                <img class='lg:h-48 md:h-36 w-full object-cover object-center'
                                    src='../backend/availableImages/istockphoto-1355096028-170667a.webp' alt='blog'>
                                <div class='p-6'>
                                    <h2 class='tracking-widest text-xs title-font font-medium text-gray-400 mb-1'>rank 1</h2>
                                    <h1 class='title-font text-lg font-medium text-gray-900 mb-3'>$name</h1>
                                    <div class='flex items-center pb-10'>
                                        <svg aria-hidden='true' class='w-5 h-5 text-yellow-400' fill='currentColor'
                                            viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                            <path
                                                d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'>
                                            </path>
                                        </svg>
                                        <svg aria-hidden='true' class='w-5 h-5 text-yellow-400' fill='currentColor'
                                            viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                            <path
                                                d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'>
                                            </path>
                                        </svg>
                                        <svg aria-hidden='true' class='w-5 h-5 text-yellow-400' fill='currentColor'
                                            viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                            <path
                                                d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'>
                                            </path>
                                        </svg>
                                        <svg aria-hidden='true' class='w-5 h-5 text-yellow-400' fill='currentColor'
                                            viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                            <path
                                                d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'>
                                            </path>
                                        </svg>
                                        <svg aria-hidden='true' class='w-5 h-5 text-yellow-400' fill='currentColor'
                                            viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                            <path
                                                d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'>
                                            </path>
                                        </svg>
                                        <!--<svg aria-hidden='true' class='w-5 h-5 text-gray-300 dark:text-gray-500'
                                            fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                            <title>Fifth star</title>
                                            <path
                                                d='M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z'>
                                            </path>
                                        </svg>-->
                                        <p class='ml-2 text-sm font-medium text-gray-500 dark:text-gray-400'>x $total   
                                        </p>
                                    </div>
                                    <div class='flex justify-between items-center flex-wrap '>
                                        <button
                                            class='bg-red-800 hover:bg-red-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-[15px] space-x-4 px-5 py-2 '>
                                            book
                                        </button>
                                        <button
                                            class='bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring focus:ring-violet-300  rounded-[15px] space-x-4 px-5 py-2'>
                                            $phone
                                        </button><button
                                            onclick='messageDriver($acc_id, \"" . htmlspecialchars($name, ENT_QUOTES) . "\")'
                                            class='bg-black hover:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-[15px] space-x-4 px-5 py-2'>
                                            message
                                        </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                ?>
                <!-- <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                            src="../backend/availableImages/istockphoto-859916128-612x612.jpg" alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">rank 2</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">driver 2</h1>
                            <div class="flex items-center pb-10">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Second star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Third star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fourth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5
                                </p>
                            </div>

                            <div class="flex justify-between items-center flex-wrap">
                                <button
                                    class="bg-red-800 hover:bg-red-600 focus:outline-none focus:ring focus:ring-violet-300 rounded-[15px] space-x-4 px-5 py-2">
                                    Book
                                </button><button
                                    class="bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring focus:ring-violet-300  rounded-[15px] space-x-4 px-5 py-2 ">
                                    Conctact
                                </button><button
                                    class="bg-black hover:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300  rounded-[15px] space-x-4 px-5 py-2">
                                    Message
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                        <img class="lg:h-48 md:h-36 w-full object-cover object-center"
                            src="../backend/availableImages/istockphoto-1284419710-612x612.jpg" alt="blog">
                        <div class="p-6">
                            <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">rank 3</h2>
                            <h1 class="title-font text-lg font-medium text-gray-900 mb-3">driver 3</h1>
                            <div class="flex items-center pb-10">
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>First star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Second star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Third star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fourth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <title>Fifth star</title>
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                    </path>
                                </svg>
                                <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95 out of 5
                                </p>
                            </div>
                            <div class="flex justify-between items-center flex-wrap "><button
                                    class="bg-red-800 hover:bg-red-700 focus:outline-none focus:ring focus:ring-violet-300 rounded-[15px] space-x-4 px-5 py-2">
                                    book
                                </button><button
                                    class="bg-blue-800 hover:bg-blue-700 focus:outline-none focus:ring focus:ring-violet-300  rounded-[15px] space-x-4 px-5 py-2">
                                    contact
                                </button><button
                                    class="bg-black hover:bg-slate-700 focus:outline-none focus:ring focus:ring-violet-300  rounded-[15px] space-x-4 px-5 py-2">
                                    message
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <?php include 'footer.php' ?>
</body>
<script>
    function messageDriver(driver_id, driver_name){
        localStorage.setItem('selected_user_id', driver_id)
        localStorage.setItem('selected_user_name', driver_name)

        window.location.href = 'user/chat.php'
    }
</script>
</html>