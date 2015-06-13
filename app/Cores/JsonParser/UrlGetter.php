<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 1/11/15
 * Time: 11:12 AM
 */
    class UrlGetter
    {
        public $is_error = false;

        public  $time_out;

        function source($url,$time_out = 5)
        {
            try
            {
                $this->time_out = $time_out;
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->time_out);
                $data = curl_exec($ch);
                curl_close($ch);
                return $data;
            }
            catch(Exception $ex)
            {
                $this->is_error = true;
                return $ex->getMessage();
            }

        }
    }

?>