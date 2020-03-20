<?php
require_once('User.php');
class BD{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "ticket";
    public $con;
    /**
     * BD constructor.
     */
    public function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if(!$this->con)
            echo 'Database Connection Error\n' . mysqli_connect_error($this->con);
    }

    public function auth($login, $table, $data){
        $sql = "SELECT * FROM user WHERE login='$login'";
        $result = $this->con->query($sql);
        if($result->num_rows > 0) {
            echo '<script>alert("Такой логин уже существует, попробуйте другой");</script>';
        }else{
            $this->insertData($table, $data);
        }
    }

    public function searchUser($login, $password){
        $sql = "SELECT * FROM user WHERE login='$login' AND password='$password'";
        $result = $this->con->query($sql);
        $user = "";
        $id = 0;
        if($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user = new User($row["role_id"], $row["name"], $row["surname"], $row["login"], $row["password"]);
                $id = $row["id"];
            }
            $_SESSION["role_id"] = $user->getRoleId();
            $_SESSION["id"] = $id;
            $_SESSION["name"] = $user->getName();
            $_SESSION["surname"] = $user->getSurname();
            $_SESSION["login"] = $user->getLogin();


            if($user->getRoleId() == 2){
                header("Location: ../Views/Roles/Client/ClientPage.php");
            }else{
                header("Location: ../Views/Roles/Moderator/ModeratorPage.php");
            }
        }else{
            echo '<script>alert("Неправильный логин или праоль !");</script>';
        }
    }

    public function insertData($table_name, $data){
        $sql = 'INSERT INTO '.$table_name.' (';
        $sql .= implode(",",array_keys($data)).') VALUES(';
        $sql .= "'".implode("','",array_values($data)). "')";
        if(mysqli_query($this->con, $sql)){
            echo '<script>alert("Inserted Data Successfully!");</script>';
        }else{
            echo mysqli_error($this->con);
        }

    }


}
?>