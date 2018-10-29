<?php require "app/views/partials/head.php" ?>
<?php require "app/views/partials/nav.php" ?>

<div class="container">

    <h2 style="padding-top: 20px">Tasks</h2>
    <div id="wrapper">
            <table class="table table-striped" id="tasks_table">
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Assigned</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                                <span class='badge badge-warning'> Assigned </span>
                            <?php else : ?>
                                <span class='badge badge-secondary'> Not Assigned </span>
                            <?php endif ?>
                        </td>
                    <td>
                        <form method="post" action="/Task/edit/<?= $task->task_id ?>"><button type='submit' name="submit" class='btn btn-outline-primary btn-sm'>Edit</button></form>
                    </td>
                    <td>
                        <form method="post" action="/Task/delete/<?= $task->task_id ?>"><button type='submit' class='btn btn-outline-danger btn-sm'>Delete</button></form>
                    </td>
                </tr>
                    <?php endforeach;  ?>
            </table>
    </div>

    <h2 style="padding-top: 20px">Users</h2>
    <div id="wrapper">
            <table class="table table-striped" id="users_table">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Edit</th>
                    <th>Delete</th>
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
                        <td>
                            <?= $user->password; ?>
                        </td>
                        <td>
                            <form method="post" action="/User/edit/<?= $user->user_id ?>"><button type='submit' name="submit" class='btn btn-outline-primary btn-sm'>Edit</button></form>
                        </td>
                        <td>
                            <form method="post" action="/User/delete/<?= $user->user_id ?>"><button type='submit' class='btn btn-outline-danger btn-sm'>Delete</button></form>
                        </td>
                </tr>
                <?php endforeach;  ?>
            </table>
    </div>

        <div class="row justify-content-sm-center">
            <div class="col-sm-auto">
                <form method="POST" id="addtask" action="Task/add">
                    <a class="btn btn-primary" href="javascript:DoPost('addtask')" role="button">Add a Task</a>
                </form>
            </div>
            <div class="col-sm-auto">
                <form method="POST" id="adduser" action="User/add">
                    <a class="btn btn-primary" href="javascript:DoPost('adduser')" role="button">Add a User</a>
                </form>
            </div>
            <div class="col-sm-auto">
                <form method="POST" id="assigntask" action="/assign-task">
                    <a class="btn btn-primary" href="javascript:DoPost('assigntask')" role="button">Assign a User to Task</a>
                </form>
            </div>
        </div>


</div>

<?php require "app/views/partials/footer.php" ?>
