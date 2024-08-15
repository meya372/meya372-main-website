<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Edit Services</title>
<!-- <link rel="stylesheet" href="admin_css/style.css"> -->
<!-- <link rel="stylesheet" href="admin_css/add_service.css"> -->
<link rel="stylesheet" href="admin_css/edit_table.css">
</head>


<?php
// Below is optional, remove if you have already connected to your database.
$mysqli = mysqli_connect('localhost', 'root', '', 'meya372com_meya372');

// Get the total number of records from our table "students".
$total_pages = $mysqli->query('SELECT * FROM services')->num_rows;

// Check if the page number is specified and check if it's a number, if not return the default page number which is 1.
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

// Number of results to show on each page.
$num_results_on_page = 5;


if ($stmt = $mysqli->prepare('SELECT * FROM services ORDER BY id LIMIT ?,?')) {
  // Calculate the page to get the results we need from our table.
  $calc_page = ($page - 1) * $num_results_on_page;
  $stmt->bind_param('ii', $calc_page, $num_results_on_page);
  $stmt->execute();
  // Get the results...
  $result = $stmt->get_result();
?>


  <body>
    <div class="limiter">
      <div class="container-table100">
        <div class="wrap-table100">
          <div class="table100">
            <table>
              <thead>
                <tr class="table100-head">
                  <th class="column1">ID</th>
                  <th class="column2">Product Name</th>
                  <th class="column3">Product Description</th>
                  <th class="column4">Service Image</th>
                  <th class="column5"></th>
                </tr>
              </thead>
              <tbody>
                <!-- Table rows -->
                <?php while ($row = $result->fetch_assoc()) : ?>
                  <tr class="text-center">
                    <td><?php echo $row['id']; ?></td>
                    <td class="flex gap-2 items-center">
                      <div class="size-10 bg-slate-400 rounded-full p-2"></div>
                      <?php echo $row['s_name'] ?>
                    </td>
                    <td class="text-clip overflow-hidden"><?php echo $row['discription'] ?></td>
                    <td><img src="./services/IMG-634e0715809383.66697883.png" alt=""></td>
                    <td class="flex gap-2 p-2">
                      <button class="btn btn-edit"><svg stroke="white" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.1895 4.03336L8.43204 10.7908C7.75912 11.4637 5.7616 11.7754 5.31535 11.3292C4.8691 10.8829 5.17368 8.88541 5.8466 8.2125L12.6112 1.44793C12.778 1.26593 12.98 1.11963 13.2049 1.01784C13.4298 0.916053 13.6731 0.860874 13.9199 0.855675C14.1667 0.850483 14.4121 0.895348 14.6411 0.987581C14.8701 1.07981 15.078 1.21751 15.2524 1.39233C15.4267 1.56715 15.5638 1.77547 15.6554 2.00473C15.747 2.23399 15.7913 2.47943 15.7854 2.72625C15.7795 2.97307 15.7236 3.21616 15.6213 3.44081C15.5188 3.66546 15.372 3.86704 15.1895 4.03336Z" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          <path d="M7.90793 2.33333H4.36626C3.61481 2.33333 2.89419 2.63183 2.36283 3.16319C1.83148 3.69455 1.53293 4.41521 1.53293 5.16666V12.25C1.53293 13.0015 1.83148 13.7221 2.36283 14.2534C2.89419 14.7848 3.61481 15.0833 4.36626 15.0833H12.1579C13.7233 15.0833 14.2829 13.8083 14.2829 12.25V8.70833" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span>edit</span></button>
                      <button class="btn btn-delete">delete</button>
                    </td>
                  </tr>
                <?php endwhile; ?>
              </tbody>
            </table>

            <div class="mt-5">
              <!-- Pagination code -->
              <?php if (ceil($total_pages / $num_results_on_page) > 0) : ?>
                <ul class="pagination">
                  <?php if ($page > 1) : ?>
                    <li class="prev"><a href="edit_Products.php?page=<?php echo $page - 1 ?>">Prev</a></li>
                  <?php endif; ?>

                  <?php if ($page > 3) : ?>
                    <li class="start"><a href="edit_Products.php?page=1">1</a></li>
                    <li class="dots">...</li>
                  <?php endif; ?>

                  <?php if ($page - 2 > 0) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page - 2 ?>"><?php echo $page - 2 ?></a></li><?php endif; ?>
                  <?php if ($page - 1 > 0) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page - 1 ?>"><?php echo $page - 1 ?></a></li><?php endif; ?>

                  <li class="currentpage"><a href="edit_Products.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>

                  <?php if ($page + 1 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page + 1 ?>"><?php echo $page + 1 ?></a></li><?php endif; ?>
                  <?php if ($page + 2 < ceil($total_pages / $num_results_on_page) + 1) : ?><li class="page"><a href="edit_Products.php?page=<?php echo $page + 2 ?>"><?php echo $page + 2 ?></a></li><?php endif; ?>

                  <?php if ($page < ceil($total_pages / $num_results_on_page) - 2) : ?>
                    <li class="dots">...</li>
                    <li class="end"><a href="edit_Products.php?page=<?php echo ceil($total_pages / $num_results_on_page) ?>"><?php echo ceil($total_pages / $num_results_on_page) ?></a></li>
                  <?php endif; ?>

                  <?php if ($page < ceil($total_pages / $num_results_on_page)) : ?>
                    <li class="next"><a href="edit_Products.php?page=<?php echo $page + 1 ?>">Next</a></li>
                  <?php endif; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>



  </body>

<?php
  $stmt->close();
}
?>