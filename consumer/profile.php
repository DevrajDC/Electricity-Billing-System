<?php include("includes/navbar.php"); ?>
<header class="py-5">
    <div class=" flex justify-between max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Profile</h1>
        <button type="button" onclick="toggleModal('add-meter-modal')" class="h-fit px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update
        </button>
    </div>

</header>
</div>
<main class="-mt-32">
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">

            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <input type="text" outline="none" value="Devraj" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">

                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Phone No</dt>
                        <input type="text" outline="none" value="12321321321" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">

                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <input type="email" outline="none" value="pranath@gmail.com" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">

                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                        <input type="text" outline="none" value="fdlas ldksajflas assdlfkjadsf lksdjf" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">No Of Connections</dt>
                        <input type="text" outline="none" value="21" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                    </div>

                </dl>
            </div>
        </div>

    </div>
</main>
<?php include("includes/footer.php"); ?>