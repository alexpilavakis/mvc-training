<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">
        <h4 class="mb-3">Add Task</h4>
        <form METHOD="post" class="form-group">
            <div class="row">
                <div class="form-group col-sm-3 mb-3">
                    <label for="description">Descritpion</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid description is required.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-3 mb-3">
                    <label for="assigned">Assigned To</label>
                    <select name="assigned" class="custom-select d-block w-100" id="assigned" required>
                        <option value="">Choose...</option>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?= $user->user_id?>"><?= $user->user_id.' '.$user->name ?></option>
                        <?php endforeach;?>
                        <option value="0">Not Assigned</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid user.
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group  col-sm-3 mb-3">
                    <button name="submit" class="btn btn-primary"  type="submit">Add Task</button>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-6">
                <?php if (($_POST['description'])!= NULL) :?>
                    <?php if(isset($_POST['submit']) and ($message == true)) :?>
                        <div class="alert alert-success" role="alert">
                            <?="You have added ".$_POST['description'] ?>
                        </div>
                     <?php else:?>
                        <div class="alert alert-danger" role="alert">
                            <?="Task ".$_POST['description']." already exists" ?>
                        </div>
                    <?php endif; ?>
                <?php endif;?>
            </div>
        </div>
    </main>

<?php require "partials/footer.php";