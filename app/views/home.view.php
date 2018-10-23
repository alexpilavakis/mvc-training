<?php require "partials/head.php" ?>
<script type="text/javascript" src="app/js/table-view.js"></script>
<?php require "partials/nav.php" ?>

<main class="container" style="padding-top: 50px">
    <h2 style="padding-top: 20px">Tasks</h2>
    <div id="wrapper">
        <form METHOD="post">
            <table class="table" id="tasks_table">
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
                        <script>add_tasks("<?= $task->id?>","<?= $task->description?>", "<?= $task->completed?>","<?= $task->assigned?>")</script>
                    <?php endforeach; ?>
                    <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </tr>
            </table>
        </form>
    </div>

    <h2 style="padding-top: 20px">Users</h2>
    <div id="wrapper">
        <form METHOD="post">
            <table class="table" id="users_table">
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
                        <script>add_users("<?= $user->id?>","<?= $user->name?>", "<?= $user->email?>","<?= $user->password?>")</script>
                    <?php endforeach; ?>
                    <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </tr>
            </table>
        </form>
    </div>

    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-sm-auto">
                <form method="POST" id="addtask" action="/add-task">
                    <a class="btn btn-primary" href="javascript:DoPost('addtask')" role="button">Add a Task</a>
                    <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </div>
            <div class="col-sm-auto">
                <form method="POST" id="adduser" action="/add-user">
                    <a class="btn btn-primary" href="javascript:DoPost('adduser')" role="button">Add a User</a>
                    <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </div>
            <div class="col-sm-auto">
                <form method="POST" id="assigntask" action="/assign-task">
                    <a class="btn btn-primary" href="javascript:DoPost('assigntask')" role="button">Assign a User to Task</a>
                    <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </div>
        </div>
    </div>

    <?php if(($message === 'edit') ) :?>
       <?php
       // (var_dump('Dame'));
       // die(var_dump($user)); ?>
        <form METHOD="post" id="edituser1" action="/edit-user">
            <input type="hidden" name="id" id="inputId" value="<?=$user->id?>">
            <input type="hidden" name="name" id="inputName" value="<?=$user->name?>">
            <input type="hidden" name="email" id="inputEmail" value="<?=$user->email?>">
            <input type="hidden" name="pass" id="inputPassword" value="<?=$user->password?>">
            <input type="hidden" name="username" id="inputName" value="<?=$username?>">
            <input type="hidden" name="password" value="<?=$password?>">
            <input type="hidden" name="message" value="<?=$message?>">
        </form>
        <script type="text/javascript">DoPost('edituser1');</script>

    <?php endif;?>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <?= "* ".$user->name." * ?" ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Yes, delete</button>
                </div>
            </div>
        </div>
    </div>

</main>
<?php require "partials/footer.php" ?>
