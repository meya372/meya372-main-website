<?php require "../config/conn.php"; ?>

<?php

session_start();
include 'admin_scripts/login_check.php';
?>



<section class="flex items-center justify-between px-5 py-2">
  <div class="flex gap-[7rem] items-center">
    <!-- Logo -->
    <div class="flex gap-2 items-center">
      <img class="size-14 object-fit" src="../images/dark_logo.png" alt="">
      <span class="self-center text-2xl font-semibold whitespace-nowrap">Meya 372</span>
    </div>

    <!-- Search input -->
    <div class="w-96">
      <input placeholder="Search...." class="w-full py-2 px-3 rounded-lg border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="name" type="search">
    </div>
  </div>

  <!-- Notification and profile -->
  <div class="flex gap-3 items-center">
    <!-- Notification button -->
    <button class="size-12 flex items-center justify-center rounded-full text-white bg-gray-800 hover:bg-gray-700">
      <svg width="22" height="23" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M7.50009 16.25H10.5001C10.5001 16.6478 10.3421 17.0294 10.0607 17.3107C9.77944 17.592 9.39791 17.75 9.00009 17.75C8.60226 17.75 8.22073 17.592 7.93943 17.3107C7.65812 17.0294 7.50009 16.6478 7.50009 16.25ZM2.30709 14.2872C2.25031 14.1502 2.23547 13.9993 2.26444 13.8538C2.29341 13.7083 2.36489 13.5746 2.46984 13.4697L3.75009 12.1895V8C3.7525 6.73887 4.20841 5.52068 5.03457 4.56784C5.86073 3.615 7.00203 2.99108 8.25009 2.81V2C8.25009 1.80109 8.3291 1.61032 8.46976 1.46967C8.61041 1.32902 8.80118 1.25 9.00009 1.25C9.199 1.25 9.38976 1.32902 9.53042 1.46967C9.67107 1.61032 9.75009 1.80109 9.75009 2V2.81C10.9981 2.99108 12.1394 3.615 12.9656 4.56784C13.7918 5.52068 14.2477 6.73887 14.2501 8V12.1895L15.5303 13.4697C15.6352 13.5746 15.7066 13.7083 15.7355 13.8537C15.7645 13.9992 15.7496 14.15 15.6928 14.287C15.6361 14.424 15.54 14.5411 15.4167 14.6236C15.2934 14.706 15.1484 14.75 15.0001 14.75H3.00009C2.85176 14.75 2.70676 14.7061 2.58341 14.6237C2.46005 14.5414 2.3639 14.4243 2.30709 14.2872ZM4.81059 13.25H13.1896L12.9698 13.0303C12.8292 12.8896 12.7501 12.6989 12.7501 12.5V8C12.7501 7.00544 12.355 6.05161 11.6517 5.34835C10.9485 4.64509 9.99465 4.25 9.00009 4.25C8.00553 4.25 7.0517 4.64509 6.34844 5.34835C5.64517 6.05161 5.25009 7.00544 5.25009 8V12.5C5.25004 12.6989 5.171 12.8896 5.03034 13.0303L4.81059 13.25Z" fill="white" />
      </svg>
    </button>

    <!-- profile image -->
    <button class="size-12 rounded-full text-white bg-gray-800 ring-1 ring-blue-300 ring-offset-2 overflow-hidden">
      <img class="object-fit size-14" src="../images/man.jpg" alt="">
    </button>
  </div>
</section>