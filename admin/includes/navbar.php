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
  <title>Admin | Consumers</title>
</head>

<body>
  <div>
    <!-- Static sidebar for desktop -->
    <div class="hidden md:flex md:w-64 md:flex-col md:fixed md:inset-y-0">
      <div class="flex flex-col flex-grow border-r border-gray-200 pt-5 pb-4 bg-white overflow-y-auto">
        <div class="flex items-center flex-shrink-0 px-4">
          <h2 class="font-bold text-gray-600 text-2xl">Oneshield EBS</h2>
        </div>
        <div class="mt-5 flex-grow flex flex-col">
          <nav class="flex-1 px-2 space-y-1 bg-white" aria-label="Sidebar">
            <div class="space-y-1">
              <a href="index.php" class="<?php if ($third_part == "index.php") {
                                            echo "bg-gray-100 text-indigo-600";
                                          } else {
                                            echo "bg-white text-gray-600";
                                          } ?> hover:bg-gray-50 hover:text-indigo-600 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="mr-3 flex-shrink-0 h-6 w-6 <?php if ($third_part == "index.php") {
                                                          echo "bg-gray-100 text-indigo-600";
                                                        } else {
                                                          echo "bg-white text-gray-600";
                                                        } ?> group-hover:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="flex-1">Consumers</span></a>
            </div>
            <div class="space-y-1">
              <a href="connections.php" class="<?php if ($third_part == "connections.php") {
                                                  echo "bg-gray-100 text-indigo-600";
                                                } else {
                                                  echo "bg-white text-gray-600";
                                                } ?> hover:bg-gray-50 hover:text-indigo-600 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 flex-shrink-0 h-6 w-6 <?php if ($third_part == "connections.php") {
                                                                                                                                                                      echo "bg-gray-100 text-indigo-600";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "bg-white text-gray-600";
                                                                                                                                                                    } ?> group-hover:text-indigo-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 21v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21m0 0h4.5V3.545M12.75 21h7.5V10.75M2.25 21h1.5m18 0h-18M2.25 9l4.5-1.636M18.75 3l-1.5.545m0 6.205l3 1m1.5.5l-1.5-.5M6.75 7.364V3h-3v18m3-13.636l10.5-3.819" />
                </svg>

                <span class="flex-1">Connections</span></a>
            </div>
            <div class="space-y-1">
              <a href="distributors.php" class="<?php if ($third_part == "distributors.php") {
                                                  echo "bg-gray-100 text-indigo-600";
                                                } else {
                                                  echo "bg-white text-gray-600";
                                                } ?> hover:bg-gray-50 hover:text-indigo-600 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 flex-shrink-0 h-6 w-6 <?php if ($third_part == "distributors.php") {
                                                                                                                                                                      echo "bg-gray-100 text-indigo-600";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "bg-white text-gray-600";
                                                                                                                                                                    } ?> group-hover:text-indigo-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>

                <span class="flex-1">Distributors</span></a>
            </div>
            <div class="space-y-1">
              <a href="providers.php" class="<?php if ($third_part == "providers.php") {
                                                echo "bg-gray-100 text-indigo-600";
                                              } else {
                                                echo "bg-white text-gray-600";
                                              } ?> hover:bg-gray-50 hover:text-indigo-600 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 flex-shrink-0 h-6 w-6 <?php if ($third_part == "providers.php") {
                                                                                                                                                                      echo "bg-gray-100 text-indigo-600";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "bg-white text-gray-600";
                                                                                                                                                                    } ?> group-hover:text-indigo-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                </svg>

                <span class="flex-1">Providers</span></a>
            </div>
            <div class="space-y-1">
              <a href="complaints.php" class="<?php if ($third_part == "complaints.php") {
                                                echo "bg-gray-100 text-indigo-600";
                                              } else {
                                                echo "bg-white text-gray-600";
                                              } ?> hover:bg-gray-50 hover:text-indigo-600 group w-full flex items-center pl-2 pr-1 py-2 text-left text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-3 flex-shrink-0 h-6 w-6 <?php if ($third_part == "complaints.php") {
                                                                                                                                                                      echo "bg-gray-100 text-indigo-600";
                                                                                                                                                                    } else {
                                                                                                                                                                      echo "bg-white text-gray-600";
                                                                                                                                                                    } ?> group-hover:text-indigo-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0-10.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.75c0 5.592 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.57-.598-3.75h-.152c-3.196 0-6.1-1.249-8.25-3.286zm0 13.036h.008v.008H12v-.008z" />
                </svg>

                <span class="flex-1">Complaints</span></a>
            </div>
          </nav>
        </div>
      </div>
    </div>