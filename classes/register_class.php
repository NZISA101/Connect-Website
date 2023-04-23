<?php

class Signup
{

    private $error = "";
    
    public function evaluate($data)
    {
        foreach($data as $key => $value)
        {
            #code...
            if (empty($value))
            {
                $this->error = $this->error . $key ." is empty! <br>";
            }

            if ($key == "email")
            {
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $value)){
                    $this->error = $this->error . " Invalid Email <br>";
                }
                
            }
        }

        if($this->error == "")
        {
            $this->create_user($data);
        }
        else
        {
            return $this->error;
        }
    }

    public function create_user($data)
    {
        $fname = ucfirst($data['fname']);
        $lname = ucfirst($data['lname']);
        $gender = $data['gender'];
        $regnum = $data['regnum'];
        $dob = $data['dob'];
        $email = addslashes($data['email']);
        $phone = $data['phone'];
        $pass = md5($data['pass']);

        //Created by PHP
        $url_address = strtolower($fname) . "." . strtolower($lname);
        $user_id = $this->create_userid();

        $query = "INSERT INTO users
        (user_id, fname, lname, gender, regnum, dob, email, phone, pass, url_address)
        VALUES
        ('$user_id', '$fname', '$lname', '$gender', '$regnum', '$dob', '$email', '$phone', '$pass', '$url_address')";

        $DB = new Database();
        $DB->save($query);
    }

    private function create_userid()
    {
        $length = rand(4, 19);
        $number = "";
        
        for($i=0; $i< $length; $i++)
        {
            $new_rand = rand(0,9);

            $number = $number . $new_rand;
        }

        return $number;
    }
}

?>