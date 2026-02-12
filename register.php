<?php
include('./connection.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $secure_pass = md5($password);

    $query = "SELECT * FROM users where userEmail = '$email'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('User Already Register ⚠️')</script>";
    }else{
        $insert_data = "INSERT into users (userName,userEmail,user_password)VALUES('$name','$email','$secure_pass')";

         if (mysqli_query($conn, $insert_data)) {
            echo "<script>alert('Registeration Successfully 🤩😍')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="relative w-[900px] h-[500px]  rounded-2xl shadow-2xl overflow-hidden">
        <div id="slider" class="flex w-[200%] h-full  transition-transform duration-700">
           
        <!-- Regiter Side -->
        <div class="w-1/2 flex">

            <!-- Registration form -->
                <div class="w-1/2 flex items-center justify-center bg-red-100">
                    <div class="w-3/4">
                        <h2 class="text-3xl font-bold mb-4 text-center">Register Form</h2>
                        <form method="post">
                            <label class="ml-1">Name :</label>
                            <input type="text" placeholder="Enter your name" name="name" class="w-full mt-1 mb-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <label class="ml-1">Email :</label>
                            <input type="email" placeholder="Enter your email" name="email" class="w-full mt-1 mb-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <label class="ml-1">Password :</label>
                            <input type="password" placeholder="Enter your password" name="password" class="w-full mt-1 mb-2 p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <button type="submit" name="submit" class="w-full mt-1 mb-4 p-3 bg-blue-400 rounded-lg text-white">Register Now</button>
                        </form>
                    </div>
                </div>

                <!-- Info Panel -->
                <div class="w-1/2 bg-blue-500 text-white flex flex-col justify-center items-center text-center p-10">
                    <h2 class="text-3xl font-bold mb-4">Welcome Back!</h2>
                    <p class="mb-4">Already have an account ?</p>
                    <button onclick="toggle()"
                    class="border border-white px-6 py-2 rounded-lg hover:bg-white hover:text-blue-500 transition">
                       Go back Login form
                    </button>
                </div>
        </div>
        <?php
            include('./login.php')
        ?>
        </div>
    </div>
    <script>
        let active = false;
        function toggle(){
            const slider = document.getElementById("slider");
            slider.style.transform = active ? "translateX(0%)" : "translateX(-50%)";
            active = !active
        }
    </script>
</body>
</html>