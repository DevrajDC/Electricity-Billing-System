<?php include("includes/navbar.php"); ?>
<header class="py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Profile</h1>
    </div>
</header>
</div>
<main class="-mt-32">
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

        <!-- Right Side -->
        <div class="w-full mx-2 h-64">
            <!-- Profile tab -->
            <div class="bg-white p-3 shadow-sm rounded-sm">

                <div class="text-gray-700">
                    <div class="grid md:grid-cols-2 text-sm">
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">User name</div>
                            <div class="px-4 py-2">Jane Doe</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Email.</div>
                            <div class="px-4 py-2">
                                <a class="text-blue-800" href="mailto:jane@example.com">jane@example.com</a>
                            </div>
                        </div>

                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold">Phone No.</div>
                            <div class="px-4 py-2">+11 998001001</div>
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="px-4 py-2 font-semibold"> Address</div>
                            <div class="px-4 py-2">Beech Creek, PA, Pennsylvania</div>
                        </div>
                    </div>
                </div>
                <button class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                    Edit Profile</button>
            </div>
            <!-- End of about section -->

            <div class="my-4"></div>


            <!-- End of profile tab -->
        </div>

    </div>
</main>
<?php include("includes/footer.php"); ?>