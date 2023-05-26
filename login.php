<?php 
include('layouts/header.php');
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="text-center font-weight-light">Login</h3>
                </div>
                <div class="card-body">
                    <form action="/layanan_desa/action/auth/login.php" method="post">
                        <div class="form-group mb-3">
                            <label for="inputUsername">Username</label>
                            <input class="form-control" id="inputUsername" type="text" name="username"
                                placeholder="Username" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPassword">Password</label>
                            <input class="form-control" id="inputPassword" type="password" name="password"
                                placeholder="Password" />
                        </div>
                        <div class="text-center mt-4 mb-0">
                            <input type="reset" class="btn btn-warning" name="reset" value="Batal" />
                            <input type="submit" class="btn btn-primary" name="submit" value="Login" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
include('layouts/footer.php');
?>