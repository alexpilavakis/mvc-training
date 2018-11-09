<?php require "partials/head.php" ?>

<?php require "partials/nav.php" ?>


    <main class="container" style="padding-top: 50px">
        <h4 class="mb-3">Edit Task</h4>
        <?php if (($tasks)!= NULL) :?>
            <form METHOD="post" class="form-group">
                <div class="row">
                    <div class="form-group col-sm-3 mb-3">
                        <label for="task">Tasks</label>
                        <select name="task" class="custom-select d-block w-100" id="task" required>
                            <option value="">Choose...</option>
                            <?php foreach ($tasks as $task) : ?>
                                <option value="<?= $task->task_id?>"><?= $task->task_id.' '.$task->description ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid Task.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-3 mb-3">
                        <button name="submit" class="btn btn-primary"  type="submit">Edit Task</button>
                    </div>
                </div>
            </form>

            <?php if(isset($_POST['edit-task']) and ($message == true)) :?>
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
                <form METHOD="post">
                    <div class="row">
                        <div class="form-group col-sm-3 mb-3">
                            <label for="inputDescription">Description</label>
                            <input type="hidden" name="id" id="inputId" value="<?=$task->task_id?>">
                            <input type="text" name="description" id="inputDescription" value="<?=$task->description?>">
                        </div>
                        <div class="form-group col-sm-3 mb-3">
                            <label for="inputCompleted">Completed</label>
                            <?php if ($task->completed == 1): ?>
                                <select name="completed" id="inputState" class="form-control">
                                    <option value="1" selected>Completed</option>
                                    <option value="0">Work in Progress</option>
                                </select>
                            <?php else:?>
                                <select name="completed" id="inputCompleted" class="form-control">
                                    <option value="0" selected>Work in Progress</option>
                                    <option value="1">Completed</option>
                                </select>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-sm-3 mb-3">
                            <label for="assigned">Assigned</label>
                            <select name="assigned" class="custom-select d-block w-100" id="assigned" required>
                                <option value="">Choose...</option>
                                <?php foreach ($users as $user) : ?>
                                    <?php if($user->user_id == $task->user_id) :?>
                                        <option value="<?= $user->user_id?>" selected><?= $user->user_id.' '.$user->name ?></option>
                                    <?php else:?>
                                        <option value="<?= $user->user_id?>"><?= $user->user_id.' '.$user->name ?></option>
                                    <?php endif ?>
                                <?php endforeach;?>
                                <option value=''>Not Assigned</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid user.
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-3 mb-3">
                            <button name="edit-task" class="btn btn-primary"  type="submit">Edit Task</button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>

    </main>

<?php require "partials/footer.php";