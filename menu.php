<nav id="menu" class="nav-main" role="navigation">

    <ul class="nav nav-main">


        <li class="nav-parent">
            <a class="nav-link" href="#">
                <i class="bx bx-list-check" aria-hidden="true"></i>
                <span>Номзодлар</span>
            </a>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="index.php">
                        Барча номзодлар
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="accept_personal.php">
                        Тасдиқланганлар
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="reject_personal.php">
                        Рад этилганлар
                    </a>
                </li>
            </ul>
        </li>
<?php
if( in_array(isAdmin(), array(1, 2)) ){

?>
        <li class="nav-parent">
            <a class="nav-link" href="#">
                <i class="bx bx-plus" aria-hidden="true"></i>
                <span>Xodimlar</span>
            </a>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="all_emploers.php">
                        Barcha xodimlar
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="new_emploer.php">
                        Yangi xodim
                    </a>
                </li>
                <li class="nav-parent">
                    <a>
                        Bo`limlar bo`yicha
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <?php
                            $result = $DB->query("SELECT * FROM `departments`  ORDER BY id DESC");
                            foreach ($result as $key) {
                            ?>
                            <a class="nav-link" href="department_view.php?id=<?php echo $key['id'];?>&depname=<?php echo $key['depname'] ?>"><?php echo $key['depname'];?></a>
                            <?php } ; ?>
                        </li>
                    </ul>
                </li>
            </ul>

        </li>


        <li class="nav-parent">
            <a class="nav-link" href="#">
                <i class="bx bx-plus" aria-hidden="true"></i>
                <span>O`qituvchilar</span>
            </a>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="all_teachers.php">
                        Barcha o`qituvchilar
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="add_teacher.php">
                            Yangi qo`shish
                    </a>
                </li>
                <li class="nav-parent">
                    <a>
                       Ish o`rni bo`yicha
                    </a>
                    <ul class="nav nav-children">
                        <li>
                            <a class="nav-link" href="work_view.php?id=1">Asosiy</a>
                            <a class="nav-link" href="work_view.php?id=2">Soatbay</a>
                            <a class="nav-link" href="work_view.php?id=3">O`rindoshlik asosida</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>


        <li class="nav-parent">
            <a class="nav-link" href="#">
                <i class="bx bx-plus" aria-hidden="true"></i>
                <span>Bo`limlar</span>
            </a>
            <ul class="nav nav-children">
                <li>
                    <a class="nav-link" href="all_departments.php">
                        Barcha bo`limlar
                    </a>
                </li>
                <li>
                    <a class="nav-link" href="add_department.php">
                        Yangi bo`lim qo`shish
                    </a>
                </li>
            </ul>
        </li>
    <li class="nav-parent">
        <a class="nav-link" href="#">
            <i class="bx bx-plus" aria-hidden="true"></i>
            <span>Ehtiyojlar</span>
        </a>
        <ul class="nav nav-children">
            <li>
                <a class="nav-link" href="all_e.php">
                    Barcha ehtiyojlar
                </a>
            </li>
            <li>
                <a class="nav-link" href="add_e.php">
                    Yangi ehtiyoj qo`shish
                </a>
            </li>
        </ul>
    </li>
        <?php } ?>
    </ul>
</nav>
