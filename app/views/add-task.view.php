<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">

            <h4 class="mb-3">Add Task</h4>
            <form METHOD="post" class="form-inline">
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label for="description">Descritpion</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Valid description is required.
                        </div>
                    </div>

                    <div class="form-group col-md-4 mb-3">
                        <label for="assigned">Assigned</label>
                        <select name="assigned" class="custom-select d-block w-100" id="assigned" required>
                            <option value="">Choose...</option>
                            <?php foreach ($users as $user) : ?>
                                <option><?= $user->id.' '.$user->name ?></option>
                            <?php endforeach;?>
                                <option value="0">Not Assigned</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid user.
                        </div>
                    </div>
                    <div class="form-group  col-md-4 mb-3" style="padding-top: 25px;">
                        <button name="submit" class="btn btn-primary"  type="submit">Add Task</button>
                        <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                        <input type="hidden" name="password" value="<?=$password?>">
                    </div>
                </div>



                <?php
                if (($_POST['description'])!= NULL) :?>
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
            </form>
    </main>

<?php require "partials/footer.php";