<?php
include_once('DbConnection.php');

//start session
session_start();
 
class CheckUserDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    public function invalidUsername($username){
		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
    
	public function invalidEmail($email){
		$result;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}
	
	public function pwdMatch($password, $pwdrepeat){
		$result;
		if($password !== $pwdrepeat){
			$result = false;
		}
		else{
			$result = true;
		}
		return $result;
	}

    //Check Login Details
    public function check_login($username, $password){
 
        $sql = "SELECT * FROM tbl_users WHERE username = '$username'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();

            $hashedPwd = $row['password'];

            $checkPwd = password_verify($password, $hashedPwd);

            if($checkPwd == 1){

                $user_school_id = $row['id_number'];

                $sql_1 = "SELECT * FROM tbl_department_head WHERE school_id_number = '$user_school_id'";
                $query_1 = $this->connection->query($sql_1);
        
                if($query_1->num_rows > 0){
                    $row_1 = $query_1->fetch_array();

                    $_SESSION['department_id'] = $row_1['department_id'];   
                }

                $_SESSION['id_number'] = $row['id_number'];
                return $row['user_id'];
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
 
    //Check ID Number
    public function check_id_number($id_number){
 
        $sql = "SELECT * FROM tbl_users WHERE id_number = '$id_number'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['user_id'];
        }
        else{
            return false;
        }
    }

    //Check ID Number tbl_student
    public function check_id_number_student($id_number){
 
        $sql = "SELECT * FROM tbl_student WHERE school_id_number = '$id_number'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['school_id_number'];
        }
        else{
            return false;
        }
    }

    //Check ID Number tbl_student
    public function check_id_number_faculty($id_number){
 
        $sql = "SELECT * FROM tbl_faculty WHERE school_id_number = '$id_number'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['school_id_number'];
        }
        else{
            return false;
        }
    }

    //Check ID Number tbl_dh
    public function check_id_number_dh($id_number){
 
        $sql = "SELECT * FROM tbl_department_head WHERE school_id_number = '$id_number'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['school_id_number'];
        }
        else{
            return false;
        }
    }

    //Check Email
    public function check_email($email){
 
        $sql = "SELECT * FROM tbl_users WHERE email = '$email'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['user_id'];
        }
        else{
            return false;
        }
    }


    //Check Username
    public function check_username($username){
 
        $sql = "SELECT * FROM tbl_users WHERE username = '$username'";
        $query = $this->connection->query($sql);
 
        if($query->num_rows > 0){
            $row = $query->fetch_array();
            return $row['user_id'];
        }
        else{
            return false;
        }
    }

    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }

 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}