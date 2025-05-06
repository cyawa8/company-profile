<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/fae96b79f4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <!-- koneksi DB -->

    <div class="container">
        <div class="forms">
            <div class="main">
                <!--login-->
                <div class="gambar">
                    <center><img class="logo-perusahaan mb-3" src="assets/images/logoARMI.png" alt="ARMI" style="width:100px;"></center>
                </div>

                <?php if (isset($_SESSION['login_error'])) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?= $_SESSION['login_error']; ?>
                    </div>
                    <?php unset($_SESSION['login_error']);
                    ?>
                <?php endif; ?>

                <form action="https://www.arthamitrainternasional.com/ceklogin" name="login" method="POST">
                    <div class="mb-3">
                        <label for="nik" class="form-label">Username</label>
                        <input type="text" class="form-control" id="nik" name="nik" placeholder="Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>

                    <div class="mt-3 form-group">
                        <input type="checkbox" onClick="myFunction()">&nbsp;&nbsp; show password
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- javascript -->

    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

</body>

</html>