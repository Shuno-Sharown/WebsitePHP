<?php
require_once("config/db.class.php");
class User{
    public $userID;
    public $userName;
    public $email;
    public $password;
    public function __construct($u_name, $u_email, $u_pass)
    {
        $this->userName = $u_name;
        $this->email = $u_email;
        $this->password = $u_pass;
    }
    public function save(){
        $db = new Db();
        $sql = "INSERT INTO users (UserName, Email, Password) VALUES ('".mysqli_real_escape_string($db->connnect(),
        $this->userName)."','".mysqli_real_escape_string($db->connnect(),
        $this->email)."','".md5(mysqli_real_escape_string($db->connnect(), $this->password))."')";
        $result = $db->query_execute($sql);
        return $result;
    }
    public static function checkLogin($userName, $password){
        $password = md5($password);
        $db = new Db();
        $sql = "SELECT * FROM users WHERE UserName = '$userName' AND Password = '$password'";
        $result = $db->query_execute($sql);
        return $result;
    }
}
?>