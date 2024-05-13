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


  .active:hover {
    background-color: rgb(168 85 247);
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  }

  .base:hover {
    background-color: rgb(228 228 231);
    box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
  }
</style>

<!-- Sidebar -->
<section class="flex flex-col gap-3 p-3 sticky top-0">
  <div class="flex flex-col gap-10 items-center justify-between w-full">
    <div class="flex flex-col gap-3 w-full">
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
    </div>
    <div class="flex flex-col gap-3 w-full">
      <a class="base" href="admin_scripts/logout_script.php"><i class="fa-solid fa-right-from-bracket"></i> <span>Log out</span></a>
    </div>

  </div>
</section>