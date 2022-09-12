<!-- reads url from address bar -->
<?php
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$third_part = $components[3];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Consumers</title>
</head>

<body>
    <div class="min-h-full">
        <div class="bg-gray-800 pb-32">
            <nav class="bg-gray-800">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="border-b border-gray-700">
                        <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <h3 class="text-lg font-bold text-white">Oneshield EBS</h3>
                                </div>
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                        <a href="bills.php" class="<?php if ($third_part == "bills.php") echo "bg-gray-900"; ?> text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Bills</a>

                                        <a href="complaints.php" class="<?php if ($third_part == "complaints.php") echo "bg-gray-900"; ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Transaction History</a>

                                        <a href="complaints.php" class="<?php if ($third_part == "complaints.php") echo "bg-gray-900"; ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Complaint</a>

                                        <a href="profile.php" class="<?php if ($third_part == "profile.php") echo "bg-gray-900"; ?> text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Profile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
                                    <button type="button" class="text-white bg-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium flex gap-2 items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>