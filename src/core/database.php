<?php 

trait Database
{
    private function connect()
    {
        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        
        return $conn;
    }

    public function query($query)
    {
        $conn = $this->connect();
        $result = $conn->query($query);
        if($result === true){
            return true;
        }
        $conn->close();
        if($result !== false){
            if ($result->num_rows > 0) {
                $resultArr =  $result->fetch_all(MYSQLI_ASSOC);
                if(is_array($resultArr) && count($resultArr)){
                    return $resultArr;
                }
            }
           
        }
        return false; 
    }

    public function get_row($query)
    {
        $conn = $this->connect();
        $result = $conn->query($query);
        if($result === true){
            return true;
        }
        $conn->close();
        if($result !== false){
            if ($result->num_rows > 0) {
                $resultArr =  $result->fetch_all(MYSQLI_ASSOC);
                if(is_array($resultArr) && count($resultArr)){
                    return $resultArr[0];
                }
            }
            return true;
        }

        return false;
    }
}

