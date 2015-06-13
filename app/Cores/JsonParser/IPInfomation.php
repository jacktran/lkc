<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/23/14
 * Time: 10:04 AM
 */

class IPInfomation
{

    public $Message;

    function Get($ip = NULL, $purpose = "location", $deep_detect = TRUE)
    {

        try {
            $output = NULL;
            if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
                $ip = $this->GetIP();
                if ($ip == "unknow") {
                    $this->Message = "Cannot define your ip address";
                    return false;
                }

                if ($deep_detect) {
                    if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
            }
            $purpose = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
            $support = array("country", "countrycode", "state", "region", "city", "location", "address");

            $continents = array(
                "AF" => "Africa",
                "AN" => "Antarctica",
                "AS" => "Asia",
                "EU" => "Europe",
                "OC" => "Australia (Oceania)",
                "NA" => "North America",
                "SA" => "South America"
            );
            if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
                $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));

                if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                    switch ($purpose) {
                        case "location":
                            $output = array(
                                "IP" => $ip,
                                "City" => @$ipdat->geoplugin_city,
                                "State" => @$ipdat->geoplugin_regionName,
                                "Country" => @$ipdat->geoplugin_countryName,
                                "Country Code" => @$ipdat->geoplugin_countryCode,
                                "Continent Code" => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                                "Latitude" => @$ipdat->geoplugin_latitude,
                                "Longitude" => @$ipdat->geoplugin_longitude,
                                "Currency Code" => @$ipdat->geoplugin_currencyCode,
                                "Currency Symbol" => @$ipdat->geoplugin_currencySymbol_UTF8,
                                "Currency Converter" => @$ipdat->geoplugin_currencyConverter,
                            );
                            break;
                        case "address":
                            $address = array($ipdat->geoplugin_countryName);
                            if (@strlen($ipdat->geoplugin_regionName) >= 1)
                                $address[] = $ipdat->geoplugin_regionName;
                            if (@strlen($ipdat->geoplugin_city) >= 1)
                                $address[] = $ipdat->geoplugin_city;
                            $output = implode(", ", array_reverse($address));
                            break;
                        case "city":
                            $output = @$ipdat->geoplugin_city;
                            break;
                        case "state":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "region":
                            $output = @$ipdat->geoplugin_regionName;
                            break;
                        case "country":
                            $output = @$ipdat->geoplugin_countryName;
                            break;
                        case "countrycode":
                            $output = @$ipdat->geoplugin_countryCode;
                            break;
                    }
                }
            }

            return $output;
        } catch (Exception $ex) {

            $this->Message = $ex->getMessage();
            return false;
        }

    }

    function GetIP()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe

                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return  "unknow";
    }
} 