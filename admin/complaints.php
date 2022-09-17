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
  <main class="flex-1">
    <div class="py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 mb-4">
        <h1 class="text-2xl mb-2 font-semibold text-gray-900">
          Complaints
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
                    <?php
                    $quer = "SELECT * FROM complaints ORDER BY complaint_id ASC";
                    $result = $conn->query($quer);
                    while ($row = $result->fetch_assoc()) {
                      $bill_id = $row["bill_no"];
                      $qr = "SELECT meter_num, consumer_id FROM bills WHERE bill_no = $bill_id;";
                      $res = $conn->query($qr);
                      $re = $res->fetch_assoc();
                      $id = $re["consumer_id"];
                      $qr = "SELECT name FROM users WHERE consumer_id = $id;";
                      $res = $conn->query($qr);
                      $r = $res->fetch_assoc();
                    ?>
                      <tr>
                        <form action="includes/CRUD.php?action=updateComplaint&complaint_id=<?php echo $row["complaint_id"]; ?>&bill_num=<?php echo $bill_id; ?>" method="post">
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">
                              <?php echo $row["complaint_id"]; ?>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                              <a href="consumerdetails.php?meter_num=<?php echo $re['meter_num']; ?>&consumer_name=<?php echo $r['name']; ?>&consumer_id=<?php echo $re['consumer_id']; ?>&bill=block"><?php echo $row["bill_no"]; ?></a>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900"><?php echo $r['name']; ?></div>
                          </td>
                          <td class="px-6 py-4 whitespace-wrap text-sm text-gray-500">
                            <div class="text-sm text-gray-900">
                              <?php echo $row["summary"]; ?>
                            </div>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                            <div class="flex justify-center">
                              <div class="mb-3 xl:w-64">
                                <select name="Status" class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                  <?php
                                  if ($row["status"] == "Pending") {
                                  ?>
                                    <option selected value="Pending">Pending</option>
                                    <option value="Resolved">Resolved</option>
                                  <?php
                                  } else {
                                  ?>
                                    <option value="Pending">Pending</option>
                                    <option selected value="Resolved">Resolved</option>
                                  <?php
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
                          </td>
                          <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <input type="submit" class="text-indigo-600 hover:text-indigo-900" value="Update">
                          </td>
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
        <!-- /End replace -->
      </div>
    </div>
  </main>
</div>


<?php include("./includes/footer.php"); ?>