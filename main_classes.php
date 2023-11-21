<?php
function isAdmin () {
	global $conn ; 
    $q = $_SESSION['session_username'] ; 
	$isAdmin = $conn->prepare('SELECT user_level FROM usertbl WHERE username = :q');
    $isAdmin->execute(array('q' => $q));
    $adminResult = $isAdmin->fetchAll(); 
	foreach ($adminResult as $row):
	$userlevel = $row["user_level"];
    endforeach ; 
    return $userlevel ; 
	}	

	function getUserId () {
		global $conn ; 
		$q = $_SESSION['session_username'] ; 
		$getUserId = $conn->prepare('SELECT id FROM usertbl WHERE username = :q');
		$getUserId->execute(array('q' => $q));
		$userResult = $getUserId->fetchAll(); 
		foreach ($userResult as $row):
		$userid = $row["id"];
		endforeach ; 
		return $userid ; 
	}

function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);    
    return $value;
}


function dateformat ($var=""){
	$var = strtotime($var) ; 
	$var = date('Y-m-d', $var);
	return $var ; 
}
function nodateformat ($var=""){
	$var = strtotime($var) ; 
	$var = date('d-m-Y', $var);
	return $var ; 
}

function timeFormatter ($var=""){
	$var = strtotime($var) ; 
	$var = date('d-m-Y H:i:s', $var);
	return $var ; 
}

function setLevel($lvl="") {

    if($lvl==1) {
        $lvl="Администратор" ;
    }
    elseif ($lvl==2) {

        $lvl="Курьер" ;
        
    }
    else {

        $lvl="Инвестор" ;
        
    }
    return $lvl ; 
}


function setGaz($gaz="") {

    if($gaz==0) {
        $gaz="Не прекращено" ;
    }

    else {

        $gaz="Прекращено" ;
        
    }
    return $gaz ; 
}



function selectform ($sel=""){
	if ($sel=="1") {
	$sel = "Паломнический тур" ;
	

	}
	elseif ($sel=="2") {
	$sel ="Экскурсионный" ;
	 				}
	elseif ($sel=="3") {
	$sel = "Эко тур" ; 
						}
	elseif ($sel=="4") {
	$sel = "Гастрономический" ; 
						}
	else 				{
										 
	$sel = "Для этого тура не выбрана категория" ;  
						}								
	return $sel ; 
}
function weekday () {
    $weekday = date('w');
    $dateArr = array('', 'Пн', 'Вт','Ср','Чт','Пт','Сб','Вс');

    echo '<ul class="timer-weekdays mb-10">';
    for($i=1; $i<8; $i++){
        if($i == $weekday){
            echo '<li class="active"><a href="#" class="label label-danger">';
        }else{
            echo '<li><a href="#" class="label label-default">';
        }

        echo $dateArr[$i].'</a></li>';
     }
     echo '</ul>';
}



function selectstatus ($status=""){
	if ($status=="1") {
	$status = "Активный" ;
					}	
	else				{
										 
	$status = "Закрыт" ;  
						}								
	return $status ; 
}

function setDelBtn($dataTable, $id, $link) //Кнопка для удаления строки
{
	echo "
	<a href='delmenu.php?id=$id&dt=$dataTable&link=$link'  
	class='btn btn-outline-primary btn-xs'>O'chirish</a>
	";
}

function setEditBtn($dataTable, $link) //Кнопка для редактирования
{
	echo "
	<a href='$link'
	class='btn btn-outline-primary btn-xs'>O'zgartirish</a>
	";
}

function setKrilDelBtn($dataTable, $id, $link) //Кнопка для удаления строки кириллица
{
	echo "
	<a href='delmenu.php?id=$id&dt=$dataTable&link=$link'  
	class='btn btn-outline-primary btn-xs'>Учириш</a>
	";
}

function setKrilEditBtn($dataTable, $link) //Кнопка для редактирования кириллица
{
	echo "
	<a href='$link' data-toggle='modal' 
	class='btn btn-outline-primary btn-xs'>Узгартириш</a>
	";
}


function setReplyMsg($id) //Sets the reply button for the message...
{
	echo "
	<a href='reply_message.php?id=$id' 
	class='btn btn-outline-primary btn-xs'>Javob berish</a>
	";
}

function deleteArticle($dataTable, $id) //Функция удаления из БД
{
	global $con;
	$query = "delete from $dataTable where id = '$id'";
	$result = mysqli_query($con, $query);
		
}
function showTitle() //Функция title
{
	$title = "OXU-HR" ;
	echo  $title; 	
		
}

function showHead() //Функция title
{
	$title = "Эслатма" ;
	echo  $title; 	
		
}

function showLink() //Функция link
{
	$url = "http://iproger.uz/ticket/login.php" ;
	echo  $url; 	
		
}




function paystatusDetect ($pst=""){
	if ($pst=="onhold") {
	$pst = "<span class='badge bg-orange'>Тулов амалга оширилмаган</span>" ;
				  }
	elseif ($pst=="active") {
	$pst ="<span class='badge bg-teal'>Активлаштирилган</span>" ;
	 				}

	return $pst ; 
}

function ticketStatus ($ts=""){
	if ($ts=="0") {
	$pst = "<span class='badge bg-orange'>Очик тикет</span>" ;
				  }
	elseif ($ts=="1") {
	$pst ="<span class='badge bg-teal'>Ёпик тикет</span>" ;
	 				}

	return $pst ; 
}

function balance_transaction ($client_id="") {
	global $con ; 
	$result10000 = mysqli_query($con,"SELECT SUM(sum) AS totaltrans,client_id FROM transactions WHERE client_id = '".mysqli_real_escape_string($con,$client_id)."'")   or die(mysqli_error($con));	
	while($row10000 = mysqli_fetch_assoc( $result10000 )) {
	$balance_transaction = $row10000["totaltrans"];
	
			 }
			 return $balance_transaction ; 
	}
	
	function balance_expenses ($client_id="") {
	global $con ; 
	$result10001 = mysqli_query($con,"SELECT SUM(expenses_sum) AS totalexpe ,client_id FROM expenses WHERE client_id = '".mysqli_real_escape_string($con,$client_id)."'")   or die(mysqli_error($con));	
	while($row10001 = mysqli_fetch_assoc( $result10001 )) {
	$balance_expenses = $row10001["totalexpe"];
	
			 }
			 return $balance_expenses ; 
	}
	function generatePassword($length = 10){
	$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789!?';

	$str = '';
	$max = strlen($chars) - 1;

	for ($i=0; $i < $length; $i++)
    $str .= $chars[mt_rand(0, $max)];

			return $str;
}

function ticketStatusD ($ts=""){
	if ($ts=="0") {
	$ts = "<span class='badge bg-orange'>Очик турган тикет</span>" ;
				  }
	elseif ($ts=="1") {
	$ts ="<span class='badge bg-teal'>Ёпик тикет</span>" ;
	 				}

	return $ts ; 
}

function clientCloseTicket ($clclti=""){
	if ($clclti=="0") {
	$clclti = "" ;
				  }
	elseif ($clclti=="1") {
	$clclti ="<span class='badge bg-teal'>Тикет ёпилсин</span>" ;
	 				}

	return $clclti ; 
}

function empCloseTicket ($emclti=""){
	if ($emclti=="0") {
	$emclti = "" ;
				  }
	elseif ($emclti=="1") {
	$emclti ="<span class='badge bg-teal'>Тикет ёпилсин</span>" ;
	 				}

	return $emclti ; 
}


 // *********************************************************************


//*********************************************************************

//*********************************************************************

//*********************************************************************
function sendDetect ($sendstat=""){
	if ($sendstat=="0") {
$sendstat = "<button type='button' class='btn btn-warning btn-rounded waves-effect waves-light'>
                                                   <span class='btn-label'><i class='fa fa-warning'></i>
                                                   </span>Юборилмаган</button>" ;
	}	
	elseif ($sendstat=="1") {
$sendstat ="<button type='button' class='btn btn-success btn-rounded waves-effect waves-light'>
                                                   <span class='btn-label'><i class='fa fa-check'></i></span>
                                                   Юборилган
                                                </button>" ;
	}
	elseif ($sendstat=="2") {
$sendstat ="<button type='button' class='btn btn-info btn-rounded waves-effect waves-light'>
                                                   <span class='btn-label'><i class='fa fa-exclamation'></i>
                                                   </span>Ижроси таъминланган</button>" ;
	}
return $sendstat ; 
}


function gendetStatus ($gstatus=""){
	if ($gstatus=="male") {
	$gstatus = "Мужской" ;
					}	
	else				{
										 
	$gstatus = "Женский" ;  
						}								
	return $gstatus ; 
}



function roleDetect ($role=""){
	if ($role=="1") {
	$role = "Администратор" ;
					}	
	elseif	($role=="2")			{
										 
	$role = "МКМ работник" ;  
						}
	elseif	($role=="3")			{
										 
	$role = "Бухгалтер" ;  
						}
	else				{
										 
	$role = "Зав.склад" ;  
						}						
	return $role ; 
}


function teacherDetect ($trole=""){
    if ($trole=="1") {
        $trole = "Asosiy" ;
    }
    elseif	($trole=="2")			{

        $trole = "Soatbay" ;
    }
    elseif	($trole=="3")			{

        $trole = "O`rindoshlik asosida" ;
    }
    return $trole ;
}

?>