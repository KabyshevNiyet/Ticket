<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
	<title>Client Main</title>
	<?php require_once('../../Resources/links.php');
    require_once ("../../../Models/BD.php");
    $bd = new BD;
	?>
</head>
<body>
	<?php require_once('../../Resources/nav.php');?>
	<div class="container">
		<section class="content-header">
			<h2> Мои тикеты: </h2>
		</section><br>

		<!-- foreach -->
        <?php
            $log = $_SESSION["id"];
            $sql = "SELECT * FROM ticket WHERE client_id = '$log'";
            if ($result = mysqli_query($bd->con,$sql)){
                if(mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_array($result)){
                    echo '
                        <div class="border rounded-lg" style="margin-left: 15%; margin-right: 15%;">
                        <div class="modal-header">
                        <h5 class="modal-title">'.$row["title"]." / ".$row["type"].'</h5>
                        </div>
                        <div class="modal-body">
                        <p>Описание:</p>
                        <textarea class="form-control" rows="5">'.$row["text"].'</textarea>
                        <p>Ответ модератора:</p>
                        <textarea class="form-control" rows="5">'.$row["answer"].'</textarea>
                        </div>
                        <div class="modal-footer"> ';
                            if ($row["answer"] == "Moderator has not yet answer to your ticket"){
                                echo '<p>Тикет активный</p>';
                            }else{
                                echo '<p>Тикет закрыт</p>';
                            }
                        echo '
                        </div>
                        </div>
                        <br>
                    ';
                    }
                }else
                    echo '<h4>У вас нет тикетов!</h4>';
            }
        ?>

	</div>
</body>
</html>