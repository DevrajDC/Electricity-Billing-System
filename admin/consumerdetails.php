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
          Consumers Name
        </h1>
      </div>
      <!-- Playcard Start -->
      <div class="max-w-7xl mx-auto  sm:px-6 md:px-8">
        <div class="flex flex-col">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <div class="relative pt-5 border-b border-gray-200 sm:pb-0">
              <div class="md:flex md:items-center md:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900 ">Meter: 1029384930</h3>
                <button type="button" onclick="toggleModal('Delete-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent rounded shadow-sm text-xs font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                <div class="mt-3 flex md:mt-0 md:absolute md:top-3 md:right-0">
                </div>
              </div>
              <div class="mt-4">
                <!-- Tabs at small breakpoint and up -->
                <div class="hidden sm:block">
                  <nav class="-mb-px flex">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a id="m1" href="#details" class="menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm" onclick="changeslide('p1','p2','p3'),navcolor('m1','m2','m3'),changename('Applicant Information','personal details and information')">
                      Details </a>

                    <a id="m2" href="#connection" class="menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm" onclick="changeslide('p2','p1','p3'),navcolor('m2','m1','m3'),changename('Meter Information','Meter details and information')">
                      Connection </a>

                    <a id="m3" href="#bill" class="menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm" aria-current="page" onclick="changeslide('p3','p1','p2',),navcolor('m3','m2','m1'),changename('Bill Information','Bill details and information')">
                      Bill </a>
                  </nav>
                </div>
              </div>
            </div>
            <div>
              <br>
              <!--details-->
              <div class="flex w-full- items-center">
                <div class="w-full">
                  <h3 class="text-lg leading-6 font-medium text-gray-900" id="hh1">Applicant Information</h3>
                  <p class="mt-1 max-w-2xl text-sm text-gray-500" id="hh2">Personal details and application.</p>
                </div>
                <button type="button" onclick="toggleModal('add-meter-modal')" class="h-fit px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Update
                </button>
              </div>
            </div>
            <!-- Details Tab -->
            <div id="p1" class="mt-5 border-t border-gray-200">
              <dl class="divide-y divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="peter" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Phone</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="3452355" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="margotfoster@example.com" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                </li>
                </ul>
                </dd>
            </div>
            </dl>
            <!-- Connection Tab -->
            <div id="p2" class="mt-5 border-t border-gray-200" style="display:none">
              <!--details-->
              <dl class="divide-y divide-gray-200">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Consumer ID</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="324423242" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Connection Type</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="Domestic" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Address</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="h.no margao panaji goa" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Phase</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="Phase-1" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Connection Status</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="active" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                  
                  </dd>
                </div>
                <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                  <dt class="text-sm font-medium text-gray-500">Connection Date</dt>
                  <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                    <span class="flex-grow"><input type="text" outline="none" value="1/1/2022" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;">
                    </span>
                  
                  </dd>
                </div>
            </div>
            <br>
            <!-- Bills Tab -->
            <div id="p3" style="display:none ;">
              <!--details-->
              <div class="">
                <div class="flex flex-col">
                  <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                      <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                            <tr>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Bill
                                No.</th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date
                              </th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Current Reading</th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                              <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                              <th scope="col" class="relative px-6 py-3">
                              </th>
                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <input type="text" outline="none" value="21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="1/1/2022" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="44432" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="$21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"> Unpaid </span></td>
                             
                            </tr>
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <input type="text" outline="none" value="21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="1/1/2022" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="44432" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="$21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Paid </span></td>
                             
                            </tr>
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <input type="text" outline="none" value="21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="1/1/2022" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="44432" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="$21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Paid </span></td>
                             
                            </tr>
                            <tr>
                              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <input type="text" outline="none" value="21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                              </td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="1/1/2022" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="44432" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" value="$21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Paid </span></td>
                             
                            </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
          </div>
          </li>
          </ul>
          </dd>
          </dl>
        </div>
        <br>
        <!-- Playcard ends -->
  </main>
</div>
<!-- Delete modal -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" id="Delete-modal" aria-modal="true">
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
            Delete
          </h3>
          <div class="mt-2">
            <p class="text-sm text-gray-500">
              Are you sure you want to Delete this Account? All of data will be
              permanently removed from our servers forever. This action cannot
              be undone.
            </p>
          </div>
        </div>
      </div>
      <div class="mt-5 sm:mt-4 sm:ml-10 sm:pl-4 sm:flex">
        <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm">
          Delete
        </button>
        <button onclick="toggleModal('Delete-modal')" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Cancel
        </button>
      </div>
    </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>