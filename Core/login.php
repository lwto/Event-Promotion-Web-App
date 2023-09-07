
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="CSS/bootstrap/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
    <title>Admin Login</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="col-md-5 d-none d-lg-block">
                    <img src="Images/login.svg" alt="" srcset="" style="width: 80%;">
                </div>
                <div class="col-md-7 col-lg-5">
                    <div class="card shadow bg-dark text-white">
                        <div class="card-body p-4">
                            <div class="login-title">
                                ADMIN LOGIN
                            </div>
            
                            <div class="login-form">
                                <div class="login-form">
                                    <form action="validate.php" method="POST">
                                        <div class="form-group">
                                            <label class="form-control-label">USERNAME</label>
                                            <input type="text" name="username" value="" required class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">PASSWORD</label>
                                            <input type="password" name="password" value="" required class="form-control" i>
                                        </div>
            
                                        <div class="loginbttm">
                            
                                            <div class="login-button text-center">
                                                <button type="submit" name="submit" class="btn btn-outline-light btn-block">LOGIN</button>
                                            </div>
                                        </div>
                                        <div class="text-center mb-4 mt-4 link">
                                            <a href="index.php">Back to home</a>
                                        </div>
                                    </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>