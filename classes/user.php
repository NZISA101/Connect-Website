<?php
class User
{
    public function get_data($id)
    {
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result) 
        {
            $row = $result[0];
            return $row;
        }
        else
        {
            return false;
        }
    }

    public function get_user($id)
    {
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result[0];
        }
        else
        {
            return false;
        }
    }

    public function get_friends($id)
    {
        $query = "SELECT * FROM users WHERE user_id != '$id'";

        $DB = new Database();
        $result = $DB->read($query);

        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }

}