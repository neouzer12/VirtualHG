<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | VirtualHG</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/simplemde.min.css">
    <link rel="stylesheet" href="./assets/css/vhg.css">
</head>

<body>
    <style>
        body {
            padding-top: 70px;
        }
    </style>
    <?php include_once('./assets/php/layout/01_header.php') ?>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
                <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" id="v-pills-dashboard" data-toggle="pill" href="#dashboard" role="tab" aria-controls="v-pills-dashboard"
                            aria-expanded="true">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="v-pills-category-tab" data-toggle="pill" href="#category" role="tab" aria-controls="v-pills-category"
                            aria-expanded="true">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="v-pills-ts-tab" data-toggle="pill" href="#ts" role="tab" aria-controls="v-pills-ts" aria-expanded="true">Tips & Suggestions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#users" role="tab" aria-controls="v-pills-users" aria-expanded="true">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#settings" role="tab" aria-controls="v-pills-settings"
                            aria-expanded="true">Settings</a>
                    </li>
                </ul>
            </nav>

            <main class="col-sm-9 ml-sm-auto col-md-10 pt-3" role="main">
                <div class="tab-content container" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard">
                        <h1 class="align-left">Dashboard</h1>
                        <hr>
                        <div class="row">
                            <div class="col-lg-3 col-sm-12 pb-3">
                                <div class="card text-white bg-primary">
                                    <div class="card-body">
                                        <h1 class="align-left display-4">-1</h1>
                                        <p class="lead align-left">Tips & Suggestions</p>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1 align-left" href="">View details</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 pb-3">
                                <div class="card text-white bg-secondary">
                                    <div class="card-body">
                                        <h1 class="align-left display-4">-1</h1>
                                        <p class="lead align-left">Category</p>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1 align-left" href="">View details</a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 pb-3">
                                <div class="card text-white bg-success">
                                    <div class="card-body">
                                        <h1 class="align-left display-4">-1</h1>
                                        <p class="lead align-left">Users</p>
                                    </div>
                                    <a class="card-footer text-white clearfix small z-1 align-left" href="">View details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category">
                        <h1 class="text-left">Category</h1>
                    </div>

                    <div class="tab-pane fade" id="ts" role="tabpanel" aria-labelledby="ts">
                        <h1 class="text-left">Tips & Suggestions</h1>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($tips as $tip){
                                    $t_id = $tip['id'];
                                    $t_title = $tip['title'];
                                    $t_cat = $tip['category'];
                                    $t_time = $tip['time'];
                                    echo "<tr><td>$t_id</td><td>$t_title</td><td>$t_cat</td><td>$t_time</td></tr>";
                                }?>
                            </tbody>
                        </table>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tipEditorModal">
                            Add new
                        </button>
                    </div>

                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users">
                        <h1 class="text-left">Users</h1>
                    </div>

                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings">
                        <h3>Advanced Settings</h3>
                        <div class="card col-12" style="max-width: 40rem;">
                            <ul class="list-group list-group-flush">
                                <!-- <li class="list-group-item">
                                    <a class="btn btn-primary" href="/subjects" style="float: right">Manage subjects</a>
                                    <strong>Manage subjects</strong>
                                    <p>This will allow you to manage subjects to serve as basis for the classes.</p>
                                </li>
                                <li class="list-group-item">
                                    <a class="btn btn-primary" href="/teachers" style="float: right">Manage teachers</a>
                                    <strong>Manage teachers</strong>
                                    <p>This will allow you to manage teachers to use this system.</p>
                                </li> -->
                                <li class="list-group-item">
                                    <button class="btn btn-danger" data-toggle="modal" data-target="#changePassword" style="float: right">Change password</button>
                                    <strong>Change password</strong>
                                    <p>This will allow you to change your password.</p>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    

    <!-- Modal -->
    <div class="modal fade" id="tipEditorModal" tabindex="-1" role="dialog" aria-labelledby="tipEditorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tipEditorModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="form">
                        <div class="form-group">
                            <textarea name="" id="tipEditor" cols="30" rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('./assets/php/layout/02_footer.php') ?>
    <script src="./assets/js/simplemde.min.js"></script>
    <script>
        var simplemde = new SimpleMDE({ element: $("#tipEditor")[0] });
    </script>
</body>

</html>