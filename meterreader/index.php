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
    <form class="max-w-xl m-auto mt-24 p-16 bg-white rounded-lg shadow sm:mt-16 lg:mt-24" action="insertRecords.php" method="POST" enctype="multipart/form-data">
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
          <input id="dropzone-file" type="file" required accept=".csv" class="custom-file-input" />
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
  </main>
</body>

</html>