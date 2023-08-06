<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Informasi Pengajuan Surat (SIPS)</title>
    <link href="/layanan_desa/assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    .carousel-item {
        max-height: 500px;
    }

    .carousel .item>img {
        position: absolute;
        top: 0;
        left: 0;
        max-width: 100%;
        height: 100%;
        object-fit: cover;
    }
    </style>
</head>

<body class="" onload="createCaptcha()">

    <main>
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                    <img width="50" src="/layanan_desa/assets/logo_kabupaten_madiun.gif" alt="">
                    <span class="fs-3">&nbsp;Sistem Informasi Pengajuan Surat ( SIPS)</span>
                </a>

                <ul class="nav nav-pills mt-2">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="/pengajuan.php" class="nav-link">Pengajuan</a></li>
                    <li class="nav-item"><a href="/login.php" class="nav-link">Login</a></li>
                </ul>
            </header>
        </div>

        <div class="container mb-5" onload="createCaptcha()">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4 class="text-center font-weight-light">Login</h3>
                        </div>
                        <div class="card-body">
                            <!-- action="/layanan_desa/action/auth/login.php" method="post" -->
                            <form action="" id="formLogin">
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
                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="border rounded">
                                                <div class="text-center" id="captcha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input class="form-control" type="text" placeholder="Masukkan Captcha"
                                                id="cpatchaTextBox" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-4 mb-0">
                                    <input type="reset" class="btn btn-warning" name="reset" value="Batal" />
                                    <input type="submit" class="btn btn-primary" id="submitButton" name="submit"
                                        value="Login" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-center small">
                <div class="text-muted">Copyright &copy; Sistem Informasi Pengajuan Surat ( SIPS) 2023</div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/layanan_desa//assets/js/scripts.js"></script>
    <script>
    var code;

    function createCaptcha() {
        //clear the contents of captcha div first 
        document.getElementById('captcha').innerHTML = "";
        var charsArray =
            "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
        var lengthOtp = 6;
        var captcha = [];
        for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
            else i--;
        }
        var canv = document.createElement("canvas");
        canv.id = "captcha";
        canv.width = 100;
        canv.height = 45;
        var ctx = canv.getContext("2d");
        ctx.font = "25px Georgia";
        ctx.strokeText(captcha.join(""), 0, 30);
        //storing captcha so that can validate you can save it somewhere else according to your specific requirements
        code = captcha.join("");
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }

    $(document).ready(function() {
        $('#submitButton').on('click', (e) => {
            if ($('#cpatchaTextBox').val() == code) {
                let formLogin = $('#formLogin')
                formLogin.attr("action", "/layanan_desa/action/auth/login.php")
                formLogin.attr("method", "post")
                formLogin.submit()
            } else {
                alert("Captcha Tidak Valid, Masukkan Ulang Kode !!!");
                createCaptcha();
            }
        })
    })
    </script>
</body>

</html>