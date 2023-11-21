<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;

?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?php showTitle(); ?></title>
    <meta name="keywords" content="<?php showTitle(); ?>" />
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
    <link rel="stylesheet" href="vendor/select2/css/select2.css" />
    <link rel="stylesheet" href="vendor/select2-bootstrap-theme/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="vendor/datatables/media/css/dataTables.bootstrap5.css" />
    <link rel="stylesheet" href="vendor/pnotify/pnotify.custom.css" />
    <link rel="stylesheet" href="vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>

</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="index.php" class="logo">
                <img src="logo.png" width="35" height="45" alt="" />
            </a>

            <div class="d-md-none toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
            </div>

        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <form action="pages-search-results.html" class="search nav-form">
                <div class="input-group">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Излаш...">
                    <button class="btn btn-default" type="submit"><i class="bx bx-search"></i></button>
                </div>
            </form>

            <span class="separator"></span>



            <div id="userbox" class="userbox">
                <a href="#" data-bs-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="img/!logged-user.jpg" alt="Joseph Doe" class="rounded-circle" data-lock-picture="img/!logged-user.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="" data-lock-email="">
                        <span class="name"><?php echo $_SESSION["session_id"] ?></span>
                        <span class="role"><?php echo $_SESSION["session_username"] ?></span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled mb-2">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="bx bx-user-circle"></i> Созламалар</a>
                        </li>

                        <li>
                            <a role="menuitem" tabindex="-1" href="logout.php"><i class="bx bx-power-off"></i> Чиқиш</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fas fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <?php include_once 'menu.php' ; ?>

                </div>

                <script>
                    // Maintain Scroll Position
                    if (typeof localStorage !== 'undefined') {
                        if (localStorage.getItem('sidebar-left-position') !== null) {
                            var initialPosition = localStorage.getItem('sidebar-left-position'),
                                sidebarLeft = document.querySelector('#sidebar-left .nano-content');

                            sidebarLeft.scrollTop = initialPosition;
                        }
                    }
                </script>

            </div>

        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">
            <header class="page-header">
                <h2>Yangi xodim</h2>

                <div class="right-wrapper text-end">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>


                        <li><span>Yango xodim</span></li>

                    </ol>

                    <a class="sidebar-right-toggle" ><i class="fas fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->
            <div class="row">
                <div class="col">
                    <section class="card">
                        <div class="card-body">
                            <section class="card">
                                <header class="card-header">

                                    <h2 class="card-title">Yangi xodim qo`shish</h2>

                                    <p class="card-subtitle">
                                        Iltimos barcha maydonlarni to`ldiring
                                    </p>
                                </header>
                                <?php

                                if(isset($_POST['save'])){



                                        define ('SITE_ROOT', realpath(dirname(__FILE__)));

                                        function randomFileName($extension = false) {
                                            $extension = $extension ? '.' . $extension : '';
                                            do {
                                                $name = md5(microtime() . rand(0, 1000));
                                                $file = $name . $extension;
                                            } while (file_exists($file));

                                            return $file;
                                        }

                                        $uploaddir = '/upload/foto/user/';
                                        $uploadfile = $uploaddir . basename($_FILES['foto']['name']);

                                        $extension = strtolower(substr(strrchr($_FILES['foto']['name'], '.'), 1));
                                        $file = $uploaddir . randomFileName($extension);
//id	fish	region	bdate	phone	adress	passport	pinfl	lastwork	workbegindate	lavozim	stavka	location	department
                                        if (move_uploaded_file($_FILES['foto']['tmp_name'], SITE_ROOT . "/" . $file)) {
if ($DB->insert("employers", array(
    "fish" => $_POST['fish'],
    "region" => $_POST['region'],
    "bdate" => $_POST['bdate'],
    "phone" => $_POST['phone'],
    "adress" => $_POST['adress'],
    "passport" => $_POST['passport'],
    "pinfl" => $_POST['pinfl'],
    "lastwork" => $_POST['lastwork'],
    "workbegindate" => $_POST['workbegindate'],
    "bn" => $_POST['bn'],
    "lavozim" => $_POST['lavozim'],
    "stavka" => $_POST['stavka'],
    "location" => '/hr'.$file,
    "department" => $_POST['department'],
    "izoh" => $_POST['izoh']
))) {


                                            }
                                        }


                                    echo "<div class='alert alert-success' role='alert'>
  Bazada saqlandi
</div>" ;
                                }

                                ?>
                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="card-body">
                                        <div class="row form-group mb-3">
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Familiyasi ismi sharifi</label>
                                                <input type="text" name="fish" placeholder="FISH" class="form-control">
                                            </div>

                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Viloyat/shahar</label>
                                                <input type="text" name="region" placeholder="Viloyat/shahar" class="form-control">
                                            </div>

                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Tug`ilgan yili</label>
                                                <input type="date" name="bdate" placeholder="Tug`ilgan yili" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Telefon raqami</label>
                                                <input type="text" name="phone" placeholder="Telefon raqami" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Yashash manzili</label>
                                                <input type="text" name="adress" placeholder="Yashash manzili" class="form-control">
                                            </div>

                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Pasport seriyasi</label>
                                                <input type="text" name="passport" placeholder="Pasport seriyasi" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">PINFL</label>
                                                <input type="text" name="pinfl" placeholder="PINFL" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Oxirgi ish joyi</label>
                                                <input type="text" name="lastwork" placeholder="Oxirgi ish joyi" class="form-control">
                                            </div>a
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Ishga kirgan vaqti</label>
                                                <input type="date" name="workbegindate" placeholder="Ishga kirgan vaqti" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Buyruq raqami</label>
                                                <input type="text" name="bn" placeholder="Buyruq raqami" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Lavozimi</label>
                                                <input type="text" name="lavozim" placeholder="Lavozimi" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Stavkasi</label>
                                                <input type="text" name="stavka" placeholder="Stavkasi" class="form-control">
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label" for="formGroupExampleInput">Foto</label>
                                                <input type="file" name="foto" class="form-control" required/>
                                            </div>
                                            <div class="col-sm-12 col-md-4 pb-sm-3 pb-md-0">
                                                <label class="col-form-label">Bo`lim</label>
                                                <div class="col-lg-6">
                                                    <select data-plugin-selectTwo class="form-control populate" name="department">
                                                        <?php
                                                        $result = $DB->query("SELECT * FROM departments");
                                                        foreach ($result as $key) {
                                                        ?>
                                                            <option value="<?php echo $key['id'];?>"><?php echo $key['depname'];?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <textarea class="form-control" rows="5" placeholder="Izoh"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <footer class="card-footer text-end">
                                        <button type="submit" name="save" class="btn btn-primary">Saqlash</button>
                                    </footer>
                                </form>
                            </section>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close d-md-none">
                    Collapse <i class="fas fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark"></div>

                        <ul>
                            <li>
                                <time datetime="2021-04-19T00:00+00:00">04/19/2021</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</section>

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
<script src="vendor/select2/js/select2.js"></script>
<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/media/js/dataTables.bootstrap5.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js"></script>
<script src="vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js"></script>
<script src="vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js"></script>
<script src="vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js"></script>

<script src="vendor/autosize/autosize.js"></script>
<script src="vendor/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="js/theme.js"></script>

<!-- Theme Custom -->
<script src="js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="js/theme.init.js"></script>

<!-- Examples -->
<script src="js/examples/examples.datatables.default.js"></script>
<script src="js/examples/examples.datatables.row.with.details.js"></script>
<script src="js/examples/examples.datatables.tabletools.js"></script>
<script src="config_modal.js"></script>

<script src="vendor/pnotify/pnotify.custom.js"></script>
</body>
</html>