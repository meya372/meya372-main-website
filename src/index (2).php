<!-- including the head -->
<?php include('partials/head.php') ?>

<title>Meya 372</title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/animation.css">

</head>

<!-- ========================== PHP Code ================================== -->
<?php
// Start the PHP session
session_start();

// Define a session variable to store a unique identifier
$user_id = session_id();

// Database connection details (replace with your actual details)
$servername = "localhost";
$username = "meya372com372";
$password = "P6xUbliG4cW7tE1";
$dbname = "meya372com_meya372";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// include "./config/conn.php";

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Define table and column names
// Define table and column names
$table = "visit";
$count_column = "visit_count";

// Lock the table row for exclusive access during update (optional)
// mysqli_query($conn, "LOCK TABLE $table IN LOW_PRIORITY MODE"); 

// Select the current visit count
$sql_select = "SELECT $count_column FROM $table LIMIT 1";
$result_select = mysqli_query($conn, $sql_select);

// If a record exists, update the count
if (mysqli_num_rows($result_select) > 0) {
  $row = mysqli_fetch_assoc($result_select);
  $current_count = $row[$count_column];

  $sql_update = "UPDATE $table SET $count_column = $current_count + 1";

  if (mysqli_query($conn, $sql_update)) {
    echo "Visit count updated successfully! Your current visit count is: " . ($current_count + 1);
  } else {
    echo "Error updating visit count: " . mysqli_error($conn);
  }
} else {
  // If record doesn't exist, create it with a count of 1
  $sql_insert = "INSERT INTO $table ($count_column) VALUES (1)";

  if (mysqli_query($conn, $sql_insert)) {
    echo "Visit record created. Visit count is: 1";
  } else {
    echo "Error creating visit record: " . mysqli_error($conn);
  }
}
?>

<!-- ========================== END OF PHP Code ================================== -->

<body>
    <div class="main_container">
        <!-- ========== Navbar section -->
        <?php include('partials/header.php') ?>

        <!-- ================ Hero Section =========================== -->
        <!-- Carousel buttons -->
        <div>
            <span class="prev_next_btns" id="prev"><i class="fa-solid fa-backward"></i></span>
            <span class="prev_next_btns" id="next"><i class="fa-solid fa-forward"></i></span>
        </div>

        <div class="main">
            <!-- ======= Carousel texts -->
            <div id="main_text1" class="main-text font">
                <h1 id="main_h1">Meya 372</h1>
                <p id="main_p">Whether you have a question or need a repair, use our contact form to get in touch.</p>
            </div>

            <div id="main_text2" class="main-text font">
                <h1 id="main_h1">Laptop repair</h1>
                <p id="main_p">ለኮምፒውተርዎ ጥገና ጥያቄዎች በአንድ ቦታ በጥሩ ዋጋ መፍትሄዎችን ያግኙ</p>
            </div>

            <div id="main_text3" class="main-text font">
                <h1 id="main_h1">Desktop repair</h1>
                <p id="main_p">በሁሉም ጥገናዎቻችን ላይ ዋስትና እንሰጣለን ።</p>
            </div>

            <div id="main_text4" class="main-text font">
                <h1 id="main_h1">Playstation repair</h1>
                <p id="main_p">ለኮምፒውተርዎ ጥገና ጥያቄዎች በአንድ ቦታ በጥሩ ዋጋ መፍትሄዎችን ያግኙ</p>
            </div>

            <div id="main_text5" class="main-text font">
                <h1 id="main_h1">Mobile Accessories</h1>
                <p id="main_p">እያንዳንዱን እቃ የራሳችን እንደሆነ አድርገን በጥንቃቄ እንይዛለን</p>
            </div>

            <!-- Carousel Images -->
            <div class="main-img">
                <img id="main_img1" src="images/d.png" alt="">
                <img id="main_img2" src="images/e.png" alt="">
                <img id="main_img3" src="images/d.png" alt="">
                <img id="main_img4" src="images/playstation.png" alt="">
                <img id="main_img5" src="images/mobile.png" alt="">
            </div>
        </div>

        <!-- Carousel Dots -->
        <div class="pagination">
            <span id="active"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- ========== Contact Infomation footer section ================== -->
        <div class="m_footer bg-white p-5 text-black text-lg rounded-md shadow-sm">
            <p>
                <i class="fa-solid fa-location-dot"></i> Dir-Tera, Addis Ababa, Ethiopia
            </p>

            <p>
                <a href="tel:0993820873"><i class="fa-solid fa-phone"> </i>09 93 82 08 73</a>
            </p>

            <p>
                <a href="#"><i class="fa-solid fa-envelope"></i> meya372@gmail.com</a>
            </p>
        </div>

    </div>

    <!-- =============== Product Carousel section ==================== -->
    <div id="scroller">
        <div id="scroll_items">
            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-mob2.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">9500</p>
            </div>
            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-pc1.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">18000</p>
            </div>
            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-pc7.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">15000</p>
            </div>
            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-mob2.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">7000</p>
            </div>
            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-ps1.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">29000</p>
            </div>

            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-pc6.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">30000</p>
            </div>

            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-mb4.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">11000</p>
            </div>

            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-mb3.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">22000</p>
            </div>

            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-ps3.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">14000</p>
            </div>

            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-pc5.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">13500</p>
            </div>

            <div class="scroll_item p-5 bg-white rounded-md shadow-md w-full ">
                <img src="images/sc-pc8.png" alt="">
                <h3>Samsung 75</h3>
                <p class="sc_money">15000</p>
            </div>
        </div>
    </div>

    <!-- ========= Contact us section black background ================ -->
    <div class="main2">
        <h1 class="text-center ">Computer, Playstation and Phone Repair</h1>
        <img id="main2-img1" src="images/sc-mb2.png" alt="">
        <a href="tel:0993820873">Contact us</a>
    </div>

    <!-- ======== Promotion container ============= -->
    <div class="promo_1">
        <h2 class="text-center text-4xl md:text-5xl  font-bold mb-8 bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Our Main Services</h2>
        <div class="container font">
            <div class="prom mb-4 md:shadow-lg md:hover:shadow-sm p-5 rounded-md border-2 border-slate-100">
                <i class="fa-solid fa-screwdriver-wrench"></i>
                <h2 class="text-xl font-bold">ጥራት</h2>
                <p>እያንዳንዱን እቃ የራሳችን እንደሆነ አድርገን በጥንቃቄ እንይዛለን። መሣሪያዎን ለጥገና ሲያስገቡ፣ በጥሩ እጅ ላይ እንዳለ እርግጠኛ መሆን ይችላሉ።</p>
            </div>

            <div class="prom mb-4 md:shadow-lg md:hover:shadow-sm p-5 rounded-md border-2 border-slate-100">
                <i class="fa-solid fa-money-bill-transfer"></i>
                <h2 class="text-xl font-bold">በጥሩ ዋጋ</h2>
                <p>ለኮምፒውተርዎ ጥገና ጥያቄዎች በአንድ ቦታ በጥሩ ዋጋ መፍትሄዎችን ያግኙ</p>
            </div>

            <div class="prom mb-4 md:shadow-lg md:hover:shadow-sm p-5 rounded-md border-2 border-slate-100">
                <i class="fa-solid fa-circle-check"></i>
                <h2 class="text-xl font-bold">ዋስትና</h2>
                <p>አገልግሎታችንን እንደሚወዱ እና በስራችን እንደሚረኩ በጣም እርግጠኞች ነን በሁሉም ጥገናዎቻችን ላይ ዋስትና እንሰጣለን ።</p>
            </div>
        </div>

        <!-- bouncy animated icons -->
        <div id="bubble">
            <i class="fa-solid fa-laptop"></i>
            <i class="fa-solid fa-screwdriver-wrench"></i>
            <i class="fa-regular fa-lightbulb"></i>
            <i class="fa-solid fa-computer"></i>
            <i class="fa-solid fa-plug"></i>
        </div>
    </div>

    <!-- ================ the new footer component section ================ -->
    <?php include('main_footer.php') ?>


    <!-- =============== Additional scripts ================================ -->
    <script src="script.js">
    </script>
</body>

</html>