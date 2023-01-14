<section class="px-5 my-5 d-flex justify-content-center">
    <form action="../controllers/login.php" method="post">
        <div class="container border p-3 rounded rounded-lg">
            <div class="form-group mb-2">
                <input type="text" class="form-control" placeholder="Username" name="username">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'usernamefieldrequired') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Username field required!</small>";
                    }
                    if ($_GET['error'] == 'emptyinput') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Username field required!</small>";
                    }
                }

                ?>
            </div>

            <div class="form-group mb-2">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 'passwordfieldrequired') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Password field required!</small>";
                    }
                    if ($_GET['error'] == 'emptyinput') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Password field required!</small>";
                    }
                    if ($_GET['error'] == 'wrongpassword') {
                        echo "<small class='text-danger' style='font-size:.75rem';>Wrong password!</small>";
                    }
                }
                ?>
            </div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'usernotfound') {
                    echo "<p><small class='text-danger' style='font-size:.75rem';>User not found!</small><p>";
                }
            }
            ?>
            <button class="btn btn-dark w-100" type="submit" name="submit">
                Log in
            </button>
            <?php

            ?>
        </div>
    </form>
</section>