<!DOCTYPE html>
<?php

    session_start();
    require_once("../Models/BD.php");
    require_once("../Models/User.php");
    $db = new BD;
    $msg = '';
    $role_id = 1;
    if(isset($_POST["loginSearch"])){
        if(isset($_POST["login"], $_POST["password"])){
            $db->searchUser($_POST["login"], $_POST["password"]);
        }
    }
    if(isset($_POST["submit"])){
        if(isset($_POST["roles"])){
            if($_POST["roles"] == "Client"){
                $role_id = 2;
            }else {
                $role_id = 1;
            }
            $user = new User($role_id,$_POST["name"],$_POST["surname"],$_POST["login"],$_POST["password"]);
        }
        $data = array(
                'role_id' => $user->getRoleId(),
                'name' => $user->getName(),
                'surname' => $user->getSurname(),
                'login' => $user->getLogin(),
                'password' => $user->getPassword()
        );
        $db->auth($user->getLogin(), "user", $data);
    }

?>
<html lang="en">
<head>
	<title>Index</title>
  <meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
    <body class="bg-dark text-white">

    <div class="container col-4" style="margin-top: 10%">
      <div class="login-form">
        <form method="POST">
          <div class="form-group">
            <label>Логин:</label>
            <input type="text" class="form-control" name="login" placeholder="Введите свой логин:"><br>
            <label>Пароль:</label>
            <input type="password" class="form-control" name="password" placeholder="Пароль:">
          </div>
          <button type="submit" class="btn btn-success text-white" name="loginSearch">Войти</button>
          <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal">Регистрация</button>
        </form>
      </div>
    </div>

    <div id="myModal" class="modal fade text-dark">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title">Форма регистрации</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form class="form-group" method="POST">
        <div class="modal-body">
        <p>Заполните форму чтобы создать аккаунт и выберите роль.</p>
        <select name="roles" class="custom-select-sm rounded">
          <option>Client</option>
          <option>Moderator</option>
        </select>

        <hr>
        <label for="name"><b>Name</b></label>
        <input type="text" class="form-control" placeholder="Enter Name" name="name" required>

        <label for="surname"><b>Surname</b></label>
        <input type="text" class="form-control" placeholder="Enter Surname" name="surname" required>

        <label for="login"><b>Login</b></label>
        <input type="text" class="form-control" placeholder="Enter Login" name="login" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>

        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="submit">Регистрация</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
        </div>
        </form>


      </div>
    </div>
  </div>


</body>
</html>