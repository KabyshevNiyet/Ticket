<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
	<title>Send ticket</title>
	<?php require_once('../../Resources/links.php'); ?>
</head>
<body>
	<?php require_once('../../Resources/nav.php');
    require_once ("../../../Models/Ticket.php");
    require_once("../../../Models/BD.php");
    $db = new BD;
    if(isset($_POST["insertSubmit"])){
        if(isset($_POST["type"], $_POST["title"], $_POST["text"])){
            $ticket = new Ticket(0, $_POST["type"], $_POST["title"], $_POST["text"], "Moderator has not yet answer to your ticket", $_SESSION["id"]);
            $data = array(
                    'type' => $ticket->getType(),
                    'title' => $ticket->getTitle(),
                    'text' => $ticket->getText(),
                    'answer' => $ticket->getAnswer(),
                    'client_id' => $ticket->getClientId()
            );
            $db->insertData("ticket", $data);

        }
    }

	?>
	<div class="container col-6 p-5">
		<h1 align="center">Создание нового тикета</h1>
		<form method="POST">
        <div class="form-group">
			<label for="exampleFormControlSelect">Выберите отдел:</label>
			<select class="form-control" id="exampleFormControlSelect" name="type">
				<option>IT отдел</option>
				<option>Отдел продаж</option>
				<option>Финансовый отдел</option>
			</select><br>

			<label for="exampleFormControlInput">Заголовок:</label>
			<input type="text" name="title" id="exampleFormControlInput" class="form-control"><br>

			<label for="exampleFormControlTextarea">Описание</label>
    		<textarea class="form-control" name="text" id="exampleFormControlTextarea" rows="4"></textarea><br>

    		<button type="submit" class="btn btn-success" name="insertSubmit">Отправить</button>
		</div>
        </form>
	</div>

</body>
</html>