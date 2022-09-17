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
