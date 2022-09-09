<?php include("includes/navbar.php"); ?>
<div class="md:pl-64 flex flex-col flex-1">
  <div class="sticky top-0 z-10 md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3 bg-gray-100">
    <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
      <span class="sr-only">Open sidebar</span>
      <!-- Heroicon name: outline/menu -->
      <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>
  </div>

  <!-- MAIN CONTENT -->
  <main class="flex-1">
    <div class="py-6">
      <div class="flex justify-between max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mb-4">
        <h1 class="text-2xl mb-2 font-semibold text-gray-900">
          Connections
        </h1>
        <div>
          <div class="mt-1 flex rounded-md shadow-sm">
            <div class="relative flex items-stretch flex-grow focus-within:z-10">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-400">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
              </div>
              <input type="email" name="email" id="email" class="border border-solid border-gray-300 outline-indigo-200 block w-full rounded-none rounded-l-md pl-10" placeholder="Search candidates" />
            </div>
            <button type="button" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-white bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
              <span>Search</span>
            </button>
          </div>
        </div>
      </div>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="flex flex-col">
          <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        ID
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Number of connections
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phone number
                      </th>

                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        01
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        Jane Cooper
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        jane.cooper@example.com
                      </td>
                      <td class="px-6 py-4 whitespace-wrap text-sm text-gray-500">
                        3
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        1234567890
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right">
                        <a href="consumerdetails.php" class="text-indigo-600 text-sm font-bold">
                          View Details
                        </a>
                      </td>
                    </tr>
                    <!-- /End replace -->
              </div>
            </div>
  </main>
</div>
</div>
<?php include('./includes/footer.php'); ?>