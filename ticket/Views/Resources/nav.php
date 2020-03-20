<?php
    session_start();
	echo '
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
		<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		';
	    if($_SESSION["role_id"] == 2) {
	        $link = "ClientPage.php";
	        echo '    
                <li class="nav-item">
                <a class="nav-link active" href='.$link.'>Главная</a>
                </li> ';
        }
		if($_SESSION["role_id"] == 2){
            echo '
                <li class="nav-item">
                <a class="nav-link active" href="SendTicket.php">Создать тикет</a>
                </li> ';
		}
		echo '
		</ul>
		<div class="dropdown">
		<button type="button" class="btn btn-dark" data-toggle="dropdown" style="text-color: white;">
		';
		echo $_SESSION["name"]." ". $_SESSION["surname"];echo '</button>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="../../index.php">Выйти</a>
		</div>
		</div>
		</div>
		</nav>
			';
?>