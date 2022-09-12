<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Admin | Consumers</title>
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
                    <a href="index.php" class="<?php if ($third_part == "index.php") echo "bg-gray-900"; ?> text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
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
      <header class="py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <h1 class="text-3xl font-bold text-white">
            Select Meter to proceed
          </h1>
        </div>
      </header>
    </div>
    <main class="-mt-32">
      <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
        <!-- Replace with your content -->
        <div class="bg-white rounded-lg shadow px-12 py-12">
          <div class="flex flex-col border-gray-200 rounded-lg space-y-6">

            <!-- Empty State Starts -->
            <!-- <div class="flex justify-center border-solid border-b border-gray-200 pb-4">
              <img width="300px" src="../assets/no content backup.png" alt="">
            </div> -->
            <!-- Empty State End -->

            <!-- Meter Card Starts -->
            <div class="flex justify-between border-solid border-b border-gray-200 pb-4">
              <div class="flex flex-col space-y-4 ">
                <div>
                  <h1 class="text-lg font-bold">Meter ID: 1232131</h1>
                </div>
                <div class="whitespace-normal">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Accusantium nisi iure numquam unde natus, quae perferendis,
                  exercitationem voluptate temporibus ea repellendus officia
                  quos ducimus? Debitis quasi nemo magnam nulla laudantium!
                </div>
                <div class="flex space-x-4">
                  <div class="space-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                    </svg>

                    <span class="flex-1">Industrial</span>
                  </div>
                  <div class="space-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                    <span class="flex-1">Phase 3</span>
                  </div>
                  <div class="space-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>

                    <span class="flex-1">Active</span>
                  </div>
                </div>
              </div>
              <a href="./bills.php">
                <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Proceed
                </button>
              </a>
            </div>
            <div class="flex justify-between border-solid border-b border-gray-200 pb-4">
              <div class="flex flex-col space-y-4 ">
                <div>
                  <h1 class="text-lg font-bold">Meter ID: 1232131</h1>
                </div>
                <div class="whitespace-normal">
                  Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                  Accusantium nisi iure numquam unde natus, quae perferendis,
                  exercitationem voluptate temporibus ea repellendus officia
                  quos ducimus? Debitis quasi nemo magnam nulla laudantium!
                </div>
                <div class="flex space-x-4">
                  <div class="space-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                    </svg>

                    <span class="flex-1">Industrial</span>
                  </div>
                  <div class="space-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                    </svg>
                    <span class="flex-1">Phase 3</span>
                  </div>
                  <div class="space-y-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>

                    <span class="flex-1">Active</span>
                  </div>
                </div>
              </div>
              <a href="./bills.php">
                <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Proceed
                </button>
              </a>
            </div>
            <!-- Meter Card End -->

            <div class="flex justify-center">
              <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Request for New Meter
              </button>
            </div>
          </div>
        </div>
        <!-- /End replace -->
      </div>
    </main>
  </div>

  <?php include("includes/footer.php"); ?>
</body>

</html>