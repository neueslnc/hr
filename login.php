<?php
session_start();
header("Content-Type: text/html; charset=utf-8");
require_once("cndata/cnct.php");
require_once("main_classes.php");
error_reporting(E_ALL);
ini_set('display_errors',1);
if(isset($_POST["submit"]))
{
    if(empty($_POST["username"]) || empty($_POST["password"]))
    {
        $message = '<label>Барча майдонларни тўлдиринг</label>';
    }
    else
    {
        $query = "SELECT * FROM usertbl WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            array(
                'username'     =>     clean($_POST["username"]),
                'password'     =>     sha1(clean($_POST["password"]))
            )
        );
        $count = $stmt->rowCount();
        if($count > 0)
        {
            $_SESSION["session_username"] = $_POST["username"];
            $username = $_POST["username"];
            $sessionIdQuery = $conn->prepare ('SELECT full_name FROM usertbl WHERE username = :username');
            $sessionIdQuery->execute(array('username' => $username));
            foreach ($sessionIdQuery as $row):
                $client_id = $row["full_name"];
            endforeach ;
            $_SESSION['session_id']=$client_id;
            header("location:index.php");
        }
        else
        {
            $message = '<label>Логин ёки пароль нотўғри</label>';
        }
    }
}


?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="<?php showTitle(); ?>">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendor/boxicons/css/boxicons.min.css" />
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
<title><?php showTitle(); ?></title>
</head>
<body>
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">


        <div class="panel card-sign">
            <div class="card-title-sign mt-3 text-end">
                <h2 class="title text-uppercase font-weight-bold m-0"><i class="bx bx-user-circle me-1 text-6 position-relative top-5"></i>Тизимга кириш</h2>
            </div>
            <div class="card-body">

                <form action="" method="post">
                    <?php
                    if(isset($message))
                    {
                        echo '<label class="text-danger">'.$message.'</label>';
                    }
                    ?>
                    <div class="form-group mb-3">
                        <label>Логин</label>
                        <div class="input-group">
                            <input name="username" type="text" class="form-control form-control-lg" />
                            <span class="input-group-text">
										<i class="bx bx-user text-4"></i>
									</span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Пароль</label>
                        </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control form-control-lg" />
                            <span class="input-group-text">
										<i class="bx bx-lock text-4"></i>
									</span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">

                            </div>
                        </div>

                    </div>



                    <div class="mb-1 text-center">
                        <button type="submit" name="submit" class="btn btn-facebook mb-3 ms-1 me-1" href="#">Кириш </button>

                    </div>


                </form>
            </div>
        </div>

        <p class="text-center text-muted mt-3 mb-3">&copy; Osiyo Xalqaro Universiteti 2023.</p>
    </div>
</section>
<!-- end: page -->

<!-- Vendor -->
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
<script src="vendor/popper/umd/popper.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="vendor/common/common.js"></script>
<script src="vendor/nanoscroller/nanoscroller.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
<script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

</body>
</html>