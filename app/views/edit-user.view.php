<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">
        <h4 class="mb-3">Edit User</h4>
        <?php if (($users)!= NULL) :?>
            <form METHOD="post" class="form-inline">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label for="user">Users</label>
                        <select name="user" class="custom-select d-block w-100" id="user" required>
                            <option value="">Choose...</option>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user->user_id?>"><?= $user->user_id.' '.$user->name ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid user.
                        </div>
                    </div>
                    <div class="form-group col-md-6 mb-3" style="padding-top: 25px;">
                        <button name="submit" class="btn btn-primary"  type="submit">Edit User</button>
                    </div>
                </div>
            </form>

            <?php if(isset($_POST['edit-user']) and ($message == true)) :?>
                <div class="alert alert-success" role="alert">
                    <?="Edit Succesful "?>
                </div>
            <?php endif; ?>
        <?php endif;?>

            <?php if(isset($_POST['submit'])) :?>
                <form METHOD="post">
                    <input type="hidden" name="id" id="inputId" value="<?=$user->user_id?>">
                    <input type="text" name="name" id="inputName" value="<?=$user->name?>">
                    <input type="text" name="email" id="inputEmail" value="<?=$user->email?>">
                    <input type="text" name="pass" id="inputPassword" value="<?=$user->password?>">
                    <button name="edit-user" class="btn btn-primary small"  type="submit">Edit User</button>
                </form>
            <?php endif; ?>



    </main>

<?php require "partials/footer.php";