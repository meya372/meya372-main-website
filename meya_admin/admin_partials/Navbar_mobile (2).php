<style>
  .base {
    padding: 1rem;
    width: 100%;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    background-color: transparent;
    color: rgb(107 114 128);
    border-radius: 0.375rem;
  }

  .active {
    color: white;
    background-color: rgb(168 85 247);
  }

  .inactive {
    background-color: transparent;
    color: rgb(107 114 128);
  }

  .active:hover {
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  }

  .base:hover {
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  }
</style>



<nav class="bg-white border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 shadow-lg">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="../images/dark_logo.png" class="h-12" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap">Meya 372</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
      </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <div class="font-medium flex flex-col md:p-0 mt-4 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
        <a class="base <?php if ($page == 'dashboard') {
                          echo 'active';
                        } ?>" href="dashboard.php"><i class="fa-solid fa-gauge-high"></i> <span>Dashboard</span></a>
        <a class="base <?php if ($page == 'add-product') {
                          echo 'active';
                        } ?>" href="add_products.php"><i class="fa-solid fa-cart-plus"></i> <span>Add Product</span></a>
        <a class="base <?php if ($page == 'add-service') {
                          echo 'active';
                        } ?>" href="add_services.php"><i class="fa-solid fa-cart-plus"></i> <span>Add Service</span></a>
        <a class="base <?php if ($page == 'add-blog') {
                          echo 'active';
                        } ?>" href="add_tutorials.php"><i class="fa-regular fa-newspaper"></i> <span>Add blog</span></a>
        <a class="base <?php if ($page == 'add-admin') {
                          echo 'active';
                        } ?>" href="add_admin.php"><i class="fa-solid fa-user-plus"></i> <span>Add Admin</span></a>
        <a class="base <?php if ($page == 'edit-service') {
                          echo 'active';
                        } ?>" href="edit_services.php"><i class="fa-regular fa-pen-to-square"></i> <span>Edit Service</span></a>
        <a class="base <?php if ($page == 'edit-product') {
                          echo 'active';
                        } ?>" href="edit_products.php"><i class="fa-regular fa-pen-to-square"></i> <span>Edit Product</span></a>
        <a class="base <?php if ($page == 'edit-blog') {
                          echo 'active';
                        } ?>" href="edit_blog.php"><i class="fa-regular fa-pen-to-square"></i> <span>Edit Blog</span></a>
        <a class="base <?php if ($page == 'feedback') {
                          echo 'active';
                        } ?>" href="feedbacks.php"><i class="fa-solid fa-comment-dots"></i> <span>Feedbacks</span></span></a>
        <a class="base" href="admin_scripts/logout_script.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Log out</span></a>
      </div>
    </div>
  </div>
</nav>