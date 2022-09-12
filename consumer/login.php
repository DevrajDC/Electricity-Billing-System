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
            <div id="img" class="hidden bg-cover lg:block lg:w-2/3" style="transition: all 0.5s; background-image: url(https://images.unsplash.com/photo-1616763355603-9755a640a287?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="font-bold text-white text-2xl mb-8 ">Oneshield EBS</h2>

                        <p class="max-w-xl mt-3 text-gray-300">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            In autem ipsa, nulla laboriosam dolores, repellendus perferendis libero suscipit nam
                            temporibus molestiae</p>
                    </div>
                </div>
            </div>
            <!-- nav -->
            <div class="max-w-md px-6 mx-auto lg:mt-64 sm:mt-2">
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
                        <form id="l1" action="#" method="POST" class="space-y-6 pr">
                            <div style="opacity:0; animation-name:changeform; animation-delay:0s; animation-duration: 1s;animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <label for="email" class="block text-sm font-medium text-gray-700"> Email address
                                </label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="space-y-1" style="opacity:0; animation-name:changeform; animation-delay:0.03s;  animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>

                            <div class="flex items-center justify-between" style="opacity:0; animation-name:changeform; animation-delay:0.06s;  animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <div class="flex items-center">
                                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me
                                    </label>
                                </div>

                                <div class="text-sm" style="opacity:0; animation-name:changeform; animation-delay:0.09s; animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode:forwards;">
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot your
                                        password? </a>
                                </div>
                            </div>

                            <div style="opacity:0;animation-name:changeform; animation-delay:0.12s; animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign
                                    in</button>
                            </div>

                        </form>

                    </div>

                    <!-- register -->
                    <form id="l2" style="display:none;" action="#" method="POST" class="space-y-4 pr mt-8">
                        <div style="opacity:0; animation-name:changeform; animation-delay:0s; animation-duration: 1s;animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Email address
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div style=" opacity:0; animation-name:changeform; animation-delay:0.03s; animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Full Name </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div style="opacity:0; animation-name:changeform; animation-delay:0.06s; animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="email" class="block text-sm font-medium text-gray-700"> Phone </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="number" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>

                        <div class="space-y-1" style="opacity:0; animation-name:changeform; animation-delay:0.12s; animation-duration: 1s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>
                        </div>
                        <div style="opacity:0; animation-name:changeform; animation-delay:0.15s; animation-duration: 5s; animation-timing-function:ease-in;animation-fill-mode: forwards;">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="../admin/index.js"></script>
</body>

</html>