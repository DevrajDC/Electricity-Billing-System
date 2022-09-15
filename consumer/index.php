<?php
session_start();
include("includes/dbConnection.php");
if (isset($_COOKIE["consumer"])) {
    $_SESSION["consumer"] = $_COOKIE["consumer"];
    $consumer = $_SESSION["consumer"];
} elseif (isset($_SESSION["consumer"])) {
    $consumer = $_SESSION["consumer"];
    unset($_SESSION["meter_num"]);
} else {
    header('Location: http://localhost/ebs3/login.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Consumers</title>
</head>

<body>
    <div class="min-h-full">
        <div class="bg-gray-800 pb-32">
            <nav class="bg-gray-800">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="border-b border-gray-700">
                        <div class="flex items-center justify-between h-16 px-4 sm:px-0">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <h3 class="text-lg font-bold text-white">Oneshield EBS</h3>
                                </div>
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                        <a href="index.php" class="bg-gray-900 text-white  px-3 py-2 rounded-md text-sm font-medium flex items-center gap-2" aria-current="page">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                            </svg>
                                            <span>Home</span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-4 flex items-center md:ml-6">
                                    <a href="../login.php?logout=true">
                                        <button type="button" class="text-white bg-gray-700 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium flex gap-2 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                            </svg>
                                            <span>Logout</span>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <header class="py-5">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="text-3xl font-bold text-white">
                        Select Connection to proceed
                    </h1>
                </div>
            </header>
        </div>
        <main class="-mt-32">
            <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                <div class="bg-white rounded-lg shadow px-12 py-12">
                    <div class="flex flex-col border-gray-200 rounded-lg space-y-6">
                        <?php
                        $quer = "SELECT * FROM Meterdata WHERE consumer_id = $consumer";
                        $result = $conn->query($quer);
                        if (mysqli_num_rows($result) == 0) {
                        ?>
                            <!-- Empty State Starts -->
                            <div class="flex justify-center border-solid border-b border-gray-200 pb-4">
                                <img width="300px" src="../assets/no content backup.png" alt="">
                            </div>
                            <!-- Empty State End -->
                            <?php
                        } else {
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <!-- Meter Card Starts -->
                                <div class="flex justify-between border-solid border-b border-gray-200 pb-4 gap-40">
                                    <div class="flex flex-col space-y-4 ">
                                        <div>
                                            <h1 class="text-lg font-bold">Connection ID: <?php echo $row["meter_num"] ?></h1>
                                        </div>
                                        <div class="whitespace-normal"><?php echo $row["address"]; ?></div>
                                        <div class="flex space-x-4">
                                            <div class="space-y-1 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                                                </svg>

                                                <span class="flex-1"><?php echo $row["conn_type"]; ?></span>
                                            </div>
                                            <div class="space-y-1 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                                </svg>
                                                <span class="flex-1"><?php echo $row["phase_id"]; ?></span>
                                            </div>
                                            <div class="space-y-1 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mr-2 flex-shrink-0 h-5 w-5 group-hover:text-indigo-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                </svg>

                                                <span class="flex-1"><?php echo $row["conn_status"]; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="bills.php?meter_num=<?php echo $row["meter_num"]; ?>">
                                        <button type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Proceed
                                        </button>
                                    </a>
                                </div>
                                <!-- Meter Card End -->
                        <?php
                            }
                        }
                        ?>
                        <div class="flex justify-center">
                            <button type="button" onclick="toggleModal('request-meter-modal')" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Request for New Connection
                            </button>
                        </div>

                    </div>
                </div>
                <!-- /End replace -->
            </div>
        </main>
    </div>

    <div class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="request-meter-modal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                    <form action="includes/CRUD.php?action=requestMeter" method="post">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left">
                                <input name="consumer-id" type="text" class="hidden" value="<?php echo $consumer; ?>" id="consumer-id" />
                                <div class="divide-y divide-gray-200">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        New Connection Request
                                    </h3>
                                    <div class="mt-2 pt-6 grid grid-cols-1 gap-y-6 gap-x-4">
                                        <div class="sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">
                                                Connection Address
                                            </label>
                                            <div class="mt-1">
                                                <textarea rows="3" name="meter-address" id="meter-address" class="w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"></textarea>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="first-name" class="block text-sm font-medium text-gray-700">
                                                Region
                                            </label>
                                            <div class="mt-1">
                                                <select name="region" class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                    <option value="North Goa">North Goa</option>
                                                    <option value="South Goa">South Goa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">
                                                Connection Type
                                            </label>
                                            <div class="mt-1">
                                                <select name="conn_type" class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                    <option value="HT-AG">HT-AG </option>
                                                    <option value="HT-AGP">HT-AGP</option>
                                                    <option value="HT-C">HT-C</option>
                                                    <option value="HT-D">HT-D</option>
                                                    <option value="HT-F">HT-F</option>
                                                    <option value="HT-I-A">HT-I-A</option>
                                                    <option value="LT-AGA">LT-AGA</option>
                                                    <option value="LT-AGP">LT-AGP</option>
                                                    <option value="LT-C-A">LT-C-A</option>
                                                    <option value="LT-D-A">LT-D-A</option>
                                                    <option value="LT-I-A">LT-I-A</option>
                                                    <option value="LT-P">LT-P</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="sm:col-span-3">
                                            <label for="country" class="block text-sm font-medium text-gray-700">
                                                Phase Type
                                            </label>
                                            <div class="mt-1">
                                                <select name="phase" class="w-full px-2 py-1.5 text-base font-normal text-gray-700 bg-white border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
                                                    <option value="agr-a">AGR-A</option>
                                                    <option value="agr-b">AGR-B</option>
                                                    <option value="agr-c">AGR-C</option>
                                                    <option value="agr-d">AGR-D</option>
                                                    <option value="com-a-ll">COM-A-LL</option>
                                                    <option value="com-a-ml">COM-A-ML</option>
                                                    <option value="com-b">COM-B</option>
                                                    <option value="dom-a-sp">DOM-A-SP</option>
                                                    <option value="dom-a-tp">DOM-A-TP</option>
                                                    <option value="dom-b">DOM-B</option>
                                                    <option value="dom-c">DOM-C</option>
                                                    <option value="ind-a">IND-A</option>
                                                    <option value="ind-b">IND-B</option>
                                                    <option value="ind-c">IND-C</option>
                                                    <option value="ind-d">IND-D</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                            <input type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" value="Submit">
                            <button onclick="toggleModal('request-meter-modal')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php include("includes/footer.php"); ?>
</body>

</html>