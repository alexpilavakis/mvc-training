<?php require "app/views/partials/head.php" ?>

<div class="container" style="margin-top: 100px; justify-content: center" role="main">
    <center>

    <h1 class="h3 mb-3 font-weight-normal">Training MVC</h1>
    <form class="form-signin" style="max-width: 330px; justify-content: center" method="post" action="/store">
        <label for="inputName" class="sr-only">Username</label>
        <input name="username" id="inputName" class="form-control mb-3" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        <?php
        if(!isset($_POST['submit']) and !empty($username)) :?>
            <div class="alert alert-danger" role="alert">
                <?="Wrong Credentials" ?>
            </div>
        <?php endif; ?>

    </form>
    </center>

</div> <!-- /container -->

<?php require "app/views/partials/footer.php" ?>
