<?php 
  include("includes/navbar.php"); 
  include("includes/dbConnection.php");   
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
          Connections
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
                        Email
                      </th>
                      <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Number of connections
                      </th>
                    </tr>
                  </thead>
                  <tbody class="bg-white divide-y divide-gray-200">
                    <?php
                      $quer = "SELECT * FROM Users";
                      $result = $conn->query($quer);
                      while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?php echo $row["consumer_id"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <?php echo $row["name"]; ?>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <?php echo $row["email"]; ?>
                      </td>
                      <td class="px-6 py-4 flex gap-12 whitespace-nowrap text-left">
                        <?php
                          $id = $row["consumer_id"];
                          $qr = "SELECT meter_num FROM meterdata WHERE consumer_id = $id";
                          $res = $conn->query($qr);
                          $num_meters = mysqli_num_rows($res);
                          $i = 1;
                          while($r = $res->fetch_assoc()) {  
                        ?>  
                        <a href="consumerdetails.php?meter_num=<?php echo $r["meter_num"]; ?>&consumer_name=<?php echo $row["name"]; ?>&consumer_id=<?php echo $row["consumer_id"]; ?>&bill=none" class="text-indigo-600 text-sm font-bold">
                          Meter <?php echo $i; ?>
                        </a>
                        <?php
                            $i++;
                          }
                        ?>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
                  
              </div>
            </div>
  </main>
</div>
</div>
<?php include('./includes/footer.php'); ?>