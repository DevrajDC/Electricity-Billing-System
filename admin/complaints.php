<?php include("./includes/navbar.php"); ?>
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
          Complaints
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
                        Complaint No.
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap tracking-wider">
                        Bill ID
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Summary
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        update status
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                          1
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">123</div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">John Doe</div>
                      </td>
                      <td class="px-6 py-4 whitespace-wrap text-sm text-gray-500">
                        <div class="text-sm text-gray-900">
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit. Officiis non libero saepe
                          officia culpa iure quidem in, optio dicta
                          voluptate neque delectus, esse repudiandae
                          repellat nulla voluptatibus quo reprehenderit!
                          Amet!
                        </div>
                      </td>
                      <td class="px-6 py-4 text-sm text-gray-500">
                        <div class="flex justify-center">
                          <div class="mb-3 xl:w-64">
                            <select class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                              <option value="pending">pending</option>
                              <option value="resolved">resolved</option>
                            </select>
                          </div>
                        </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Update</a>
                      </td>
                    </tr>

                    <!-- More people... -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /End replace -->
      </div>
    </div>
  </main>
</div>
</div>

<!-- meter modal -->
<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="add-meter-modal">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="mt-3 text-center sm:mt-0 sm:text-left">
            <form class="space-y-8 divide-y divide-gray-200">
              <div class="space-y-4 divide-y divide-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Add meter
                </h3>

                <div class="mt-2 pt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                  <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">
                      Meter No.
                    </label>
                    <div class="mt-1">
                      <input type="number" name="meter-no" id="meter-no" class="w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                    </div>
                  </div>

                  <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">
                      Select Phase
                    </label>
                    <div class="mt-1">
                      <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option value="phase1">phase1</option>
                        <option value="phase2">phase2</option>
                        <option value="phase2">phase3</option>
                      </select>
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">
                      Connection Status
                    </label>
                    <div class="mt-1">
                      <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">
                      Connection type
                    </label>
                    <div class="mt-1">
                      <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                        <option value="Domestic">Domestic</option>
                        <option value="Industrial">Industrial</option>
                        <option value="Industrial">Commercial</option>
                        <option value="Industrial">Agricultural</option>
                      </select>
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">
                      Connection date
                    </label>
                    <input class="w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" name="" id="" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
          <button type="button" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
            Submit
          </button>
          <button onclick="toggleModal('add-meter-modal')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- reject modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" id="reject-modal" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="sm:flex sm:items-start">
        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
          <!-- Heroicon name: outline/exclamation -->
          <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
          </svg>
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
            Reject Account
          </h3>
          <div class="mt-2">
            <p class="text-sm text-gray-500">
              Are you sure you want to reject this account? All of data will
              be permanently removed from our servers forever. This action
              cannot be undone.
            </p>
          </div>
        </div>
      </div>
      <div class="mt-5 sm:mt-4 sm:ml-10 sm:pl-4 sm:flex">
        <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm">
          Reject
        </button>
        <button onclick="toggleModal('reject-modal')" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
<?php include("./includes/footer.php"); ?>