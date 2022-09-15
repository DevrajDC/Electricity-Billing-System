<?php 
  include("includes/navbar.php"); 
  include("includes/dbConnection.php");
  $meter = $_SESSION["meter_num"];
?>

<header class="py-5">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-end">
    <h1 class="text-3xl font-bold text-white">Complaints</h1>
    <h1 class="text-lg font-semibold text-white">Connection ID: <span class="text-md text-white px-4 py-1 ml-2 border border-gray-600 rounded"><?php echo $_SESSION["meter_num"]; ?></span></h1>
  </div>
</header>
</div>

<main class="-mt-32">
  <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
    <!-- Replace with your content -->
    <!-- MAIN CONTENT -->
    <main class="flex-1">
      <div class="py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
          <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class=" align-middle inline-block min-w-full ">
                <div class="min-h-[30rem] bg-white shadow overflow-hidden rounded-lg">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                      <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                          Complaint Id
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                          Bill No
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap tracking-wider">
                          status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                          summary
                        </th>
                      </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                      <?php 
                        $quer = "select * from complaints where bill_no in (select bill_no from bills where meter_num = 62000100)";
                        $result = $conn->query($quer);
                        while($row = $result->fetch_assoc()) {
                      ?>
                      <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">
                            <?php echo $row["complaint_id"]; ?>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-sm font-medium text-gray-900">
                            <?php echo $row["bill_no"]; ?>
                          </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php if($row['status']=="Resolved") echo "bg-green-100 text-green-800"; else echo "bg-indigo-100 text-indigo-800" ?>"> <?php echo $row["status"]?> </span>
                        </td>
                        <td class="px-6 py-4 whitespace-wrap text-sm text-gray-500"><?php echo $row["summary"]; ?></td>
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

    <!-- /End replace -->
  </div>
</main>
</div>

<?php include("includes/footer.php"); ?>