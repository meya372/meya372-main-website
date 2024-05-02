<!-- including the head -->
<?php include('partials/head.php') ?>

<title>Meya 372</title>
<link rel="stylesheet" href="css/nav.css">
<link rel="stylesheet" href="css/feedback.css">
</head>

<body>
    <div class="p_container">
        <!-- including the header -->
        <?php include('partials/header.php') ?>

        <div class="feed_page">
            <!-- <div class="container">

                <div class="right_promo_2 feedback_anim">
                    <img src="images/feedback.svg" alt="">
                </div>
                <div id="feed" class="feedback left_promo_2" class="">
                    <form action="scripts/feedback_sc.php" method="POST">
                        <h2>Send Your Feedback</h1>
                            <label for="">Name:</label>
                            <input required type="text" name="c_name" id="c_name">

                            <label for="">Email:</label>
                            <input required type="email" name="c_email" id="c_email">

                            <textarea required placeholder="Message" name="feedback" id="f_back"></textarea>
                            <div class="stars">
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <i class="fa-regular fa-star"></i>
                                <script>
                                    const stars = document.getElementsByClassName('fa-star');

                                    for (let i = 0; i < stars.length; i++) {
                                        stars[i].addEventListener('click', () => {
                                            console.log(i);
                                            for (let j = 0; j <= i; j++) {
                                                stars[j].setAttribute('class', 'fa-star fa-solid')
                                            }
                                            for (let a = i + 1; a < 5; a++) {
                                                stars[a].setAttribute('class', 'fa-star fa-regular')
                                            }
                                        })
                                    }
                                </script>
                            </div>
                            <input class="btn-submit" type="submit" name="submit_feedback" value="Submit">
                    </form>
                </div>

            </div> -->

            <!-- Newly added form look to feedback.css for the styles -->
            <div class="feedback-container">
                <!-- spinning logo -->
                <div class="right_promo_2 feedback_anim">
                    <img src="images/feedback.svg" alt="">
                </div>
                <!-- feedback form -->
                <div class="feedback-form">
                    <h2 class="form-header mb-3 text-4xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">Send Your Feedback</h1>
                        <div class="form-inputs">
                            <label class="" for="c_name">Name</label>
                            <input class="input" required type="text" name="c_name" id="c_name" placeholder="Name">
                        </div>
                        <div class="form-inputs">
                            <label class="" for="c_email">Email</label>
                            <input class="input" required type="email" name="c_email" id="c_email" placeholder="example@example.com">
                        </div>
                        <div class="form-inputs">
                            <label class="" for="feedback">Feedback</label>
                            <textarea class="input" rows="5" required name="feedback" id="f_back" placeholder="Your message here"></textarea>
                        </div>
                        <!-- rating stars -->
                        <div class="stars">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <script>
                                const stars = document.getElementsByClassName('fa-star');

                                for (let i = 0; i < stars.length; i++) {
                                    stars[i].addEventListener('click', () => {
                                        console.log(i);
                                        for (let j = 0; j <= i; j++) {
                                            stars[j].setAttribute('class', 'fa-star fa-solid')
                                        }
                                        for (let a = i + 1; a < 5; a++) {
                                            stars[a].setAttribute('class', 'fa-star fa-regular')
                                        }
                                    })
                                }
                            </script>
                        </div>
                        <!-- submit button -->
                        <input class="btn-submit" type="submit" name="submit_feedback" value="Submit">
                </div>
            </div>
        </div>
    </div>
    <?php include('main_footer.php') ?>
</body>

</html>