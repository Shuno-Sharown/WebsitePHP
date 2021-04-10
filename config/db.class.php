<?php // IDEA:

class Db{
    protected static $connection;

    public function connnect(){

        $localhost = "localhost";
        $databasename = "ecommerce";
        $user = "root";
        $pass = "";

        if(!isset(self::$connection)){
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);

        }

        if(self::$connection==false){
            return false;
        }
        return self::$connection;

    }

    public function query_execute($queryString){
        $connection = $this->connnect();

        $connection->query("SET NAMES utf8");
        $result = $connection->query($queryString);

        //$connection->close();
        return $result;
    }

    public function select_to_array($queryString){
        $rows = array();
        $result = $this->query_execute($queryString);
        if($result==false) return false;

        while($item = $result->fetch_assoc()){
            $rows[] = $item;
        }
        return $rows;
    }

    public static function totoal_record(){
        $result = mysqli_query(Db::$connection, "select count(ProductID) as total from product ");
        $row = mysqli_fetch_assoc($result);
        $totoal_record = $row['total'];
        return $totoal_record;
        }
    
}

?>