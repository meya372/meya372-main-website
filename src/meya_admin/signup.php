
<!-- including the head -->
<?php include 'admin_partials/head.php' ?>

<title>Signup</title>
<link rel="stylesheet" href="../css/form.css">

<body class="bg-white">
    <section class="h-screen grid content-center">
        <div class="grid grid-cols-1 h-full md:border-2 md:border-slate-300 md:grid-cols-2 md:m-10 lg:w-[52rem] lg:mx-auto overflow-hidden md:rounded-xl shadow-lg">
            <!-- Left -->
            <div class="flex flex-col gap-10 w-full p-8 items-center justify-center">
                <div class="space-y-3 w-full md:text-center">
                    <h2 class="text-4xl font-bold">Meya 372 Signup</h2>
                    <hr class="bg-slate-100 w-full" />
                </div>
                <form action="admin_scripts/first_signup_script.php" method="post" class="flex flex-col gap-5 w-full">
                    <div class="flex flex-col gap-2">
                        <label for="u_name">Phone Number</label>
                        <input id="u_name" type="text" name="u_name" placeholder="Phone number" class="px-3 py-2 border-2 border-slate-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2" />
                        <p class="h-4 text-red-500 hidden">Add a valid phone number</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="pwd">Password</label>
                        <input id="pwd" type="password" name="password" placeholder="*********" class="px-3 py-2 border-2 border-slate-300 rounded-lg outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2" />
                        <p class="h-4 text-red-500 hidden">Password doesn’t match</p>
                    </div>
                    <div class="flex flex-col">
                        <label class="text-lg font-semibold" for="confirm_pwd">Comfirm Password</label>
                        <input placeholder="********" class="py-2 px-3 rounded-md border-2 border-gray-300 outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2" id="confirm_pwd" type="password" name="confirm_pwd" placeholder="*********">
                        <p class="hidden text-red-500">Error message</p>
                    </div>

                    <input type="submit" value="Sign Up" name="signup-submit" class="cursor-pointer bg-purple-500 text-white tracking-wide font-bold py-2 rounded-md shadow-lg">
                </form>
                <p class="text-center">
                    <a class="text-purple-500 hover:text-purple-700" href="index.php">Sign in</a>

                    if you have account
                </p>
            </div>
            <!-- Right -->
            <div class="right relative bg-purple-500 text-white right w-full md:p-5">
                <div class="w-full p-8 md:absolute md:bottom-0 md:left-0 md:p-5 flex flex-col gap-3 bg-gradient-to-t from-slate-800 via-gray-800 to-slate-50/0">
                    <h1 class="text-3xl font-bold">Meya 372</h1>
                    <p class="">
                        And most important, have the courage to follow your heart and
                        intuition.
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>