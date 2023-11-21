<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;
$id= $_GET['id'] ;
$result = $DB->query("SELECT e.*, d.depname FROM `teachers` as e LEFT JOIN departments as d ON e.department = d.id WHERE e.id = ? ORDER BY e.id DESC",array("$id"));
foreach ($result as $key1) {

//    exit();

    ?>
    <!doctype html>
    <html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title><?php showTitle(); ?></title>
        <meta name="keywords" content="<?php showTitle(); ?>" />
        <meta name="description" content="<?php showTitle(); ?>">
        <meta name="author" content="">

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

                    <h2><?php echo $key1['fish']  ;?></h2>

                    <div class="right-wrapper text-end">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.php">
                                    <i class="bx bx-home-alt"></i>
                                </a>
                            </li>


                            <li><span>O`qituvchi profili</span></li>

                        </ol>

                        <a class="sidebar-right-toggle" ><i class="fas fa-chevron-left"></i></a>
                    </div>
                </header>

                <!-- start: page -->
                <form class="order-details action-buttons-fixed" method="post">
                    <div class="row">
                        <div class="col-xl-4 mb-4 mb-xl-0">

                            <div class="card card-modern">
                                <div class="card-header">
                                    <h2 class="card-title">Foto</h2>
                                </div>
                                <div class="card-body">

                                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">

                                                    <h4 class="modal-title" id="myModalLabel"><?php echo $key1['fish'];?></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="<?php echo $key1['location'];?>" id="preview"  >
                                                </div>
                                                <div class="modal-footer">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" id="zoom">
                                        <img src="<?php echo $key1['location'];?>" class="rounded img-fluid" alt="">
                                    </a>


                                </div>
                            </div>

                        </div>
                        <div class="col-xl-8">

                            <div class="card card-modern">
                                <div class="card-header">
                                    <h2 class="card-title">Ma`lumotlar</h2>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-auto me-xl-5 pe-xl-5 mb-4 mb-xl-0">
                                            <h3 class="text-color-dark font-weight-bold text-4 line-height-1 mt-0 mb-3">ASOSIY</h3>
                                            <ul class="list list-unstyled list-item-bottom-space-0">
                                                <li><b> Viloyat </b>   <?php echo $key1['region'] ; ?></li>
                                                <li><b>Tug`ilgan yili</b> <?php echo nodateformat($key1['bdate']) ; ?></li>
                                                <li><b>Telefon </b><?php echo $key1['phone'] ; ?></li>
                                                <li><b>Yashash manzili </b> <?php echo $key1['adress'] ; ?></li>
                                                <li><b>Pasport seriyasi</b> <?php echo $key1['passport']; ?></li>
                                                <li><b>PINFL</b> <?php echo $key1['pinfl'] ; ?></li>
                                            </ul>
                                            <strong class="d-block text-color-dark">Yashsash manzili:</strong>
                                            <?php echo $key1['adress'] ; ?>
                                            <strong class="d-block text-color-dark mt-3">Telefon:</strong>
                                            <a href="tel:<?php echo $key1['phone'] ; ?>" class="text-color-dark"><?php echo $key1['phone'] ; ?></a>
                                        </div>
                                        <div class="col-xl-auto ps-xl-5">
                                            <h3 class="font-weight-bold text-color-dark text-4 line-height-1 mt-0 mb-3">ISH JOYI</h3>
                                            <ul class="list list-unstyled list-item-bottom-space-0">
                                                <li><b>Oxirgi ish joyi</b> <?php echo $key1['lastwork'] ; ?></li>
                                                <li><b>Ishga kelgan vaqti</b> <?php echo $key1['workbegindate'] ; ?></li>
                                                <li><b>Lavozim</b> <?php echo $key1['lavozim'] ; ?></li>
                                                <li><b>Ish stavkasi</b> <?php echo $key1['stavka'] ; ?></li>
                                                <li><b>Bo`lim</b> <?php echo $key1['depname'] ; ?></li>
                                                <li><b>Ish tartibi</b> <?php echo teacherDetect($key1['ish']) ; ?></li>
                                                <li><b>Mutaxassisligi</b> <?php echo $key1['spec'] ; ?></li>
                                                <li><b>Izoh</b> <?php echo $key1['izoh'] ; ?></li>

                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 25px">
                        <div class="col">

                            <div class="card card-modern">
                                <div class="card-header">
                                    <h2 class="card-title">Mehnat ta`tillari</h2>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row action-buttons">
                        <div class="col-12 col-md-auto">
                            <button type="submit" class="submit-button btn btn-primary btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1" data-loading-text="Loading...">
                                <i class="bx bx-save text-4 me-2"></i> Mehnat ta`tili ochish
                            </button>
                        </div>
                        <div class="col-12 col-md-auto px-md-0 mt-3 mt-md-0">
                            <a href="ecommerce-orders-list.html" class="cancel-button btn btn-light btn-px-4 py-3 border font-weight-semibold text-color-dark text-3">Ariza chiqarish</a>
                        </div>
                        <div class="col-12 col-md-auto ms-md-auto mt-3 mt-md-0 ms-auto">
                            <a href="#" class="delete-button btn btn-danger btn-px-4 py-3 d-flex align-items-center font-weight-semibold line-height-1">
                                <i class="bx bx-trash text-4 me-2"></i> O`chirish
                            </a>
                        </div>
                    </div>
                </form>
                <!-- end: page -->
            </section>
        </div>

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
    <script>
        $("#zoom").on("click", function() {
            $('#preview').attr('src', $('#image').attr('src'));
            $('#modal').modal('show');

        });</script>
    </body>
    </html>
<?php }  ?>