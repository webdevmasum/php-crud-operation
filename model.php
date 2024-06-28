<?php

class Model{
    private $servername='localhost';
    private $username ='root';
    private $password ='';
    private $dbname ='students';
    private $con;

    function __construct(){
        $this->con = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        if($this->con->connect_error){
            echo 'Connection Failed';
        }else{
            return $this->con;
        }
    }//construct close

    /* insert fumction define here */
    public function insertRecord($post){
        // echo 'Insert function calld';
        $name =$post['name'];
        $email =$post['email'];
        $phone =$post['phone'];
        $sql = "INSERT INTO student(name,email,phone)VALUES('$name','$email','$phone')";
        $result = $this->con->query($sql);

        if($result){
            header('location:index.php?msg=ins');
        }else{
            echo "Error".$sql."<br/>".$this->con->error;
        }
    }// insert function closed

    /* update fumction define here */
    public function updateRecord($post){
        // echo 'Insert function calld';
        $name =$post['name'];
        $email =$post['email'];
        $phone =$post['phone'];
        $editid =$post['hid'];
        $sql = "UPDATE student SET name='$name',email='$email',phone='$phone' WHERE id='$editid'";
        $result = $this->con->query($sql);

        if($result){
            header('location:index.php?msg=ups');
        }else{
            echo "Error".$sql."<br/>".$this->con->error;
        }
    }// update function closed

    //delete function define here
    public function deleteRecord($delid){
        $sql ="DELETE FROM student WHERE id= '$delid'";
        $result = $this->con->query($sql);
        if($result){
            header('location:index.php?msg=del');
        }else{
            echo "Error".$sql."<br/>".$this->con->error;
        }

    }


    public function displayRecord(){
        $sql = "SELECT * FROM student";
        $result= $this->con->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $data[] =$row;
            }//while close
            return $data;
        }//if close
    }// display record closed

    public function displayRecordById($editid){
        $sql = "SELECT * FROM student WHERE id= '$editid'";
        $result = $this->con->query($sql);
        if($result->num_rows==1){
            $row = $result->fetch_assoc();
            return $row;
        }//if closed
    }// displayrecordbyid closed


}//class close

?>