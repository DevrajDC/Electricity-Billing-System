<?php
  if(session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  if (!isset($_SESSION["is_admin"])) {
    header("Location: ../logi[n.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
  <title>Upload File</title>
</head>
<style>
  .custom-file-input::-webkit-file-upload-button {
    /* visibility: hidden; */
    display: none;
  }

  .custom-file-input::before {
    content: "";
    display: none;
    outline: none;
    -webkit-user-select: none;
    cursor: pointer;
    text-shadow: 1px 1px #fff;
    font-weight: 700;
    font-size: 10pt;
    width: 100% !important;
    text-align: center;
  }
</style>

<body>
  <main class="bg-gray-100 h-screen p-6">
    <form class="max-w-xl m-auto mt-24 p-16 bg-white rounded-lg shadow sm:mt-16 lg:mt-24" action="../../DB/admin/insertRecords.php" method="POST" enctype="multipart/form-data">
      <h1 class="font-bold text-center text-3xl mb-6">Oneshield EBS</h1>
      <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 mb-6 bg-gray-50 rounded-lg border-4 border-gray-200 border-dashed cursor-pointer hover:bg-gray-100">
        <div class="flex flex-col justify-center items-center pt-5 pb-6">
          <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
          </svg>
          <p class="mb-2 text-lg text-gray-800">
            <span class="font-bold">Click to upload</span>
          </p>
          <p class="text-xs text-gray-600">Upload CSV file format only.</p>
        </div>
        <!-- accepts only CSV file formats -->
        <div class="select-file">
          <input id="dropzone-file" name="flat_file" type="file" required accept=".csv" class="custom-file-input" />
        </div>
      </label>
      <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
          <svg style="display: none" class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
          </svg>
        </span>
        Load File
      </button>
    </form>
  </main>y
  <!-- Success Toast Starts -->
  <div id="profile1" class="w-fit rounded-md bg-green-50 px-4 py-3 z-100 top-10 absolute left-1/2 transform -translate-x-1/2 hidden" style=" opacity:100; animation-name:changeform; animation-delay:0.1s; animation-duration: 0.3s; animation-timing-function:ease-in-out;animation-fill-mode: forwards;">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-green-800 whitespace-nowrap " id="success_msg">Successfully updated</p>
              </div>
              <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                  <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    <span class="sr-only">Dismiss</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- Success Toast Starts -->

        <!-- Error Toast Starts -->
        <div id="profile2" class="w-fit rounded-md bg-red-50 px-4 py-3 z-100 top-10 absolute left-1/2 transform -translate-x-1/2 hidden" style=" opacity:100; animation-name:changeform; animation-delay:0.1s; animation-duration: 0.3s; animation-timing-function:ease-in-out;animation-fill-mode: forwards;">
            <div class="flex">
              <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 text-red-400">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-red-800 whitespace-nowrap" id="err_msg">Error Occured!</p>
              </div>
              <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                  <button type="button" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-green-50 focus:ring-green-600">
                    <span class="sr-only">Dismiss</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- Error Toast Ends -->
          <script src="../../LOGIC/js/admin_index.js"></script>
          <?php
            if(isset($_SESSION["toast"])) {
              $msg = $_SESSION["toastMessage"];
              if($_SESSION["toast"] == 1) {
                echo "<script>showsuccessbar('profile1', '$msg', 1);</script>";
              } else {
                echo "<script>showsuccessbar('profile2', '$msg', 0);</script>";
              }
              unset($_SESSION["toast"]);
              unset($_SESSION["toastMessage"]);
            }
          ?>
</body>

</html>