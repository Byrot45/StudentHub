<?php 

class Database{
    private $host = "localhost";
    private $db_name = "actividad";
    private $username = "root";
    private $password = "asero2230po";
    private $conn;

    public function getConnect() {

        try{

        $this -> conn = new PDO("mysql:host=" . $this -> host . ";dbname=" . $this -> db_name,
        $this -> username,  $this->password);
         
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        

        catch(PDOException $exception){
            echo "Connection error:" . $exception -> getMessage();
                                    } 
        return $this -> conn;
                                        }           

        public function executeQuery($query, $params = [])
        {
            try{
                $stmt = $this -> conn -> prepare ($query);
                foreach ($params as $key => & $val)
                {
                    $stmt -> bindParam($key, $val);
                }
                $stmt -> execute();
                return $stmt;
            }
            catch(PDOException $exception)
            {
                echo "Query error: " . $exception -> getMessage();
            }

            }

            public function fetchResults($query, $params = []) {
                $stmt = $this->executeQuery($query, $params);
                return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }


        }
?>
