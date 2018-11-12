<?php require "app/views/partials/head.php" ?>
<?php require "app/views/partials/nav.php" ?>

<div class="container">
    <div class="row" id="wrapper">
        <h2 style="padding-top: 20px">My Tasks</h2>
        <table class="table table-striped" id="tasks_table">
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Completed</th>
                <?php if($loginUser->isAdmin()) : ?>
                    <th>Edit</th>
                    <th>Delete</th>
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
                <?php if($loginUser->isAdmin()) : ?>
                    <td>
                        <form method="GET" action="/Task/edit/<?= $task->task_id ?>"><button type='submit' name="submit" class='btn btn-outline-primary btn-sm'>Edit</button></form>
                    </td>
                    <td>
                        <form method="GET" action="/Task/delete/<?= $task->task_id ?>"><button type='submit' class='btn btn-outline-danger btn-sm'>Delete</button></form>
                    </td>
                <?php endif;?>
            </tr>
            <?php endforeach;  ?>
        </table>
    </div>
</div>

<?php require "app/views/partials/footer.php" ?>