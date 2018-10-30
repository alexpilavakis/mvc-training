<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">

        <h4 class="mb-3">Add User</h4>
        <form METHOD="post">
            <div class="row" class="form-inline">
                <div class="form-group col-md-3 mb-3">
                    <label for="firstName">Name</label>
                    <input type="text" class="form-control" name="name" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3">
                    <label for="userPassword">Password</label>
                    <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid password is required.
                    </div>
                </div>
                <div class="form-group col-md-3 mb-3" style="padding-top: 25px;">
                    <button name="submit" class="btn btn-primary"  type="submit">Add User</button>
                </div>
            </div>




            <?php
            if (($_POST['name'])!= NULL) :?>
                <?php if(isset($_POST['submit']) and ($message == true)) :?>
                    <div class="alert alert-success" role="alert">
                        <?="You have added ".$_POST['name'] ?>
                    </div>
                <?php else:?>
                    <div class="alert alert-danger" role="alert">
                        <?="User ".$_POST['description']." already exists" ?>
                    </div>
                <?php endif; ?>
            <?php endif;?>
        </form>
    </main>

<?php require "partials/footer.php";