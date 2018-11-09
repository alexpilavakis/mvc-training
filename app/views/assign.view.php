<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">
        <h4 class="mb-3">Assign Task</h4>

            <form METHOD="post" class="form-group">
                <div class="row">
                    <div class="form-group col-sm-3 mb-3">
                        <label for="task">Available Tasks</label>
                        <select name="task" class="custom-select d-block w-100" id="task" required>
                            <option value="">Choose...</option>
                            <?php foreach ($tasks as $task) : ?>
                                <option value="<?= $task->description ?>"><?= $task->description ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid task.
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="form-group col-sm-3 mb-3">
                            <label for="user">Users</label>
                            <select name="user" class="custom-select d-block w-100" id="task" required>
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
                            <button name="submit" class="btn btn-primary"  type="submit">Assign</button>
                        </div>
                    </div>
            </form>
            <div class="row">
                <div class="col-sm-6">
                <?php if(isset($_POST['submit'])) :?>
                    <div class="alert alert-success" role="alert">
                        <?="You have assigned ".$_POST['task']." to User with Id: ".$_POST['user']; ?>
                    </div>
                <?php endif; ?>
                </div>
            </div>

    </main>

<?php require "partials/footer.php";
