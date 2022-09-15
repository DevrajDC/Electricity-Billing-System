<?php   
  include("includes/navbar.php"); 
  include("includes/dbConnection.php"); 
  if(isset($_SESSION["meter_num"])) {
    $meter = $_SESSION["meter_num"];
  } else {
    $_SESSION["meter_num"] = $_GET["meter_num"];
    $meter = $_SESSION["meter_num"];  
  }
  $con = $_SESSION["consumer"];
?>

<header class="py-5">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-end">
    <h1 class="text-3xl font-bold text-white">Bills</h1>
    <h1 class="text-lg font-semibold text-white">Connection ID: <span class="text-md text-white px-4 py-1 ml-2 border border-gray-600 rounded"><?php echo $meter; ?></span></h1>
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
                            <div class="align-middle inline-block min-w-full">
                                <div class="min-h-[30rem] bg-white rounded-lg shadow overflow-hidden sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Bill No
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap tracking-wider">
                                                    Charges
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Issued On
                                                </th>
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Due Date
                                                </th> 
                                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <?php
                                                $quer = "SELECT * FROM Bills WHERE meter_num = $meter ORDER BY bill_no DESC";
                                                $result = $conn->query($quer);
                                                while($row = $result->fetch_assoc()) {
                                                    $bill_no = $row["bill_no"];
                                            ?>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <?php echo $row["bill_no"]; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                    ₹ <?php echo $row["charges"]; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php if($row['stage']=="Paid") echo "bg-green-100"; else if($row['stage']=="Unpaid") echo "bg-red-100"; else echo "bg-indigo-100" ?>">  <?php echo $row["stage"]?> </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">
                                                        <?php echo $row["bill_date"]; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-red-600">
                                                        <?php echo $row["due_date"]; ?>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                                    <?php if($row['stage']=='Paid' || $row['stage']=="Pending") { ?>
                                                        <button type="button" onclick="toggleModal('add-meter-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-gray-400 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 cursor-not-allowed mr-2" disabled>
                                                            <svg xmlns=http://www.w3.org/2000/svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                                <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM9 7.5A.75.75 0 009 9h1.5c.98 0 1.813.626 2.122 1.5H9A.75.75 0 009 12h3.622a2.251 2.251 0 01-2.122 1.5H9a.75.75 0 00-.53 1.28l3 3a.75.75 0 101.06-1.06L10.8 14.988A3.752 3.752 0 0014.175 12H15a.75.75 0 000-1.5h-.825A3.733 3.733 0 0013.5 9H15a.75.75 0 000-1.5H9z" clip-rule="evenodd" />
                                                            </svg>
                                                            PayBill
                                                        </button>
                                                    <?php } else { ?>
                                                        <form class="inline-flex">
                                                            <form>
                                                                <script src=https://checkout.razorpay.com/v1/payment-button.js data-payment_button_id="pl_KExdYhPA2lZpYk" data-prefill.amount.cash="<?php echo $row["charges"]; ?>"> </script>
                                                            </form>
                                                            </script>
                                                        </form>
                                                    <?php 
                                                        } 
                                                        $qc = "SELECT COUNT(complaint_id) FROM complaints WHERE bill_no = $bill_no AND status = 'Pending'";
                                                        $res = $conn->query($qc);
                                                        $r = $res->fetch_assoc();
                                                        if($r["COUNT(complaint_id)"]) { 
                                                    ?>
                                                        <button type="button" onclick="toggleModal('complaint-model')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-gray-400 hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 cursor-not-allowed" disabled>
                                                            <svg xmlns=http://www.w3.org/2000/svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                                <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                                                            </svg> Raise Complaint
                                                        </button>
                                                    <?php } else { ?>
                                                        <button type="button" onclick="complaintForm('<?php echo $row['bill_no']; ?>', '<?php echo $meter; ?>'); toggleModal('complaint-modal'); populate" class="inline-flex items-center ml-3 px-2.5 py-2 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                            <svg xmlns=http://www.w3.org/2000/svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                                <path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd" />
                                                            </svg>
                                                            Raise Complaint
                                                        </button>
                                                    <?php } ?>
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

        <!-- /End replace -->
    </div>
</main>
</div>
<!-- complaint model -->
<div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="complaint-modal">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <form class="space-y-8 divide-y divide-gray-200" action="includes/CRUD.php?action=registerComplaint" method="post">
                    <input name="bill_num" type="text" class="hidden" value="" id="bill_num" />
                    <input name="meter_num" type="text" class="hidden" value="" id="meter_num" />
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                <div class="space-y-8 divide-y divide-gray-200">
                                    <div>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
                                            Add Complaint
                                        </h3>
                                        <textarea id="summary" name="summary" rows="3" style="width: 100%" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-300 rounded-md p-2"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <input type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" value="Submit">
                        <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="toggleModal('complaint-modal')">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>