<?php

class Database{

    //database variables declared here
    public $host  = DB_HOST;
    public $user  = DB_USER;
    public $pass  = DB_PASS;
    public $dbase = DB_NAME;

    public $link;
    public $error;

    //funciton to auto load database connectioon when the object is created in other pages
    public function __construct(){
        $this->connectDB();
    }

    //databae connecton is created here
    private function connectDB(){
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbase);
         if(!$this->link){
             $this->error = "connection failed".$this->link->connect_error;
             return false;
         }
    }

    //data is fetched here
    public function select($query){
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    //data insertion is maintained here 
    public function insert($query){
        $insert = $this->link->query($query) or die($this->link->error.__LINE__);
        if($insert){
            header("Location: index.php?msg=".urldecode("Data inserted successfully"));
            exit();
        }else{
            die($this->link->errono).$this->link->error;
        }
    }

    //data updation is maintained here
    public function update($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result){
            header("Location: index.php?msg=".urldecode("Data updated successfully"));
            exit();
        }else{
            die($this->link->errono).$this->link->error;
        }
    }

    public function deleteData($query){
        $result = $this->link->query($query) or die($this->link->error.__LINE__);
        if($result){
            header("Location: index.php?msg=".urldecode("Data deleted successfully"));
            exit();
        }else{
            die($this->link->errono).$this->link->error;
        }
    }
    
}