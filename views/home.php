<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home!</title>

    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/vhg.css">
</head>
<body>
    <?php include_once('./assets/php/layout/01_header.php') ?>
    <style>
        .navbar {
            -webkit-transition: all 0.6s ease-out;
            -moz-transition: all 0.6s ease-out;
            -o-transition: all 0.6s ease-out;
            -ms-transition: all 0.6s ease-out;
            transition: all 0.6s ease-out;
        }
    </style>
    <main>
        <div class="jumbotron welcome-jumbotron">
            <div class="container">
                <h1>Virtual HG</h1>
                <p>An online virtual health guide.</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>BMI</h4>
                            </div>
                            <div class="card-text">
                                <p>Calculate your Body Mass Index!</p>
                                <p>
                                    <button class="btn btn-primary">Check it out!</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Charts</h4>
                            </div>
                            <div class="card-text">
                                <p>About Body Mass Index!</p>
                                <p>
                                    <button class="btn btn-primary">Check it out!</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>Tips and Suggestions</h4>
                            </div>
                            <div class="card-text">
                                <p>Achieve the healthy way by following these tips based on your profile.</p>
                                <p>
                                    <button class="btn btn-primary">Check it out!</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include_once('./assets/php/layout/02_footer.php') ?>
    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form group">
                            <label for="">Username</label>
                            <input id="usr" type="text" class="form-control">
                        </div>
                        <div class="form group">
                            <label for="">Password</label>
                            <input id="pwd" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnLogin" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
        /**
        * Listen to scroll to change header opacity class
        */
        function checkScroll() {
            var startY = $('.navbar').height() * 2; //The point where the navbar changes in px

            if ($(window).scrollTop() > startY) {
                $('.navbar').addClass("bg-dark navbar-dark");
                $('.navbar').removeClass("navbar-light");
            } else {
                $('.navbar').removeClass("bg-dark navbar-dark");
                $('.navbar').addClass("navbar-light");
            }
        }

        if ($('.navbar').length > 0) {
            $(window).on("scroll load resize", function () {
                checkScroll();
            });
        }
    </script>
    <script>
        $('#btnLogin').click(function (){
            var usr = $("#usr").val();
            var pwd = $("#pwd").val();
            console.log("usr = " + usr + ", pwd = " + pwd);
            $.post("Auth/login", {
                usr, pwd
            }, function(data){
                var response = jQuery.parseJSON(data);
                console.log(data);
            })
        });
    </script>
</body>
</html>