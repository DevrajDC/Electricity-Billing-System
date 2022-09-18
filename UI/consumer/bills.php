<?php
include("../../LOGIC/consumer/includes/navbar.php");
include("../../LOGIC/consumer/consumerinfo.php");
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
                                            <?php displayBills(); ?>
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
                <form action="../../LOGIC/consumer/consumerinfo.php?action=registerComplaint" method="post" onsubmit="return validateComplaint();">
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
                                    <small class="text-red-400"></small>
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    $('body').on('click', '.pay_now', function(e) {
        var totalAmount = $(this).attr("data-amount");
        var billNum = $(this).attr("bill-num");
        console.log(totalAmount);
        console.log(billNum);
        var options = {
            "key": "rzp_test_EApKQs2V7zlaHT",
            "amount": totalAmount * 100,
            "name": "EBS",
            "description": "Payment",
            "callback_url": "../../LOGIC/consumer/payment-process.php",
            "handler": function(response) {
                $.ajax({
                    url: '../../LOGIC/consumer/payment-process.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        totalAmount: totalAmount,
                        billNum: billNum
                    },
                    success: function(msg) {
                        window.location.href = '../../LOGIC/consumer/success.php';
                    },
                    fail: function(msg) {
                        window.location.href = '../../LOGIC/consumer/failure.php';
                    }
                });
            },

            "theme": {
                "color": "#528FF0"
            }
        };
        var rzp2 = new Razorpay(options);
        rzp2.open();
        e.preventDefault();
    });
</script>

<?php include("../../LOGIC/consumer/includes/footer.php"); ?>