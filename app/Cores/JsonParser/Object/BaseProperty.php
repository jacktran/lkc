<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/7/14
 * Time: 3:16 PM
 */
namespace Cores\JsonParser\Object;

class BaseProperty extends BaseObject
{

    public $result;
    public $access_modifier;
    public $build_in_data_types;
    public $data_type;
    public $name;
    public $property_end_sign;
    public $is_display;
    public $value;
    public $type;
    public $language;


    function  __construct($language, $data_types)
    {

        $this->property_end_sign = ";";
        $this->build_in_data_types = $data_types;
        $this->language = $language;
    }

    public function  create($name, $access_modifier, $value, $type)
    {

        // set property's data type
        switch ($type) {
            case ObjectConfig::$is_array:
                $data_type = ObjectConfig::$is_empty;
                break;
            case ObjectConfig::$is_class:
                if (ObjectConfig::$is_reference)
                    $data_type = $value;
                else
                    $data_type = $this->getBuildInDataType();
                break;
            case ObjectConfig::$is_build_in:
                $this->value = $value;
                $data_type = gettype($value);
                $data_type = $this->getBuildInDataType($data_type);
                break;
            default:
                die("type of this property was not defined ($type)");
                break;
        }
        $this->type = $type;
        $this->data_type = $data_type;
        $this->is_display = true;
        $this->name = $name;
        $this->access_modifier = $access_modifier;

    }

} 