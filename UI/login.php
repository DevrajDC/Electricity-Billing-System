<?php
  session_start();
  include("../DB/dbConnection.php");
  include("../LOGIC/login.php");
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
?>

<!DOCTYPE html>
<html class="h-full bg-gray-50" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="library/stylesheets/styler.css" type="text/css">
    <script>
        function showsuccessbar(prf1, msg, flag) {
          console.log("a");
          document.getElementById(prf1).style.display = "block";
          if (flag) {
            document.getElementById("success_msg").innerHTML = msg;
          } else {
            document.getElementById("err_msg").innerHTML = msg;
          }
          setTimeout(() => {
            document.getElementById(prf1).style.display = "none";
          }, 3000);
        }
    </script>
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
    <!-- Error Toast Starts -->
    <div id="profile2" class="w-fit rounded-md bg-red-50 px-4 py-3 z-100 top-10 absolute left-1/2 transform -translate-x-1/2 hidden" style=" opacity:100; animation-name:changeform; animation-delay:0.1s; animation-duration: 0.3s; animation-timing-function:ease-in-out;animation-fill-mode: forwards;">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-red-400">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-red-800 whitespace-nowrap" id="err_msg">Error Occured!</p>
              </div>
              <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                  <button type="button" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    <span class="sr-only">Dismiss</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- Error Toast Ends -->
          <?php
            if(isset($_SESSION["toast"])) {
              $msg = $_SESSION["toastMessage"];
              if($_SESSION["toast"] == 1) {
                echo "<script>showsuccessbar('profile1', '$msg', 1);</script>";
              } else {
                echo "<script>showsuccessbar('profile2', '$msg', 0);</script>";
              }
              unset($_SESSION["toast"]);
              unset($_SESSION["toastMessage"]);
            }
          ?>
          <script src="../LOGIC/js/admin_index.js"></script>
</body>

</html>