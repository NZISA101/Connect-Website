<?php

class Profile
{
    function get_profile($id)
    {
        $id = addslashes($id);//protects the id from SQL injections
        $DB = new Database();
        $query = "SELECT * FROM users WHERE user_id = '$id' limit 1";
        return $DB->read($query);
    }

}