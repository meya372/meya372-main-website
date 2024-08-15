<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Add Product</title>
<link rel="stylesheet" href="admin_css/style.css">
<link rel="stylesheet" href="admin_css/dashboard.css">

</head>

<div class="dashboard-container h-full">
    <!-- Header -->

    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <?php $page = 'add-product';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'add-product';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Add Products</h2>
                <p class="text-gray-400">Create a new product for the Meya store</p>
                <hr class="my-2">
            </div>

            <!-- Add Products Form -->
            <form action="admin_scripts/sc_add_product.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full md:w-[60%]">
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="p_name">Product Name</label>
                    <input placeholder="Product name" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="p_name" name="p_name" type="text">
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="price">Price in Birr</label>
                    <input placeholder="Birr in ETB" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="price" name="price" type="number">
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="category">Product Catagory:</label>
                    <select class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" name="category" name="category" id="">
                        <option id="aa" value="desktop">Desktop Computer</option>
                        <option value="laptop">Laptop computer</option>
                        <option value="playstation3">Playstation 3</option>
                        <option value="playstation4">Playstation 4</option>
                        <option value="mobile">Mobile Phone</option>
                    </select>
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="discription">Product Description:</label>
                    <textarea rows="10" placeholder="Description" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" required id="disc" name="discription" type="text"></textarea>
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="img">Product Image (png, jpg, jpeg):</label>
                    <input class="bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="file" name="p_img" id="img1">

                    <!-- <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX-12.5MB)</p>
                            </div>
                            <input id="dropzone-file" name="p_img" type="file" class="hidden" />
                        </label>
                    </div> -->
                    <p class="hidden text-red-500">Error message</p>

                </div>
                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="img2">Second Image (png, jpg, jpeg):</label>
                    <input class="bg-white py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="file" name="sec_img" id="img2">
                    <!-- <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX-12.5MB)</p>
                            </div>
                            <input id="dropzone-file" name="sec_img" type="file" class="hidden" />
                        </label>
                    </div> -->
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <!-- <input class="p-3 rounded-lg bg-purple-500 text-white text-lg font-semibold tracking-widest" type="submit" name="submit" value="Upload"> -->
                <div class="flex gap-3">
                    <button class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600" type="submit" name="submit">
                        <svg width="16" height="18" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.66008 0.585197C6.87148 0.470787 7.12852 0.470787 7.33992 0.585197L13.6392 3.99415C13.6445 3.99701 13.6497 3.99994 13.655 4.00295C13.8687 4.12547 14 4.34903 14 4.59064V11.4094C14 11.657 13.8622 11.8852 13.6399 12.0055L7.33992 15.4148C7.12537 15.531 6.86413 15.529 6.65154 15.4101L0.360052 12.0053C0.137823 11.8851 0 11.657 0 11.4093V4.59064C0 4.34903 0.131243 4.12539 0.345009 4.00287L0.35511 4.00275L0.360052 3.99457L6.66008 0.585197ZM7.00007 7.21994L2.14146 4.5906L7 1.9613L11.8586 4.59064L7.00007 7.21994ZM1.4 5.74949V11.0081L6.3 13.6598V8.40122L1.4 5.74949ZM7.7 8.40122V13.6599L12.6 11.0082V5.74949L7.7 8.40122Z" fill="white" />
                        </svg>
                        <span>Add Product</span>
                    </button>
                    <button type="reset" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-transparent text-black text-lg tracking-wide hover:bg-slate-800 hover:text-white border-2 border-slate-800" type="reset" name="submit">
                        Reset form
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>