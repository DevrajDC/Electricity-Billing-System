<?php 
  include("./includes/navbar.php");
  include("./includes/dbConnection.php");  
?>

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
  <main class="bg-gray-100 h-screen flex-1">
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mb-4">
        <h1 class="text-2xl mb-2 font-semibold text-gray-900">
          New Consumers
        </h1>

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
                        Address
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phone no.
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Region
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Phase
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium whitespace-nowrap text-gray-500 uppercase tracking-wider">
                        Conn Type
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                      $qc = "SELECT * FROM consumerrequest";
                      $res = $conn->query($qc);
                      while($r = $res->fetch_assoc()) { 
                    ?>
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?php echo $r["id"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?php echo $r["name"]; ?> <br> <span class="text-sm text-gray-500"><?php echo $r["email"]; ?></span>
                      </td>
                      <td class="px-6 py-4 whitespace-wrap text-sm text-gray-500">
                        <?php echo $r["address"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $r["phone"]; ?>  
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $r["region"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $r["phase_id"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $r["conn_type"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-right">
                        <button type="button" onclick="populateUserRequestForm('<?php echo $r['id'] ?>', '<?php echo $r['address'] ?>', '<?php echo $r['region'] ?>', '<?php echo $r['phase_id']; ?>', '<?php echo $r['conn_type']; ?>'); toggleModal('add-meter-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                          Approve
                        </button>
                        <button type="button" onclick="userRequestDeleteForm('<?php echo $r['id'] ?>'); toggleModal('reject-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          Reject
                        </button>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
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
<!-- meter modal -->
<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="add-meter-modal">
  <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

  <div class="fixed inset-0 z-10 overflow-y-auto">
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
      <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
        <form class="" action="includes/CRUD.php?action=approveUser" method="post">
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="mt-3 text-center sm:mt-0 sm:text-left">
              <div class="divide-y divide-gray-200">
                <input type="number" hidden id="consumer-id" name="consumer_id"/>
                <input type="text" hidden id="consumer-address" name="consumer_address"/>
                <input type="text" hidden id="consumer-region" name="consumer_region"/>
                <input type="text" hidden id="consumer-conn_type" name="consumer_conn_type"/>
                <input type="text" hidden id="consumer-phase_id" name="consumer_phase_id"/>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Add meter
                </h3>
                <div class="mt-2 pt-6 grid grid-cols-1 gap-y-6 gap-x-4">
                  <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">
                      Meter No.
                    </label>
                    <div class="mt-1">
                      <input type="number" name="meter-no" id="meter-no" class="w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" />
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="first-name" class="block text-sm font-medium text-gray-700">
                      Distributor
                    </label>
                    <div class="mt-1">
                      <select id="distributor" name="distributor" class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                      </select>
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">
                      Connection Status
                    </label>
                    <div class="mt-1">
                      <select name="conn_status" class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                        <option value="Active">Active</option>
                        <option value="inactive">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium text-gray-700">
                      Connection date
                    </label>
                    <input name="conn_date" class="w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="date" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <input type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" value="Submit">
            <button onclick="toggleModal('add-meter-modal')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
              Cancel
            </button>
          </div>
        </form>
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
      <form action="includes/CRUD.php?action=deleteUserReq" method="post">  
        <input type="number" id="userreq-delete-id" name="userreq-delete-id"/>    
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
          <input type="submit" value="Delete" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm">
          <button onclick="toggleModal('reject-modal')" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("includes/footer.php") ?>