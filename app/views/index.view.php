<?php require "app/views/partials/head.php" ?>
    <center>
    <main class="container" style="padding-top: 50px">

            <h1 class="h3 mb-3 font-weight-normal">Training MVC</h1>
            <form class="form-signin" style="max-width: 330px; justify-content: center" method="post" action="/home">
                <label for="inputName" class="sr-only">Username</label>
                <input name="username" id="inputName" class="form-control" placeholder="Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

                <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                <?php
                if(!isset($_POST['submit']) and !empty($username)) :?>
                    <div class="alert alert-danger" role="alert">
                        <?="Wrong Credentials" ?>
                    </div>
                <?php endif; ?>

            </form>

    </main>
    </center>
<?php require "app/views/partials/footer.php" ?>