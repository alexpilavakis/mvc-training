<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">
        <h4 class="mb-3">Edit User</h4>
        <?php if (($users)!= NULL) :?>
            <form METHOD="post" class="form-group">
                <div class="row">
                    <div class="form-group col-sm-3 mb-3">
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
                </div>
                <div class="row">
                    <div class="form-group col-sm-3 mb-3">
                        <button name="submit" class="btn btn-primary"  type="submit">Edit User</button>
                    </div>
                </div>
            </form>

            <?php if(isset($_POST['edit-user']) and ($message == true)) :?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="alert alert-success" role="alert">
                            <?="Edit Succesful "?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif;?>

            <?php if(isset($_POST['submit'])) :?>
                <form METHOD="post" class="form-group">
                    <div class="row">
                        <div class="form-group col-sm-3 mb-3">
                            <label for="inputName">Name</label>
                            <input type="text" name="name" id="inputName" value="<?=$user->name?>">
                        </div>
                        <div class="form-group col-sm-3 mb-3">
                            <label for="inputEmail">Email</label><br>
                            <input type="text" name="email" id="inputEmail" value="<?=$user->email?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3 mb-3">
                            <label for="inputPassword">Password</label>
                            <input type="text" name="pass" id="inputPassword" value="<?=$user->password?>">
                        </div>
                        <div class="form-group col-sm-3 mb-3">
                            <label for="user">Role</label>
                            <select name="role" class="custom-select d-block w-100" id="role" required>
                                <option value="">Choose...</option>
                                <?php foreach ($roles as $role) : ?>
                                    <?php if($role->role_id == $user->role) :?>
                                        <option value="<?= $role->role_id?>" selected><?= ucfirst($role->role)?></option>
                                    <?php else:?>
                                        <option value="<?= $role->role_id?>"><?= ucfirst($role->role)?></option>
                                    <?php endif ?>
                                <?php endforeach;?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid role.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3 mb-3">
                            <button name="edit-user" class="btn btn-primary small"  type="submit">Edit User</button>
                        </div>
                    </div>
                    <input type="hidden" name="id" id="inputId" value="<?=$user->user_id?>">
                </form>
            <?php endif; ?>



    </main>

<?php require "partials/footer.php";