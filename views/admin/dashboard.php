<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Panel | VirtualHG</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/simplemde.min.css">
    <link rel="stylesheet" href="./assets/css/font-awesome.min.css">
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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category){
                                    $c_id = $category['id'];
                                    $c_name = $category['category'];
                                    echo "<tr onclick=\"launchEditCatModal($c_id, `$c_name`)\">";
                                    echo "<td>$c_id</td>";
                                    echo "<td>$c_name</td>";
                                    echo "</tr>";
                                }?>
                            </tbody>
                        </table>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" id="addCatBtn">
                            Add new
                        </button>
                    </div>

                    <div class="tab-pane fade" id="ts" role="tabpanel" aria-labelledby="ts">
                        <h1 class="text-left">Tips & Suggestions</h1>

                        <table class="table table-hover">
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
                                    $t_content = $tip['content'];
                                    echo "<tr onclick=\"launchEditTipModal($t_id, `$t_title`, `$t_content`, `$t_cat`)\">";
                                    echo "<td>$t_id</td>";
                                    echo "<td>$t_title</td>";
                                    echo "<td>$t_cat</td>";
                                    echo "<td>$t_time</td>";
                                    echo "</tr>";
                                }?>
                            </tbody>
                        </table>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" id="addTipBtn">
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
    <div class="modal" id="tipEditorModal" tabindex="-1" role="dialog" aria-labelledby="tipEditorModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tipEditorModalLabel">Tip Editor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form">
                        <input type="hidden" id="t_id" value="-1">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="tm_title">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <input type="text" class="form-control" id="tm_cat" disabled>
                        </div>
                        <div class="form-group">
                            <textarea name="" id="tipEditor" cols="30" rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveTips">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <?php include_once('./assets/php/layout/02_footer.php') ?>
    <script src="./assets/js/simplemde.min.js"></script>
    <script>
        var simplemde = null;
        
        simplemde = new SimpleMDE({
            autoDownloadFontAwesome: false,
            element: $("#tipEditor")[0],
            placeholder: "Type here...",
            hideIcons: ["side-by-side", "fullscreen", "image", ],
        });

        $( "#addTipBtn" ).click(function() {
            simplemde.value("");
            simplemde.toTextArea();
            simplemde = null;

            simplemde = new SimpleMDE({
                autoDownloadFontAwesome: false,
                element: $("#tipEditor")[0],
                placeholder: "Type here...",
                hideIcons: ["side-by-side", "fullscreen", "image", ],
            });
            $("#t_id").val("-1");
            $("#tm_title").val("");
            $("#tm_cat").val("");
            
            
            $("#tipEditorModal").modal('show');
            $("#tm_title").focus();
        });

        $("#saveTips").click(function() {
            var tip_id = $("#t_id").val();
            var tip_title = $("#tm_title").val();
            var tip_cat = 1; //Placeholder for now.
            var tip_content = simplemde.value();
            
            //console.log(tip_id + ", " + tip_title + ", " + tip_cat + ", " + tip_content);

            $.post("logic/Data/tips.php", {
                tip_id,
                tip_title,
                tip_cat,
                tip_content
            }, function(data){
                var response = jQuery.parseJSON(data);
                if (response.status == 0){
                    alert("Successfully saved!");
                    window.location.href = "dashboard"
                }else{
                    alert(response.message);
                }
            });
        })

        function launchEditTipModal(id, title, content, cat){
            simplemde.value("");
            simplemde.toTextArea();
            simplemde = null;

            simplemde = new SimpleMDE({
                autoDownloadFontAwesome: false,
                element: $("#tipEditor")[0],
                initialValue: content,
                placeholder: "Type here...",
                hideIcons: ["side-by-side", "fullscreen", "image", ],
            });
            $("#t_id").val(id);
            $("#tm_title").val(title);
            $("#tm_cat").val(cat);
            
            // simplemde.value(content);
            $("#tipEditorModal").modal('show');
            $("#tm_title").focus();
        }
        
    </script>
</body>

</html>