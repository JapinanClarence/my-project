<section class="px-5 my-5 d-flex justify-content-center">
    <form action="../controllers/signup.php" method="post">
        <div class="container border p-3 rounded rounded-lg">
            <div class="form-group mb-2">
                <input type="text" class="form-control" placeholder="Fullname" name="full_name">
            </div>
            <div class="form-group mb-2">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'invalidemail') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Invalid email!</small>";
                    }
                }
                ?>
            </div>

            <div class="form-group mb-2">
                <input type="text" class="form-control" placeholder="Username" name="username">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'usernametaken') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Username already taken!</small>";
                    }
                    if ($_GET['error'] == 'invalidusername') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Invalid username, must contain (a-z, A-Z, 0-9)!</small>";
                    }
                }
                ?>
            </div>
            <div class="form-group mb-2">
                <input type="password" class="form-control" placeholder="Password" name="password">

            </div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinput') {
                    echo "<p><small class='text-danger' style='font-size:.75rem';>Fill in all the fields!</small><p>";
                }
            }
            ?>

            <button class="btn btn-dark  w-100" type="submit" name="submit">
                Sign up
            </button>
        </div>
    </form>
</section>
