<?php 
    include("includes/navbar.php"); 
    include("includes/dbConnection.php"); 
    $con_id = $_SESSION["consumer"];
?>
<form action="includes/CRUD.php?action=updateUser&consumer_id=<?php echo $con_id; ?>" method="post">
    <header class="py-5">
        <div class=" flex justify-between items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold text-white">Profile</h1>
            <input type="submit" class="inline-flex w-full justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm" value="Update">
        </div>
    </header>
    </div>
    <main class="-mt-32">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="">
                    <?php 
                        $quer = "SELECT email, name, phone FROM Users WHERE consumer_id = $con_id";
                        $result = $conn->query($quer);
                        $row = $result->fetch_assoc();
                        $meter = $_SESSION["meter_num"];
                        $q = "SELECT address FROM meterdata WHERE meter_num = $meter";
                        $res1 = $conn->query($q);
                        $r1 = $res1->fetch_assoc();
                        $q = "SELECT COUNT(meter_num) FROM meterdata WHERE consumer_id = $con_id";
                        $res2 = $conn->query($q);
                        $r2 = $res2->fetch_assoc();
                    ?>
                    <dl>
                        <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Name</dt>
                            <span class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"><?php echo $row["name"]; ?></span>
                        </div>
                        <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Phone No</dt>
                            <input type="text" name="consumer-phone" outline="none" value="<?php echo $row["phone"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                        </div>
                        <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <input type="email" name="consumer-email" outline="none" value="<?php echo $row["email"]; ?>" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                        </div>
                        <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Address</dt>
                            <textarea disabled id="" cols="3" rows="3" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 " style="border:none;"><?php echo $r1["address"]; ?></textarea>
                        </div>
                        <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">No Of Connections</dt>
                            <span class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;"><?php echo $r2["COUNT(meter_num)"]; ?></span>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </main>
</form>
<?php include("includes/footer.php"); ?>