<?php
session_start();
include("admin/includes/dbConnection.php");
if (isset($_GET["logout"])) {
    setcookie("consumer", "", time() - 3600, '/');
} elseif (isset($_COOKIE["consumer"])) {
    $_SESSION["consumer"] = $_COOKIE["consumer"];
    echo "<script>window.location.href='consumer/index.php';</script>";
}
unset($_SESSION["meter_num"]);
unset($_SESSION["consumer"]);

function registerUser()
{
    echo "<BR>email: " . $_POST["email"];
    echo "<BR>name: " . $_POST["name"];
    echo "<BR>phone: " . $_POST["phone"];
    echo "<BR>pwd: " . $_POST["password"];

    $email = $_POST["email"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $pwd = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $q = "SELECT consumer_id FROM users ORDER BY consumer_id DESC LIMIT 1";
    $res = $GLOBALS['conn']->query($q);
    $r = $res->fetch_assoc();
    $consumer_id = $r["consumer_id"] + 1;
    echo "<BR>consumer_id: " . $consumer_id;

    $query = "INSERT INTO Users Values ($consumer_id, '$email', '$pwd', '$name', $phone, 0)";
    if ($GLOBALS['conn']->query($query) === TRUE) {
        $_SESSION["consumer"] = $consumer_id;
        echo "<script>window.location.href='consumer/index.php';</script>";
    } else {
        echo "<script>
                alert('Error Registering User');
                window.location.href='login.php';
                </script>";
    }
}

function loginUser()
{
    $email = $_POST["email"];
    // $pwd = $_POST["password"];
    // echo "<BR>Email: ".$email;
    // echo "<BR>Password: ".$pwd;

    $q = "SELECT consumer_id, pwd, is_admin FROM users WHERE email = '$email'";
    $res = $GLOBALS['conn']->query($q);

    if (mysqli_num_rows($res) == 0) {
        echo "<script>
                alert('No User Found');
                window.location.href='login.php';
                </script>";
    } else {
        $r = $res->fetch_assoc();
        if (password_verify($_POST["password"], $r["pwd"])) {
            if (isset($_POST["remember-me"])) {
                setcookie('consumer', $r["consumer_id"], time() + 60 * 60 * 24 * 365, '/');
            }
            if ($r["is_admin"] == 1) {
                $_SESSION["is_admin"] = TRUE;
                echo "<script>
                window.location.href='admin/index.php';</script>";
            } else {
                $_SESSION["consumer"] = $r["consumer_id"];
                echo "<script>window.location.href='consumer/index.php';</script>";
            }
        } else {
            echo "<script>
                    alert('Password Incorrect');
                    window.location.href='login.php';
                    </script>";
        }
    }
}

if (isset($_POST['Register'])) {
    registerUser();
} elseif (isset($_POST["Login"])) {
    loginUser();
}

?>

<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="styler.css" type="text/css">
    <title>Document</title>
</head>

<body>
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div id="img" class="hidden bg-cover lg:block lg:w-2/3" style="transition: all 0.5s; background-image: url(https://sites.google.com/a/thapar.edu/pee-107/_/rsrc/1504180556705/home/tvss-lightning.jpg?height=266&width=400)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="font-bold text-white text-4xl mb-2 ">Oneshield EBS</h2>
                        <p class="max-w-xl text-lg text-gray-300">One stop destination for all your electricity bill payments.</p>
                    </div>
                </div>
            </div>
            <!-- nav -->
            <div class="max-w-md px-6 mx-auto lg:mt-20 sm:mt-2">
                <!-- enter nav -->
                <div class="">
                    <h2 class=" mt-4 font-bold text-center text-indigo-600 text-4xl mb-8">Oneshield EBS</h2>
                    <!-- Tabs at small breakpoint and up -->
                    <nav>
                        <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                        <a id="nm1" href="#" class="menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-12 border-b-2 font-medium text-sm" onclick="navcolor('nm1','nm2','','menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-12 border-b-2 font-medium text-sm', 'menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-12 border-b-2 font-medium text-sm')
                                ,changeslide('l1','l2','')">
                            Login </a>
                        <a id="nm2" href="#" class=" menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-12 border-b-2 font-medium text-sm" onclick="navcolor('nm2','nm1','','menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-12 border-b-2 font-medium text-sm', 'menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-12 border-b-2 font-medium text-sm'),changeslide('l2','l1','')">
                            Register </a>
                    </nav>
                    <!-- sign in -->
                    <div id="l1" class="mt-8">
                        <form id="f1" action="#" method="POST" onsubmit="return validatelogin()" class="space-y-6 pr">
                            <div style="opacity:0; animation-name:changeform; animation-delay:0s; animation-duration: 0.5s;animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <label for="email" class="block text-sm font-medium text-gray-700"> Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="text" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <small class="text-red-400"></small>
                                </div>
                            </div>
                            <div class="space-y-1" style="opacity:0; animation-name:changeform; animation-delay:0.03s;  animation-duration: 0.5; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <small class="text-red-400"></small>
                                </div>
                            </div>
                            <div class="flex items-center justify-between" style="opacity:0; animation-name:changeform; animation-delay:0.06s;  animation-duration: 0.5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me
                                    </label>
                                </div>
                            </div>
                            <div style="opacity:0; animation-name:changeform; animation-delay:0.15s; animation-duration: 0.5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <button type="submit" name="Login" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign In</button>
                            </div>
                        </form>
                    </div>
                    <!-- register -->
                    <form id="l2" style="display:none;" action="#" method="POST" onsubmit="return validateReg()" class="space-y-4 pr mt-8">
                        <div style="opacity:0; animation-name:changeform; animation-delay:0s; animation-duration: 0.5s;animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email address
                            </label>
                            <div class="mt-1">
                                <input id="email1" name="email" type="text" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <small class="text-red-400"></small>
                            </div>
                        </div>
                        <div style=" opacity:0; animation-name:changeform; animation-delay:0.03s; animation-duration: 0.5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Full Name </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="text" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <small class="text-red-400"></small>
                            </div>
                        </div>
                        <div style="opacity:0; animation-name:changeform; animation-delay:0.06s; animation-duration: 0.5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Phone </label>
                            <div class="mt-1">
                                <input id="phone" name="phone" type="number" autocomplete="email" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <small class="text-red-400"></small>
                            </div>
                        </div>
                        <div class="space-y-1" style="opacity:0; animation-name:changeform; animation-delay:0.12s; animation-duration: 0.5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <div class="mt-1">
                                <input id="password1" name="password" type="password" autocomplete="current-password" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <small class="text-red-400"></small>
                            </div>
                        </div>
                        <div style="opacity:0; animation-name:changeform; animation-delay:0.15s; animation-duration: 0.5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <button type="submit" name="Register" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="admin/index.js"></script>
</body>

</html>