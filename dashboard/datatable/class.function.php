<?php 
/**
 * 
 */
require_once('../../../dbconfig.php');

class DTFunction
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $db = $database->dbConnection();
        $this->conn = $db;

    }
    
    public function runQuery($sql)
    {
        $stmt = $this->conn->prepare($sql);
        return $stmt;
    }


    public function get_total_all_records($q)
    {
        try
        { 
            $statement =  $stmt = $this->conn->prepare("$q");
            $statement->execute();
            $result = $statement->fetchAll();

            return $statement->rowCount(); 
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 
    }

    public function check_user_level($var)
    {
        try
        { 
            $statement =  $stmt = $this->conn->prepare("SELECT * FROM `user_level` WHERE `lvl_ID` = $var");
            $statement->execute();
            $result = $statement->fetchAll();

            foreach($result as $row)
            {
                $level_name = $row["lvl_Name"];
            }

            return $level_name; 
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 
    }

    public function insert_classroom($user_ID,$classroom_course,$classroom_descr,$classroom_password){
        try
        { 
            $sql = "INSERT INTO `class_room` (`class_ID`, `user_ID`, `class_Code`, `class_Name`, `class_Description`, `status_ID`, `class_Password`) VALUES (NULL, '$user_ID', NULL, '$classroom_course', '$classroom_descr', 1, '$classroom_password');";
            $statement = $this->runQuery($sql);
            $result = $statement->execute();
            
            return $last_id = $this->conn->lastInsertId();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        } 
    }


    
}



?>