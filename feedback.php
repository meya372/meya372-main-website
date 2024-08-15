<?php

if (isset($_POST['submit'])) {
    require './config/conn.php';

    echo $_POST['submit'];

    $name = $_POST['c_name'];
    $email = $_POST['c_email'];
    $feedback = $_POST['feedback'];
    $stars = 0;
    $currentDate = date('Y-m-d H:i:s');

    $sql = "INSERT INTO feedback(u_name, email, feedback, star, created_at) 
        VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);  // Prepare the statement

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $feedback, $stars, $currentDate);

    if (mysqli_stmt_execute($stmt)) {
        echo "Feedback added successfully!";
        header("Location: ./feedback.php?success=feedback-added");
    } else {
        // echo "Error adding product: " . mysqli_error($conn);
        $err = "image type is not allowed!";
        header("Location: ./feedback.php?error=$err");
        header("location: ./feedback.php?error=" . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt); // Close the prepared statement
}

?>


<!-- including the head -->
<?php include('partials/head.php') ?>

<title>Meya 372</title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/feedback.css">
</head>

<body>
<!-- including the header -->
    <?php include('partials/header.php') ?>

    <section class="h-screen my-20 container">
      <section class="grid grid-cols-1 gap-5 p-5 md:grid-cols-2">
       <!-- Customer feedback form -->
        <a target=”_blank” href="https://5xgegm0qu8s.typeform.com/to/PL802IHx" class="flex gap-3 rounded-md bg-purple-700 p-5 shadow-lg">
          <div class="flex size-10 items-center justify-center rounded-full bg-purple-400 text-white">FF</div>
          <div>
            <h3 class="text-lg font-semibold text-white">Feedback Form</h3>
            <p class="text-sm text-purple-100 text-ellipsis">Please fill this form to give us a feedback</p>
          </div>
        </a>

        <!-- Product Survey form -->
        <a target=”_blank” href="https://5xgegm0qu8s.typeform.com/to/vd04db7D" class="flex gap-3 rounded-md bg-zinc-700 p-5 shadow-lg">
          <div class="flex size-10 items-center justify-center rounded-full bg-zinc-400">PS</div>
          <div>
            <h3 class="text-lg font-semibold text-white">Product Order Form</h3>
            <p class="text-sm text-slate-300 text-ellipsis">take this survey to see also order we will contact you within 12 hour</p>
          </div>
        </a>
      </section>
    </section>
   
    <?php include('main_footer.php') ?>
</body>

</html>
