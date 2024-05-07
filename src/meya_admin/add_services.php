<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Add Service</title>
<link rel="stylesheet" href="admin_css/style.css">
<!-- <link rel="stylesheet" href="admin_css/add_service.css"> -->
<link rel="stylesheet" href="admin_css/dashboard.css">
</head>

<!-- <div class="add_service">
    <form action="admin_scripts/sc_add_service.php" method="POST" enctype="multipart/form-data">
        <label for="name">Service Name</label>
        <input id="name" required name="s_name" type="text">

        <label for="disc">Service Discription:</label>
        <input id="disc" required name="discription" type="text">

        <label for="img">Service Image (png, jpg, jpeg):</label>
        <input type="file" required name="s_img" id="img">

        <input type="submit" name="submit" value="UPLOAD">
    </form>
</div> -->

<div class="dashboard-container ">
    <!-- Header -->

    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <?php $page = 'add-service';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'add-service';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Add Services</h2>
                <p class="text-gray-400">Create a new Service for the Meya store</p>
                <hr class="my-2">
            </div>

            <!-- Add Products Form -->
            <form action="admin_scripts/sc_add_service.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full md:w-[60%]">
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="name">Service Name</label>
                    <input placeholder="Service name" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="name" required name="s_name" type="text">
                    <p class="hidden text-red-500">Error message</p>
                </div>

                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="disc">Service Description</label>
                    <textarea rows="10" placeholder="Description" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="disc" name="discription" type="text"></textarea>
                    <p class="hidden text-red-500">Error message</p>
                </div>

                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="img">Service Image (png, jpg, jpeg):</label>
                    <!-- <input class="bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="file" required name="s_img" id="img"> -->

                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX-12.5MB)</p>
                            </div>
                            <input required name="s_img" id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>
                    <p class="hidden text-red-500">Error message</p>
                </div>

                <!-- <input class="p-3 rounded-lg bg-purple-500 text-white text-lg font-semibold tracking-widest" type="submit" name="submit" value="Upload"> -->
                <div class="flex gap-3">
                    <button type="submit" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600" type="submit" name="submit">
                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.83333 0.49939C4.23148 0.49939 2.91667 1.90843 2.91667 3.62401C2.91667 4.54959 3.29985 5.3855 3.90387 5.95951C1.62348 6.86417 0 9.32229 0 12.1672C1.46689e-05 12.3882 0.0819888 12.6001 0.227892 12.7564C0.373796 12.9126 0.57168 13.0004 0.778021 13.0004H4.52056C4.67354 12.3949 4.9185 11.8316 5.24139 11.3341H1.61761C1.9617 8.99359 3.7306 7.25444 5.83333 7.25444C6.12475 7.25444 6.4094 7.28896 6.68509 7.35274C6.77977 6.33471 7.45336 5.49047 8.34463 5.20476C8.60177 4.74006 8.75 4.1994 8.75 3.62401C8.75 1.90843 7.43518 0.49939 5.83333 0.49939ZM5.83333 2.16569C6.59377 2.16569 7.19396 2.80845 7.19396 3.62401C7.19396 4.43957 6.59377 5.08243 5.83333 5.08243C5.0729 5.08243 4.47266 4.43957 4.47266 3.62401C4.47266 2.80845 5.0729 2.16569 5.83333 2.16569Z" fill="white" />
                            <path d="M9.33341 5.4998C8.05193 5.4998 7.00008 6.62705 7.00008 7.99952C7.00008 8.73998 7.30662 9.4087 7.78983 9.8679C5.96552 10.5916 4.66675 12.5581 4.66675 14.8341C4.66676 15.0109 4.73234 15.1804 4.84906 15.3054C4.96578 15.4304 5.12408 15.5006 5.28915 15.5006H9.33341H13.3776C13.5427 15.5006 13.701 15.4304 13.8178 15.3054C13.9345 15.1804 14.0001 15.0109 14.0001 14.8341C14.0001 12.5581 12.7013 10.5916 10.877 9.8679C11.3602 9.4087 11.6667 8.73998 11.6667 7.99952C11.6667 6.62705 10.6149 5.4998 9.33341 5.4998ZM9.33341 6.83285C9.94176 6.83285 10.4219 7.34707 10.4219 7.99952C10.4219 8.65197 9.94176 9.16625 9.33341 9.16625C8.72507 9.16625 8.24489 8.65197 8.24489 7.99952C8.24489 7.34707 8.72507 6.83285 9.33341 6.83285ZM9.33341 10.9038C11.0156 10.9038 12.4307 12.2951 12.706 14.1676H9.33341H5.96084C6.23611 12.2951 7.65123 10.9038 9.33341 10.9038Z" fill="white" />
                        </svg>
                        <span>Add Service</span>
                    </button>
                    <button type="reset" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-transparent text-black text-lg tracking-wide hover:bg-slate-800 hover:text-white border-2 border-slate-800" type="reset" name="submit">
                        Reset form
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- <?php include 'admin_partials/footer.php' ?> -->