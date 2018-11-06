<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Training MVC</a>
    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>

     </button> -->
    <span class="navbar-toggle">

        <strong><?php echo $member->getName(); ?></strong>
        <small><i  style="color: #FFFFFF;">(<?php echo ucfirst($member->getRole()); ?>)</i></small>

    </span>
    <script type="text/javascript">
        function DoPost($form) {

            document.getElementById($form).submit()
        }
    </script>

    <div class="collapse navbar-collapse justify-content-end navbar-fixed-top" id="navbarSupportedContent">
        <ul class="navbar-nav">

            <li class="nav-item active">

                <form method="GET" id="theForm" action="/store">
                    <a class="nav-link" href="javascript:DoPost('theForm')">Home <span class="sr-only">(current)</span></a>
                </form>

            </li>
            <li class="nav-item">
                <form method="GET" id="about" action="/about">
                    <a class="nav-link" href="javascript:DoPost('about')">About</a>
                </form>
            </li>
            <li class="nav-item">

                <form method="POST" id="theForm2" action="/assign-task">
                    <a class="nav-link" href="javascript:DoPost('theForm2')">Assign Task</a>
                </form>

            </li>
            <?php if($member->isAdmin()) : ?>
                <li class="nav-item">
                    <form method="POST" id="theForm3" action="/Task/add">
                        <a class="nav-link" href="javascript:DoPost('theForm3')">Add Task</a>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST" id="theForm4" action="/User/add">
                        <a class="nav-link" href="javascript:DoPost('theForm4')">Add User</a>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST" id="edittask" action="/Task/edit">
                        <a class="nav-link" href="javascript:DoPost('edittask')">Edit Task</a>
                    </form>
                </li>
                <li class="nav-item">
                    <form method="POST" id="edituser" action="/User/edit">
                        <a class="nav-link" href="javascript:DoPost('edituser')">Edit User</a>
                    </form>
                </li>
            <?php endif;?>
            <li class="nav-item">
                <form method="GET" id="logout" action="/logout">
                    <a class="nav-link" href="javascript:DoPost('logout')">Logout</a>
                </form>
            </li>
        </ul>
    </div>

</nav>

