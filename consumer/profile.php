<?php include("includes/navbar.php"); ?>
<header class="py-5">
    <div class=" flex justify-between items-center max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-white">Profile</h1>
        <button type="button" class="h-fit px-3 py-1.5 border border-transparent text-sm font-medium rounded shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 border-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600 ring-offset-black">
            Update
        </button>
    </div>

</header>
</div>
<main class="-mt-32">
    <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">

        <div class="overflow-hidden bg-white shadow sm:rounded-lg">

            <div class="">
                <dl>
                    <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                        <input type="text" outline="none" value="Devraj" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">

                    </div>
                    <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Phone No</dt>
                        <input type="text" outline="none" value="0123456789" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">

                    </div>
                    <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Email</dt>
                        <input type="email" outline="none" value="pranath@gmail.com" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">

                    </div>
                    <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                        <textarea name="" id="" cols="3" rows="3" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 " style="border:none;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A non voluptatem cumque provident eos neque!</textarea>
                    </div>

                    <div class="bg-white border border-b border-gray-100 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">No Of Connections</dt>
                        <input type="text" outline="none" value="3" class="focus:outline-none focus:ring focus:border-indigo-600 rounded p-1 outline-offset-2 w-auto" style="border:none;">
                    </div>

                </dl>
            </div>
        </div>

    </div>
</main>
<?php include("includes/footer.php"); ?>