<?php     header("Content-Type: text/html; charset=utf-8");
session_start();
if(!isset($_SESSION["session_username"]))
{
    header("location:login.php");
}
require ('development_mode_control.php') ;

if(isset($_POST['save'])){

    if ($DB->insert("comments", array( "user_id" => getUserId(), "person_id" => $_POST['person'], "comment" => $_POST['comment'], "date" => date('Y-m-d') ))) {

        $_SESSION['status'] = '1';
    }else{

        $_SESSION['status'] = '2';
    }

    header("Location: viewprofile.php?id=". $_POST['person']);
    exit();
}

if(isset($_POST['update'])){

    if ($DB->update("comments", array( "comment" => $_POST['comment'] ), array( "id" => $_POST['id'] ))) {

        $_SESSION['status'] = '3';
    }else{

        $_SESSION['status'] = '4';
    }
    header("Location: viewprofile.php?id=". $_POST['person']);
    exit();
}

if(isset($_POST['accept'])){
    if (isAdmin() == 1) {
        if ($DB->update("personnel", array( "status" => 1 ), array( "id" => $_POST['person'] ))) {

            $_SESSION['status'] = '3';
        }else{

            $_SESSION['status'] = '4';
        }
        header("Location: viewprofile.php?id=". $_POST['person']);
        exit();
    }
}

if(isset($_POST['reject'])){
    if (isAdmin() == 1) {
        if ($DB->update("personnel", array( "status" => 2 ), array( "id" => $_POST['person'] ))) {

            $_SESSION['status'] = '3';
        }else{

            $_SESSION['status'] = '4';
        }
        header("Location: viewprofile.php?id=". $_POST['person']);
        exit();
    }
}

if(isset($_POST['put_voice'])){

    $DB->insert("ratings", array(
            'profile_id' => $_POST['profile_id'],
            'employer_id' => $_POST['employer_id'],
            'answer' => $_POST['rating']
    ));

    header("Location: viewprofile.php?id=". $_POST['profile_id']);
    exit();
}

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

    <link rel="stylesheet" href="vendor/elusive-icons/css/elusive-icons.css">
<style>
    .zoom {
    cursor: move;
    width: 150px;
}
</style>   
    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="css/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="ckeditor/ckeditor.js"></script>

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
        <?php
        $result = $DB->query("SELECT * FROM personnel WHERE id =?",array($_GET['id']));
        foreach ($result as $row) :
        ?>
        <section role="main" class="content-body">
            <header class="page-header">
                <h2><?php echo $row["fio"]; ?> карточкаси</h2>

                <div class="right-wrapper text-end">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.php">
                                <i class="bx bx-home-alt"></i>
                            </a>
                        </li>


                        <li><span>Кадр карточкаси</span></li>

                    </ol>

                    <a class="sidebar-right-toggle"><i class="fas fa-chevron-left"></i></a>
                </div>
            </header>

            <!-- start: page -->

            <div class="row">
                <div class="col-lg-4 col-xl-3 mb-4 mb-xl-0">

                    <section class="card">
                        <div class="card-body">
                            <div class="thumb-info mb-3">
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title" id="myModalLabel"><?php echo $row['fio'];?></h4>
      </div>
      <div class="modal-body">
        <img src="<?php echo $row['foto'];?>" id="preview"  >
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
                                <a href="#" id="zoom">
                                <img src="<?php echo $row['foto'];?>" class="rounded img-fluid" alt="">
                                </a>
                                <div class="thumb-info-title">
                                    <span class="thumb-info-inner"><?php echo $row['fio'];?></span>
                                    <span class="thumb-info-type">Номзод</span>
                                </div>
                            </div>

                            <div class="widget-toggle-expand mb-3">
                                <div class="widget-header">
                                    <h5 class="mb-2 font-weight-semibold text-dark">Маълумот</h5>
                                    <div class="widget-toggle">+</div>
                                </div>
                                <div class="widget-content-collapsed">
                                    <div class="progress progress-xs light">

                                    </div>
                                </div>
                                <div class="widget-content-expanded">
                                    <ul class="simple-todo-list mt-3">
                                        <li class="completed">Туғилган йили : <?php echo nodateformat($row['bith_date']);?></li>
                                        <li class="completed">Телефон рақами : <?php echo $row['phone'];?></li>
                                        <li class="completed">Тугатган йўналиши : <?php echo $row['direction'];?></li>
                                        <li class="completed">Қайси лавозимга : <?php echo $row['lavozim'];?></li>
                                    </ul>
                                </div>
                            </div>

                            <hr class="dotted short">

<!--                            <h5 class="mb-2 mt-3">About</h5>-->
<!--                            <p class="text-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam quis vulputate quam. Interdum et malesuada</p>-->




                        </div>
                    </section>

                </div>

                <?php

                    if (isset($_SESSION['status'])) {

                        if($_SESSION['status'] == '1'){

                            echo "<script>
                                setTimeout(() => {
                                    var notice = new PNotify({
                                        title: 'Данные сохранены!',
                                        hide: false,
                                        buttons: {
                                            closer: false,
                                            sticker: false
                                        },
                                        addclass: 'click-2-close',
                                        text: 'Данные были успешно сохранены.',
                                        type: 'success'
                                    });

                                    notice.get().click(function() {
                                        notice.remove();
                                    });
                                }, 1000);
                            </script>";
                        }else if($_SESSION['status'] == '2'){

                            echo "<script>
                                setTimeout(() => {
                                    var notice = new PNotify({
                                        title: 'Ошибка!',
                                        hide: false,
                                        buttons: {
                                            closer: false,
                                            sticker: false
                                        },
                                        addclass: 'click-2-close',
                                        text: 'Данные не сохранены.',
                                        type: 'error'
                                    });

                                    notice.get().click(function() {
                                        notice.remove();
                                    });
                                }, 1000);
                            </script>";
                        }else if($_SESSION['status'] == '3'){

                            echo "<script>
                                setTimeout(() => {
                                    var notice = new PNotify({
                                        title: 'Данные обновлены!',
                                        hide: false,
                                        buttons: {
                                            closer: false,
                                            sticker: false
                                        },
                                        addclass: 'click-2-close',
                                        text: 'Данные были успешно обновлены.',
                                        type: 'success'
                                    });

                                    notice.get().click(function() {
                                        notice.remove();
                                    });
                                }, 1000);
                            </script>";
                        }else if($_SESSION['status'] == '4'){

                            echo "<script>
                                setTimeout(() => {
                                    var notice = new PNotify({
                                        title: 'Ошибка!',
                                        hide: false,
                                        buttons: {
                                            closer: false,
                                            sticker: false
                                        },
                                        addclass: 'click-2-close',
                                        text: 'Данные не обновлены.',
                                        type: 'error'
                                    });

                                    notice.get().click(function() {
                                        notice.remove();
                                    });
                                }, 1000);
                            </script>";
                        }

                        $_SESSION['status'] = 0;

                    }
                    
                    $comment = $DB->query("SELECT * FROM comments as c WHERE c.user_id = ? AND c.person_id = ?", array(getUserId(), $_GET['id']));

                ?>

                <div class="col-lg-8 col-xl-6">

                    <div class="tabs">
                        <ul class="nav nav-tabs tabs-primary">
                            <li class="nav-item active">
                                <button id="tab1" class="nav-link active" data-bs-target="#overview" data-bs-toggle="tab">Фикрлар</button>
                            </li>
                            <?php
                            
                            if ($comment != null && isAdmin() == 1) {
                            ?>
                            <li class="nav-item">
                                <button id="tab2" class="nav-link" data-bs-target="#edit" data-bs-toggle="tab">Ўзгартириш</button>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                        <div class="tab-content">
                            <div id="overview" class="tab-pane active">

                                <div class="p-3">

                                    <h4 class="mb-3 pt-4 font-weight-semibold text-dark">Фикрлар</h4>

                                    <div class="timeline timeline-simple mt-3 mb-3">
                                        <div class="tm-body">
                                            <?php

                                                if( in_array(isAdmin(), array(1, 2)) ){
                                            
                                                    $result = $DB->query("SELECT c.id, c.comment, c.date, c.user_id, u.full_name FROM comments as c LEFT JOIN usertbl as u ON u.id = c.user_id WHERE c.person_id = ? ORDER BY c.date DESC", array($_GET['id']));

                                                }else{

                                                    $user_id = getUserId();

                                                    $result = $DB->query("SELECT c.id, c.comment, c.date, c.user_id, u.full_name FROM comments as c LEFT JOIN usertbl as u ON u.id = c.user_id WHERE c.person_id = ? AND u.id = ? ORDER BY c.date DESC", array($_GET['id'], $user_id));
                                                }

                                                $months = array("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");

                                                $i = "";

                                                $a = "";

                                                foreach ($result as $key) {
                                            
                                                list($year, $month, $day) = explode("-", $key['date']);

                                                if($year != $i || $month != $a){

                                                    $i = $year;

                                                    $a = $month;

                                            ?>
                                                <div class="tm-title">
                                                    <h5 class="m-0 pt-2 pb-2 text-dark font-weight-semibold text-uppercase"><?php echo $months[$month - 1]; ?> <?php echo $year;?></h5>
                                                </div>

                                            <?php
                                                }
                                            ?>

                                                <ol class="tm-items">
                                                    <li>
                                                        <div class="tm-box">
                                                            <p class="text-muted mb-0"><?php echo $key['full_name']?></p>
                                                            <p>
                                                                <?php echo $key['comment']?>
                                                            </p>
                                                            <?php
                                                            
                                                                if($key['user_id'] == getUserId() && isAdmin() == 1){

                                                            ?>
                                                            <div id="edit_button_<?php echo $key['id']; ?>" class="demo-icon-hover mb-3 mt-3 col-md-6 col-lg-4" data-id="<?php echo $key['id']; ?>" data-comment="<?php echo $key['comment']; ?>" onclick="edit_message('edit_button_<?php echo $key['id']; ?>')">
                                                                <i class="el el-edit"></i> Ўзгартириш
                                                            </div>
                                                            <?php
                                                                }
                                                            ?>
                                                            <p class="text-muted mе-2"><?php echo $key['date']?></p>
                                                        </div>
                                                    </li>
                                                </ol>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="edit" class="tab-pane">

                                <?php
                                
                                
                                    if ($comment != null && isAdmin() == 1) {

                                ?>

                                <form class="p-3" method="post">
                                    <input type="hidden" name="person" value="<?php echo $_GET['id'];?>">
                                    <input type="hidden" id="message_id" name="id" value="<?php echo $comment[0]['id'];?>">
                                    <h4 class="mb-3 font-weight-semibold text-dark">Фикр</h4>
                                    <div class="row row mb-4">
                                        <div class="form-group col">
                                            <label for="inputAddress">Комментарий</label>
                                            <textarea id="editor_po" id="comment" name="comment" data-plugin-textarea-autosize placeholder="" rows="1">
                                            <?php                
                                                echo $comment[0]['comment'];
                                            ?>
                                            </textarea>

                                            <script>
                                                let update_message = CKEDITOR.replace( 'editor_po' );
                                            </script>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 text-end mt-3">
                                            <button class="btn btn-primary" name="update" type="submit">Сақлаш</button>
                                        </div>
                                    </div>

                                </form>

                                <?php
                                    }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">

                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="mb-3 mt-0 font-weight-semibold text-dark">Фикр қўшиш</h4>
                            <section class="simple-compose-box mb-3">
                                <form method="post">
        
                                    <input type="hidden" name="person" value="<?php echo $_GET['id'];?>">
        
                                    <textarea id="editor1" name="comment" data-plugin-textarea-autosize placeholder="What's on your mind?" rows="1"></textarea>
                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor 4
                                        // instance, using default configuration.
                                        CKEDITOR.replace( 'editor1' );
                                    </script>
                                    <div class="compose-box-footer">
                                        <ul class="compose-toolbar">
                                            <li>
                                                <a href="#"><i class="fas fa-camera"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="fas fa-map-marker-alt"></i></a>
                                            </li>
                                        </ul>
                                        <ul class="compose-btn">
                                            <li>
                                                <button class="btn btn-primary btn-xs" type="submit" name="save">Сақлаш</button>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </section>
                        </div>

                        <?php
                                
                                


                                if($row['status'] == 0){

                                    if (isAdmin() == 1) {

                                        ?>

                                <div class="card card-body col-md-12">
                                    <form method="post">
                                        <input type="hidden" name="person" value="<?php echo $_GET['id'];?>">
                                        <button type="submit" name="accept" class="mb-1 mt-1 me-1 btn btn-success">Принять</button>
                                        <button type="submit" name="reject" class="mb-1 mt-1 me-1 btn btn-danger">Отклонить</button>
                                    </form>
                                </div>

                        <?php
                                }

                                }else if($row['status'] == 1){

                        ?>
                        
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Принят
                            </div>
                        </div>

                        <?php
                                }else if($row['status'] == 2){
                        ?>

                        <div class="col-md-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Отклонено
                            </div>
                        </div>

                        <?php
                                }

                        ?>

                        <section class="card">
                            <div class="card-body">

                                <?php

                                $result_raiting = $DB->query("SELECT * FROM ratings as r WHERE r.employer_id = ? AND r.profile_id = ?", array(getUserId(), $_GET['id']));

                                if(!$result_raiting){

                                    ?>

                                    <div class="col-md-12">
                                        <form method="post">
                                            <input type="hidden" name="profile_id" value="<?php echo $_GET['id'];?>">
                                            <input type="hidden" name="employer_id" value="<?php echo getUserId() ;?>">
                                            <input type="hidden" name="rating" value="1">
                                            <button type="submit" name="put_voice" class="mb-1 mt-1 me-1 btn btn-success">Қабул қилиш</button>
                                        </form>
                                        <form method="post">
                                            <input type="hidden" name="profile_id" value="<?php echo $_GET['id'];?>">
                                            <input type="hidden" name="employer_id" value="<?php echo getUserId() ;?>">
                                            <input type="hidden" name="rating" value="0">
                                            <button type="submit" name="put_voice" class="mb-1 mt-1 me-1 btn btn-danger">Рад этиш</button>
                                        </form>
                                    </div>

                                    <?php
                                }
                                ?>

                                <div class="col-md-12">


                                    <?php

                                    $result_raitings = $DB->query("SELECT u.full_name, r.answer FROM ratings as r LEFT JOIN usertbl as u ON u.id = r.employer_id WHERE r.profile_id = ?", array($_GET['id']));

                                    foreach($result_raitings as $row) {
                                        ?>
                                        <div class="row">

                                            <div class="col">
                                                <?php echo $row['full_name'] ?>
                                            </div>

                                            <div class="col">
                                                <?php echo $row['answer'] == 0 ? "Рад этисин" : "Қабул қилисин" ?>
                                            </div>
                                        </div>
                                        <?php
                                    }

                                    ?>

                                </div>
                            </div>
                        </section>
                    </div>
                                    
                </div>
            </div>
            <!-- end: page -->
        </section>
        <?php endforeach; ?>
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

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="img/!sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
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

<script>

    function edit_message(id) {

        let message_id = $(`#${id}`).data('id');

        let comment = $(`#${id}`).data('comment');

        $('#message_id').val(message_id);

        $('#tab1').removeClass('active')

        $('#tab2').addClass('active')

        $('#overview').removeClass('active')

        $('#edit').addClass('active')

        update_message.setData(comment);

    }

</script>
<script>
$("#zoom").on("click", function() {
   $('#preview').attr('src', $('#image').attr('src'));
   $('#modal').modal('show');
   
});</script>
</body>
</html>