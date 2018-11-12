<?php require "app/views/partials/head.php" ?>
<?php require "app/views/partials/nav.php" ?>

<div class="container">
    <div class="row" id="wrapper">
    <h2 style="padding-top: 20px">Tasks</h2>
            <table class="table table-striped" id="tasks_table">
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <?php if($loginUser->isAdmin()) : ?>
                        <th>Assigned To</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    <?php else : ?>
                        <th>Assigned</th>
                    <?php endif; ?>
                </tr>
                <tr>

                    <?php foreach($tasks as $task) : ?>
                        <td>
                            <?= $task->task_id; ?>
                        </td>
                        <td>
                            <?= $task->description; ?>
                        </td>
                        <td>
                            <?php if ($task->completed) :?>
                                    <span class='badge badge-success'> Completed </span>
                            <?php else : ?>
                                    <span class='badge badge-info'> Work in Progress </span>
                            <?php endif ?>
                        </td>
                        <td>
                            <?php if ($task->user_id != 0) :?>
                                <?php if($loginUser->isAdmin()) : ?>
                                    <span class='badge badge-warning'><?= $task->user_id; ?></span>
                                <?php else : ?>
                                    <span class='badge badge-warning'> Assigned </span>
                                <?php endif ?>
                            <?php else : ?>
                                <span class='badge badge-secondary'> Not Assigned </span>
                            <?php endif ?>
                        </td>

                    <?php if($loginUser->isAdmin()) : ?>
                        <td>
                            <form method="POST" action="/Task/edit/<?= $task->task_id ?>"><button type='submit' name="submit" class='btn btn-outline-primary btn-sm'>Edit</button></form>
                        </td>
                        <td>
                            <form method="POST" action="/Task/delete/<?= $task->task_id ?>"><button type='submit' class='btn btn-outline-danger btn-sm'>Delete</button></form>
                        </td>
                    <?php endif;?>
                </tr>
                    <?php endforeach;  ?>
            </table>
    </div>
    <div class="row" id="wrapper">
    <h2 style="padding-top: 20px">Users</h2>
            <table class="table table-striped" id="users_table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <?php if($loginUser->isAdmin()) : ?>
                        <th>Role</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    <?php endif; ?>
                </tr>
                <tr>
                    <?php foreach($users as $user) : ?>
                        <td>
                            <?= $user->user_id; ?>
                        </td>
                        <td>
                            <?= $user->name; ?>
                        </td>
                        <td>
                            <?= $user->email; ?>
                        </td>
                        <?php if($loginUser->isAdmin()) : ?>
                            <td>
                                <?= $user->password; ?>
                            </td>
                            <td>
                                <?php if($user->role_id == 3) :?>
                                    Admin
                                <?php elseif($user->role_id == 2) :?>
                                    Moderator
                                <?php elseif($user->role_id == 1) :?>
                                    User
                                <?php endif;?>
                            </td>
                            <td>
                                <form method="POST" action="/User/edit/<?= $user->user_id ?>"><button type='submit' name="submit" class='btn btn-outline-primary btn-sm'>Edit</button></form>
                            </td>
                            <td>
                                <form method="POST" action="/User/delete/<?= $user->user_id ?>"><button type='submit' class='btn btn-outline-danger btn-sm'>Delete</button></form>
                            </td>
                        <?php else :?>
                            <td>
                                <i>******</i>
                            </td>
                        <?php endif; ?>
                </tr>
                <?php endforeach;  ?>
            </table>
    </div>

        <div class="row justify-content-sm-center">
            <div class="col-sm-auto">
                <form method="GET" id="addtask" action="Task/add">
                    <a class="btn btn-primary" href="javascript:DoPost('addtask')" role="button">Add a Task</a>
                </form>
            </div>
            <div class="col-sm-auto">
                <form method="GET" id="adduser" action="User/add">
                    <a class="btn btn-primary" href="javascript:DoPost('adduser')" role="button">Add a User</a>
                </form>
            </div>
            <div class="col-sm-auto">
                <form method="GET" id="assigntask" action="/assign-task">
                    <a class="btn btn-primary" href="javascript:DoPost('assigntask')" role="button">Assign a User to Task</a>
                </form>
            </div>
        </div>


</div>

<?php require "app/views/partials/footer.php" ?>
