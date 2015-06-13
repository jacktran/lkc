<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/11/15
 * Time: 11:28 AM
 */

class SuperGlobal {


    public  static function is_valid_url($url)
    {
        if(!filter_var($url, FILTER_VALIDATE_URL))
        {
            return false;
        }
        else
        {
            return true;
        }
    }

} 