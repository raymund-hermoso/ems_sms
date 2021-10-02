<?php
include_once('DbConnection.php');
 
class CheckUserDetails extends DbConnection{
 
    public function __construct(){
 
        parent::__construct();
    }

    function invalidUsername($username){
		$result;
		if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	function invalidEmail($email){
		$result;
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
	
	function pwdMatch($password, $pwdrepeat){
		$result;
		if($password !== $pwdrepeat){
			$result = true;
		}
		else{
			$result = false;
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
    

    //Check Password
    // public function check_password($password){
 
    //     $sql = "SELECT * FROM tbl_users";
    //     $query = $this->connection->query($sql);

    //     $hashedPwd = array();
            
    //     while($row = mysqli_fetch_assoc($query)){

    //         $hashedPwd[] = $row['password'];

    //         $checkPwd = password_verify($password, $hashedPwd);

    //         if($checkPwd == 1){
    //             return $row['id'];
    //         }
    //         else{
    //             return false;
    //         }
    //     }
    // }
 
    public function details($sql){
 
        $query = $this->connection->query($sql);
 
        $row = $query->fetch_array();
 
        return $row;       
    }
 
    public function escape_string($value){
 
        return $this->connection->real_escape_string($value);
    }
}