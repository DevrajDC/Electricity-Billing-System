<?php 
  include("../../LOGIC/consumer/includes/navbar.php"); 
  include("../../LOGIC/consumer/consumerinfo.php"); 
    $con_id = $_SESSION["consumer"];
?>
<form action="../../LOGIC/consumer/consumerinfo.php?action=updateUser&consumer_id=<?php echo $con_id; ?>" method="post">
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
                    <?php displayProfile($con_id, $_SESSION["meter_num"]); ?>
                </div>
            </div>
        </div>
    </main>
</form>
<?php include("../../LOGIC/consumer/includes/footer.php"); ?>