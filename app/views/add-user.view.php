<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">

        <h4 class="mb-3">Add User</h4>
        <form METHOD="post" class="form-group">
            <div class="row" >
                <div class="form-group col-sm-3 mb-3">
                    <label for="firstName">Name</label>
                    <input type="text" class="form-control" name="name" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="form-group col-sm-3 mb-3">
                    <label for="userPassword">Password</label>
                    <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid password is required.
                    </div>
                </div>
                <div class="form-group col-sm-3 mb-3">
                    <label for="user">Role</label>
                    <select name="role" class="custom-select d-block w-100" id="role" required>
                        <option value="">Choose...</option>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role->role_id?>"><?= ucfirst($role->role)?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid role.
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="form-group col-sm-3 mb-3">
                    <button name="submit" class="btn btn-primary"  type="submit">Add User</button>
                </div>
            </div>
        </form>
            <div class="row" >
                <div class="col-sm-6">
                    <?php if (($_POST['name'])!= NULL) :?>
                        <?php if(isset($_POST['submit']) and ($message == true)) :?>
                            <div class="alert alert-success" role="alert">
                                <?="You have added ".$_POST['name'] ?>
                            </div>
                        <?php else:?>
                            <div class="alert alert-danger" role="alert">
                                <?="User ".$_POST['name']." already exists" ?>
                            </div>
                        <?php endif; ?>
                    <?php endif;?>
                </div>
            </div>
    </main>

<?php require "partials/footer.php";