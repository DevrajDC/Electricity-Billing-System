<?php 
  include("includes/navbar.php"); 
  include("includes/dbConnection.php");
  $id = $_GET["meter_num"];
  $qd = "SELECT conn_status FROM Meterdata WHERE meter_num = '$id'";
  $res = $conn->query($qd);
  $r = $res->fetch_assoc();
  $enb = $r["conn_status"] == 'Inactive' ? 'block' : 'none';
  $disb = $r["conn_status"] == 'Inactive' ? 'none' : 'block';
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
  <main class="flex-1">
    <div class="py-6">
      <div class="flex justify-between max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mb-4">
        <h1 class="text-2xl mb-2 font-semibold text-gray-900">
          <?php echo $_GET["consumer_name"]; ?>
        </h1>
      </div>
      <!-- Playcard Start -->
      <div class="max-w-7xl mx-auto  sm:px-6 md:px-8">
        <div class="flex flex-col">
          <div class="py-2 bg-white align-middle inline-block min-w-full sm:px-6 lg:px-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <div class="relative pt-5 border-b border-gray-200 sm:pb-0">
              <div class="md:flex md:items-center md:justify-between">
                <h3 class="text-lg leading-6 font-medium text-gray-900 ">Meter: <?php echo $_GET["meter_num"]; ?></h3>
                <button style="display: <?php echo $disb; ?>;" type="button" onclick="meterToggleForm('<?php echo $_GET['meter_num']; ?>', '<?php echo $_GET['consumer_name']; ?>', '<?php echo $_GET['consumer_id']; ?>', '<?php echo $r['conn_status']; ?>', 'Disable', 'Are you sure you want to Disable this Account?'); toggleModal('Delete-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent rounded shadow-sm text-xs font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Disable</button>
                <button style="display: <?php echo $enb; ?>;" type="button" onclick="meterToggleForm('<?php echo $_GET['meter_num']; ?>', '<?php echo $_GET['consumer_name']; ?>', '<?php echo $_GET['consumer_id']; ?>', '<?php echo $r['conn_status']; ?>' ,'Enable', 'Are you sure you want to Enable this Account?'); toggleModal('Delete-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent rounded shadow-sm text-xs font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Enable</button>
                <div class="mt-3 flex md:mt-0 md:absolute md:top-3 md:right-0">
                </div>
              </div>
              <div class="mt-4">
                <!-- Tabs at small breakpoint and up -->
                <div class="hidden sm:block">
                  <nav class="-mb-px flex">
                  <?php 
                    $id = $_GET["consumer_id"];
                    $meter_id = $_GET["meter_num"];
                    $consumer_name = $_GET["consumer_name"];
                    $qd = "SELECT email, phone FROM Users WHERE consumer_id = $id";
                    $res = $conn->query($qd);
                    $r = $res->fetch_assoc();
                    $set = $_GET['bill'];
                    $phone = $r["phone"];
                    $email = $r["email"];
                    echo "<script>alert($phone);alert($email);</script>";

                    $n = $set =='block' ? 'none' : 'block';
                    $tabd = $set =='block' ? 'menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm' : 'menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm';
                    $tabb = $set =='block' ? 'menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm' : 'menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm';
                    $diaplyText1 = $set =='block' ? 'Bill Information' : 'Applicant Information';
                    $diaplyText2 = $set =='block' ? 'Bill details and information.' : 'Personal details and application.';
                  ?>
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300" -->
                    <a id="m1" href="#details" class="<?php echo $tabd; ?>" onclick="changeslide('p1','p2','p3'),navcolor('m1','m2','m3','menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm','menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm'),changename('Consumer Information','b1','b2','b3')">
                      Details </a>

                    <a id="m2" href="#connection" class="menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm" onclick="changeslide('p2','p1','p3'),navcolor('m2','m1','m3','menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm','menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm'),changename('Meter Information','b2','b1','b3')">
                      Connection </a>

                    <a id="m3" href="#bill" class="<?php echo $tabb; ?>" aria-current="page" onclick="changeslide('p3','p1','p2',),navcolor('m3','m2','m1','menu3 bg-indigo-100 border-indigo-500 text-indigo-600 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm',' menu2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap pt-2 pb-2 px-4 border-b-2 font-medium text-sm'),changename('Bill Information','b3','b1','b1')">
                      Bill </a>
                  </nav>
                </div>
              </div>
            </div>
            <div>
              <!-- Details Tab -->
              <div id="p1" class="mt-5 border-b border-gray-200" style="display: <?php echo $n; ?>;">
                <form action="includes/CRUD.php?action=updateUser&meter_num=<?php echo $meter_id; ?>&consumer_name=<?php echo $consumer_name; ?>&consumer_id=<?php echo $id; ?>" method="post">
                  <div class="w-full flex justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="hh1">Consumer Information</h3>
                    <input id="b1" type="submit" value="Update" class="inline-flex items-center px-2.5 py-1.5 border border-transparent rounded shadow-sm text-xs font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  </div>
                  <dl class="divide-y divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Full Name</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="consumer-name" type="text" outline="none" value="<?php echo $_GET["consumer_name"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Phone</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="consumer-phone" type="number" outline="none" value="<?php echo $r["phone"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Email Address</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="consumer-email" type="text" outline="none" value="<?php echo $r["email"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    </li>
                    </ul>
                    </dd>
                  </dl>
                </form>
              </div>
              </dl>
              <!-- Connection Tab -->
              <?php 
                $qd = "SELECT * FROM meterdata WHERE meter_num = $meter_id";
                $res = $conn->query($qd);
                $r = $res->fetch_assoc();
              ?>
              <div id="p2" class="mt-5 border-b border-gray-200" style="display: none;">
                <form action="includes/CRUD.php?action=updateMeter&meter_num=<?php echo $meter_id; ?>&consumer_name=<?php echo $consumer_name; ?>&consumer_id=<?php echo $id; ?>" method="post">
                  <div class="w-full flex justify-between">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="hh1">Connection Details</h3>
                    <input id="b1" type="submit" value="Update" class="inline-flex items-center px-2.5 py-1.5 border border-transparent rounded shadow-sm text-xs font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  </div>
                  <!--details-->
                  <dl class="divide-y divide-gray-200">
                    <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Consumer ID</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="consumer-id" type="number" outline="none" value="<?php echo $r['consumer_id']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Connection Type</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="conn_type" type="text" outline="none" value="<?php echo $r['conn_type']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Address</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="address" type="text" outline="none" value="<?php echo $r['address']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Region</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="region" type="text" outline="none" value="<?php echo $r['region']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Phase</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="phase_id" type="text" outline="none" value="<?php echo $r['phase_id']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Connection Status</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="conn_status" type="text" outline="none" value="<?php echo $r['conn_status']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;"></span>
                      </dd>
                    </div>
                    <div class="py-4 sm:grid sm:py-5 sm:grid-cols-3 sm:gap-4">
                      <dt class="text-sm font-medium text-gray-500">Connection Date</dt>
                      <dd class="mt-1 flex text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="flex-grow"><input name="conn_date" type="date" outline="none" value="<?php echo $r['conn_date']; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-64" style="border:none;">
                        </span>
                      </dd>
                    </div>
                  </dl>
                </form>
              </div>
              <br>
              <!-- Bills Tab -->
              <div id="p3" style="display: <?php echo $set; ?>;">
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
                              <?php 
                                $meter_id = $_GET["meter_num"];
                                $qd = "SELECT * FROM bills WHERE meter_num = $meter_id";
                                $res = $conn->query($qd);
                                while($r = $res->fetch_assoc()) {
                                $btn = ($r["stage"] == "Paid") ? 'disabled' : '';
                              ?>
                              <tr>
                                <form action="includes/CRUD.php?action=updateBill&meter_num=<?php echo $meter_id; ?>&consumer_name=<?php echo $consumer_name; ?>&consumer_id=<?php echo $id; ?>&bill_num=<?php echo $r["bill_no"]; ?>" method="post">
                                  <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <?php echo $r["bill_no"]; ?>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="text" outline="none" name="bill_date" value="<?php echo $r["bill_date"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="number" outline="none" name="current_read" value="<?php echo $r["current_reading"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">₹<input type="number" outline="none" name="charges" value="<?php echo $r["charges"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"></td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <select name="Status" class="px-2 py-1.5 bg-white border border-solid border-gray-300 rounded">
                                    <?php
                                      if($r["stage"] == "Pending") { 
                                      ?>
                                      <option selected value="Pending">Pending</option>
                                      <option value="Unpaid">Unpaid</option>
                                      <option value="Paid">Paid</option>
                                      <?php
                                        } elseif($r["stage"] == "Paid") {
                                      ?>
                                      <option value="Pending">Pending</option>
                                      <option value="Unpaid">Unpaid</option>
                                      <option selected value="Paid">Paid</option>
                                      <?php  
                                        } else {
                                      ?>
                                      <option value="Pending">Pending</option>
                                      <option selected value="Unpaid">Unpaid</option>
                                      <option value="Paid">Paid</option>
                                      <?php
                                        }
                                      ?>
                                    </select>
                                  </td>
                                  <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><input type="submit" <?php echo $btn; ?> value="Update" class="h-fit px-2.5 py-1.5  text-xs font-medium rounded  text-indigo-600  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"></td>
                                </form>
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
      <form action="includes/CRUD.php?action=toggleMeter" method="post">  
        <input type="number" hidden id="meter-num" name="meter-num"/>    
        <input type="text" hidden id="consumer-name" name="consumer-name"/>    
        <input type="number" hidden id="consumer-id" name="consumer-id"/>    
        <input type="text" hidden id="conn-status" name="conn-status"/>     
        <div class="sm:flex sm:items-start">
          <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
            <!-- Heroicon name: outline/exclamation -->
            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
          <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title"></h3>
            <div class="mt-2">
              <p class="text-sm text-gray-500" id="modal-message"></p>
            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-4 sm:ml-10 sm:pl-4 sm:flex">
          <input type="submit" value="Disable" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:w-auto sm:text-sm">
          <button onclick="toggleModal('Delete-modal')" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("includes/footer.php"); ?>