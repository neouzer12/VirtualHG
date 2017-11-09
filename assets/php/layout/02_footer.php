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

<!-- SCRIPTS ARE ALWAYS IN THE BOTTOM TO IMPROVE LOADING -->
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/popper.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script>
    $('#btnLogin').click(function () {
        var usr = $("#usr").val();
        var pwd = $("#pwd").val();
        console.log("usr = " + usr + ", pwd = " + pwd);
        $.post("auth/login", {
            usr,
            pwd
        }, function (data) {
            var response = jQuery.parseJSON(data);
            if (response.status == 0) {
                window.location = "dashboard";
            } else {
                $("#usr").addClass("is-invalid")
                $("#pwd").addClass("is-invalid")
            }
        })
    });
</script>