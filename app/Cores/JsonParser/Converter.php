<?php
namespace Cores\JsonParser;

use Cores\JsonParser\Object\BaseProperty;
use Cores\JsonParser\Object\BaseObject;
use Cores\JsonParser\Object\ObjectConfig;


/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/7/14
 * Time: 10:10 AM
 */


class Converter
{
    public $is_error;
    public $error_message;
    public $property_level;
    public $object_structure;
    public $language;
    public $objects = array();
    public $class_index = 1;
    public $start_object_counter = 1;
    public $current_class_name;
    public $current_object;
    public $p_language_id;

    private $program_language_info_tag;
    private $json_string;

    function  __construct($language, $jsonString, $programLanguageInfoTag)
    {
        $this->language = $language;
        $this->json_string = $jsonString;
        $this->program_language_info_tag = $programLanguageInfoTag;
        $programing_object = new BaseObject($this->language, $this->program_language_info_tag);
        $this->p_language_id = $programing_object->p_language_id;
        $programing_object->CreateObject(ObjectConfig::$root_object_name, ObjectConfig::$root_object_name, ObjectConfig::$is_class);
        array_push($this->objects, $programing_object);
        $this->MoveToParent();
    }


    public function  JSONAnalyzer()
    {
        try {
            if (!$this->isJson($this->json_string)) {
                $this->is_error = true;
                return false;
            }
            $json_object = json_decode($this->json_string);

            $root_object = $this->objects[0];
            if (is_array($json_object)) {
                $root_object->is_display = false;
            } else if (is_object($json_object)) {
                // not do any thing here
            } else {
                $this->error_message = "Unknown json string, please send this json string to me";
                return false;
            }

            $this->jsonToObject($json_object, true);

            foreach ($this->objects as $obj) {
                $obj->GetClassString();
            }
            $duplicate_hash_body = array();
            $results = array();
            foreach ($this->objects as $object) {
                $body_hash = $object->body_hash;
                if (count($object->properties) == 0) {
                    $object->is_display = false;
                } else {
                    if (!in_array($body_hash, $duplicate_hash_body)) {

                        array_push($duplicate_hash_body, $body_hash);
                    } else {
                        $this->removeProperty($object->name);
                        $object->is_display = false;
                    }
                }
                if (!$object->is_display)
                    continue;
                array_push($results, $object->result);
            }

            return $results;
        } catch (Exception $ex) {
            $this->is_error = true;
            $this->error_message = $ex->getMessage();
            return false;
        }
    }


    private function jsonToObject($object)
    {
        $this->property_level++;
        $programing_object = null;
        foreach ($object as $key => $value) {

            if (is_array($value)) {
                $this->convertNextLevel(ObjectConfig::$is_array, $key, $value);
            } else if (is_object($value)) {
                $this->convertNextLevel(ObjectConfig::$is_class, $key, $value);
            } else {
                $current_object = $this->GetCurrentObject();
                //echo("input property $key  into: " .$current_object->name . "<br>");
                $current_object->CreateProperty($key, ObjectConfig::$is_build_in, $value);
            }
        }
    }


    private function insertObject($type, $name)
    {
        $programing_object = new BaseObject($this->language, $this->program_language_info_tag);
        $programing_object->level = $this->start_object_counter;
        $parent_object = $this->getParentObjectByLevel($programing_object->level);
        $parent_index = $parent_object->index;
        $obj_prop_count = 0;
        //echo  $this->start_object_counter - $parent_object->name;
        foreach ($parent_object->properties as $prop) {
            if ($prop->type != ObjectConfig::$is_build_in) {
                $obj_prop_count++;
            }
        }

        if ($obj_prop_count == 0) {
            $programing_object->parent_index = $parent_index + $obj_prop_count;
        } else {
            $first_child = $this->GetFirstChildObject($parent_object);
            $programing_object->parent_index = $first_child->parent_index;
        }
        $data = $this->getDisplayName($name);
        $display_name = $data["display_name"];
        $name = $data["name"];

        $this->start_object_counter++;
        $programing_object->CreateObject($name, $display_name, $type);
//        switch ($type) {
//            case ObjectConfig::$is_class:
//
//           //     $is_display = !$this->isObjectExist($programing_object->name);
//            //    $programing_object->is_display = $is_display;
//                break;
//            case ObjectConfig::$is_array:
//                $programing_object->CreateObject($name,$display_name,$type);
//                break;
//            default:
//                die("Cannot insert object");
//                break;
//        }

        $programing_object->index = count($this->objects);
        array_push($this->objects, $programing_object);
        $reference_object = $this->GetReference($name);
        if ($reference_object != null)
            $parent_object->CreateProperty($name, $type, $reference_object->display_name);
        else
            $parent_object->CreateProperty($name, $type);
        $this->class_index = $programing_object->parent_index + 1;
        $this->current_object = $programing_object;
    }


    private function isJson($jsonString)
    {
        json_decode($jsonString);
        $status = (json_last_error() == JSON_ERROR_NONE);
        if (!$status) {
            $this->error_message = "Invalid JSON";
        }
        return $status;

    }

//    private function  isObjectExist($new_object_name)
//    {
//        foreach ($this->objects as $object) {
//            $object_name = $object->name;
//            if (trim($object_name) == trim($new_object_name)) {
//                return true;
//            }
//        }
//        return false;
//    }

    private function  convertNextLevel($type, $key, $value)
    {
        $this->insertObject($type, $key);
        $this->jsonToObject($value);
        $this->property_level--;
        $this->start_object_counter--;

        if ($type == ObjectConfig::$is_array) {
            $current_object = $this->GetCurrentObject();
            $current_object->DetermineListDataType();
            $parent_object = $this->GetParentObject($current_object);
            $property = $this->GetPropertyByName($parent_object, $current_object->name);
            $property->data_type = $current_object->data_type;
        }
        $this->MoveToParent();
    }


    private function  getParentObjectByLevel($level)
    {
        $parent_level = $level - 1;
        $object_in_levels = array();
        foreach ($this->objects as $object) {
            if ($object->level == $parent_level) {
                array_push($object_in_levels, $object);
            }
        }
        return $object_in_levels[count($object_in_levels) - 1];
    }

    private function  getDisplayName($name)
    {
        if (is_numeric($name)) {
            $parent_object = $this->GetCurrentObject();
            if ($parent_object->type == ObjectConfig::$is_array && !empty($parent_object->name))
                $default_name = $parent_object->display_name;
            else
                $default_name = ObjectConfig::$default_class_name;
            $name = $default_name;
        }

        $need_update_name = false;
        $flag_name = $name;
        $index = 0;
        foreach ($this->objects as $obj) {
            if ($obj->is_display == false)
                continue;
            while ($obj->display_name === $flag_name) {
                $index++;
                if ($flag_name != $name) {
                    $flag_name = $name;
                }
                if (!$need_update_name)
                    $need_update_name = true;
                $flag_name .= $index;
            }
        }
        if ($need_update_name) {
            //$name = $flag_name;
        }

        return array("display_name" => $flag_name, "name" => $name);

        //return $name;

    }

    private function  removeProperty($remove_property_name)
    {
        foreach ($this->objects as $object) {
            foreach ($object->properties as $property) {
                if (trim($property->name) == trim($remove_property_name)) {
                    $property->is_display = false;
                }
            }
        }
    }

    public function  MoveToParent()
    {
        if ($this->current_object == null)
            $this->current_object = $this->objects[0];
        else
            $this->current_object = $this->GetParentObject($this->current_object);

    }

    public function  GetCurrentObject()
    {
        return $this->current_object;
    }


    public function  GetFirstChildObject($parent_object)
    {
        $index = $parent_object->index;
        foreach ($this->objects as $obj) {
            if (!is_numeric($obj->parent_index))
                continue;
            if ($index == $obj->parent_index)
                return $obj;

        }
    }

    public function  GetParentObject($obj)
    {
        if (isset($this->objects[$obj->parent_index]))
            return $this->objects[$obj->parent_index];
        die("Cannot get parent object $obj->name at $obj->parent_index");
    }


    public function  GetPropertyByName($object, $name)
    {
        foreach ($object->properties as $property) {
            if ($property->name == $name)
                return $property;
        }
        die("Cannot get property $name in  $object->name");
    }

    public function  GetReference($name)
    {
        foreach ($this->objects as $object) {
            if ($object->name === $name) {
                return $object;
            }
        }

        return null;
    }


}