<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf8">
	<title>Moderator Page</title>
	<?php require_once('../../Resources/links.php');?>
</head>
<body>
	<?php require_once('../../Resources/nav.php');
	    require_once('../../../Models/BD.php');
	    $bd = new BD;
	    if(isset($_POST["update"])){
            $ticket_id = $_POST["update"];
	        if(isset($_POST["answer"])){
	            $answer = $_POST["answer"];
                $sql = "UPDATE ticket SET answer = '$answer' WHERE id = '$ticket_id'";
                if($bd->con->query($sql) === TRUE){
                    header("Location: ");
                }else{
                    echo "Error updating record: " . $bd->con->error;
                }
            }
	    }
        if(isset($_POST["delete"])){
            $ticket_id = $_POST["delete"];
            $sql = "DELETE FROM ticket WHERE id= '$ticket_id'";
            if($bd->con->query($sql) === TRUE){
                echo '<script>alert("Тикет с id:'.$ticket_id.' удален !");</script>';
            }else{
                echo "Error deleting record: " . $bd->con->error;
            }
        }
	?>
	<br>
	<div class="container">
		<div style="margin-left: 70%; margin-right: 15%">
			<select class="form-control" id="exampleFormControlSelect">
				<option>IT отдел</option>
				<option>Отдел продаж</option>
				<option>Финансовый отдел</option>
			</select><br>
		</div>

		<!-- foreach -->
        <?php
        $sql = "SELECT * FROM ticket";
        if ($result = mysqli_query($bd->con,$sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                        <form method="POST">
                        <div class="border rounded-lg" style="margin-left: 15%; margin-right: 15%;">
                        <div class="modal-header">
                        <h5 class="modal-user">'.$row["client_id"].' / '.$row["type"].'</h5>
                        </div>
                        <div class="modal-header">
                        <h5 class="modal-title">'.$row["title"].'</h5>
                        </div>
                        
                        <div class="modal-body">
                        <p>Описание:</p>
                        <textarea class="form-control" rows="2" name="text" >'.$row["text"].'</textarea>
                        <p>Ответ модератора:</p>
                        <textarea class="form-control" rows="4" name="answer" placeholder="'.$row["answer"].'"></textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="delete" value="'.$row["id"].'">Удалить</button>
                        <button type="submit" class="btn btn-success" name="update" value="'.$row["id"].'">Ответить</button>
                        </div>
                        </div>
                        </form>
                        <br>
                    ';
                }
            }else{
                echo '<h4>Тикетов нет !</h4>';
            }
        }
        ?>

		
	</div>
</body>
</html>