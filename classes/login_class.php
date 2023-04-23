<?php

class Login
{
    private $error = "";

    

    public function evaluate($data)
    {
        $email = addslashes($data['email']);
        $pass = md5($data['pass']);
        

        $query = "SELECT * FROM users WHERE email = '$email' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            $row = $result[0];

            if($pass == $row['pass'])
            {
                //Create Session Data
                $_SESSION['connect_user_id'] = $row['user_id'];
            }
            else
            {
                $this->error .= "Wrong Email or Password<br>";
                $this->error .= "Try Again<br><br>";
            }
        }
        else
        {
            $this->error .= "Wrong Email or Password<br>";
            $this->error .= "Try Again<br><br>";
        }

        return $this->error;
    }

    public function check_login($id)
    {
        if(is_numeric($id))
        {
            $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

            $DB = new Database();
            $result = $DB->read($query);

            if($result)
            {
                $user_data = $result[0];
                return $user_data;
            }
            else
            {
                header("Location: login.php");
                die;
            }

        }
        else
        {
            header("Location: login.php");
            die;
        }
    }

}