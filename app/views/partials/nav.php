<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Training MVC</a>
   <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <script type="text/javascript">
        function DoPost($form) {

            document.getElementById($form).submit()
        }
        </script>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">

            <li class="nav-item active">

                <form method="POST" id="theForm" action="/home">
                    <a class="nav-link" href="javascript:DoPost('theForm')">Home <span class="sr-only">(current)</span></a>
                    <input type="hidden" name="username" id="inputName" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>

            </li>
            <li class="nav-item">

                <form method="POST" id="theForm2" action="/assign-task">
                    <a class="nav-link" href="javascript:DoPost('theForm2')">Assign Task</a>
                    <input type="hidden" name="username" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>

            </li>
            <li class="nav-item">
                <form method="POST" id="theForm3" action="/add-task">
                    <a class="nav-link" href="javascript:DoPost('theForm3')">Add Task</a>
                    <input type="hidden" name="username" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </li>
            <li class="nav-item">
                <form method="POST" id="theForm4" action="/add-user">
                    <a class="nav-link" href="javascript:DoPost('theForm4')">Add User</a>
                    <input type="hidden" name="username" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </li>
            <li class="nav-item">
                <form method="POST" id="edittask" action="/edit-task">
                    <a class="nav-link" href="javascript:DoPost('edittask')">Edit Task</a>
                    <input type="hidden" name="username" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </li>
            <li class="nav-item">
                <form method="POST" id="edituser" action="/edit-user">
                    <a class="nav-link" href="javascript:DoPost('edituser')">Edit User</a>
                    <input type="hidden" name="username" value="<?=$username?>">
                    <input type="hidden" name="password" value="<?=$password?>">
                </form>
            </li>
        </ul>
    </div>

</nav>

