<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

    <title>Add Blog</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="admin_css/dashboard.css">
</head>


<div class="dashboard-container ">
    <!-- Header -->

    <div class="nav">
        <!-- including the header -->
        <div class="hidden md:block">
            <?php include 'admin_partials/Navbar_Desktop.php' ?>
        </div>
        <div class="md:hidden">
            <?php $page = 'add-blog';
            include 'admin_partials/Navbar_mobile.php' ?>
        </div>
    </div>
    <!-- Bottom container -->
    <div class="bottom-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <?php $page = 'add-blog';
            include 'admin_partials/sidebar.php' ?>
        </div>
        <!-- Main Sidebar -->
        <div class="dashboard">
            <!-- Header -->
            <div class="flex flex-col items-start">
                <h2 class="text-3xl font-bold">Add Blog</h2>
                <p class="text-gray-400">Create a new Blog post for the Meya store</p>
                <hr class="my-2">
            </div>

            <!-- Add Products Form -->
            <form action="admin_scripts/sc_add_tutorial.php" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full md:w-[60%]">
                <div class="flex flex-col">
                    <label class="text-lg font-semibold" for="name">Blog Title</label>.
                    <input id="name" required name="title" placeholder="Blog title" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="text">
                    <p class="hidden text-red-500">Error message</p>
                </div>

                <div class="flex flex-col gap-3">
                    <label class="text-lg font-semibold" for="discription"> Tutorial Article:</label>
                    <textarea id="discription" required name="article" rows="10" placeholder="Blog Article" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" type="text"></textarea>
                    <p class="hidden text-red-500">Error message</p>
                </div>
                <div class="flex gap-3">
                    <button type="submit" name="submit" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-purple-500 text-white text-lg tracking-wide hover:bg-purple-600">
                        <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.7612 6.9956C11.7445 7.33896 11.4881 7.76289 11.0748 8.17033V13.5394C11.0744 13.6777 11.0208 13.7949 10.9302 13.8864C10.8391 13.9762 10.721 14.0293 10.5822 14.0302H1.96854C1.83064 14.0293 1.7121 13.9762 1.62107 13.8864C1.53047 13.7949 1.47732 13.6777 1.47685 13.5394V4.9593C1.47732 4.82151 1.53047 4.70384 1.62107 4.61228C1.7121 4.52254 1.83064 4.46944 1.96854 4.46854H6.54332C6.91332 3.97502 7.34461 3.46961 7.83315 3.00633C7.8354 3.00357 7.83722 3.00082 7.83947 2.99809H1.96854C1.42773 2.99762 0.930653 3.21875 0.576863 3.57218C0.221285 3.92562 -0.000460771 4.42005 7.18931e-07 4.95933V13.5394C-0.000460771 14.0787 0.221285 14.5741 0.576863 14.9266C0.930624 15.28 1.42773 15.5006 1.96854 15.5006H10.5823C11.124 15.5006 11.6211 15.28 11.9749 14.9265C12.3295 14.574 12.5517 14.0787 12.5513 13.5394V6.46089C12.5513 6.46089 12.5476 6.45632 12.5418 6.45172C12.3178 6.64676 12.0569 6.83261 11.7612 6.9956Z" fill="white" />
                            <path d="M13.9816 0.49939C13.9816 0.49939 13.5291 1.18611 10.5736 2.20194C7.55992 3.23796 5.70493 7.45249 5.70493 7.45249C5.25833 8.31591 3.49301 11.9032 3.49301 11.9032C3.00675 12.8298 3.89771 13.3774 4.42049 12.4205C5.42233 10.5838 6.06905 8.90553 7.59234 8.85792C9.81462 8.78833 11.3343 6.81705 10.8561 6.90861C10.227 7.18695 8.83981 6.92968 9.65687 6.80149C11.6182 6.64172 12.8269 5.14424 12.433 5.04263C11.7376 5.31455 11.0891 5.05637 10.962 4.97852C14.4237 4.55092 13.9816 0.49939 13.9816 0.49939Z" fill="white" />
                        </svg>
                        <span>Add Blog</span>
                    </button>
                    <button type="reset" class="w-max flex gap-3 items-center px-5 py-3 rounded-lg bg-transparent text-black text-lg tracking-wide hover:bg-slate-800 hover:text-white border-2 border-slate-800" type="reset" name="submit">
                        Reset form
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>