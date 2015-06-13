<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/7/14
 * Time: 11:47 AM
 */
namespace Cores\JsonParser\Object;

use Cores\JsonParser\Object\BaseProperty;
use Cores\JsonParser\Object\ObjectConfig;

class BaseObject
{

    public $parent_index;

    public $index;

    public $level = 0;

    public $result;

    public $class_keyword;

    public $name;

    public $display_name;

    public $selected_access_modifier;

    public $empty_parameter;

    public $class_open_sign;

    public $class_close_sign;

    public $data_type;

    public $build_in_data_types;

    public $language;

    public $p_language_id;

    public $name_pattern;

    public $type;

    public $properties = array();

    public $is_display = true;

    public $body_hash;

    private $pLanguageRepository;

    private $dataTypeRepository;

    private $accessModifierRepository;

    private $dataTypeKeyRepository;

    private $collectionRepository;


    function  __construct($language, $programLanguageInfoTag)
    {

        $this->language = $language;

        $this->dataTypeRepository = $programLanguageInfoTag[0];
        $this->pLanguageRepository = $programLanguageInfoTag[1];
        $this->accessModifierRepository = $programLanguageInfoTag[2];
        $this->dataTypeKeyRepository = $programLanguageInfoTag[3];
        $this->collectionRepository = $programLanguageInfoTag[4];

        $language_info = $this->pLanguageRepository->getPLanguageByName($this->language);
        if (ObjectConfig::$language_id == 0) {
            ObjectConfig::$language_id = $language_info["id"];
            ObjectConfig::$class_name_pattern = $language_info["name_pattern"];
            ObjectConfig::$class_structure = $language_info["structure"];
            ObjectConfig::$is_reference = $language_info["is_reference"];
            ObjectConfig::$root_object_name = $language_info["root_name"];
        }

        $this->name_pattern = ObjectConfig::$class_name_pattern;
        $this->p_language_id = ObjectConfig::$language_id;

        ObjectConfig::$build_in_data_types = $this->dataTypeRepository->getDataTypesByLanguageId($this->p_language_id);
        ObjectConfig::$access_modifiers = $this->accessModifierRepository->getAccessModifiersByLanguageId($this->p_language_id);
        ObjectConfig::$collections = $this->collectionRepository->getCollectionsByLanguageId($this->p_language_id);

    }

    public function  CreateObject($name, $display_name, $object_type)
    {

        switch ($this->name_pattern) {
            case ObjectConfig::$upper_camel_case:
                $this->display_name = $display_name;
                break;
            case ObjectConfig::$normal_case:
                $this->display_name = ucfirst($display_name);
                break;
            default:
                die("This name pattern was not supported [" . $this->name_pattern . "]");
                break;
        }

        switch ($object_type) {
            case ObjectConfig::$is_array:
                $this->type = ObjectConfig::$is_array;
                $this->name = ObjectConfig::$start_array_name_sign . $name;
                $this->is_display = false;
                break;
            case ObjectConfig::$is_class:
                $this->type = ObjectConfig::$is_class;
                $this->name = $name;
                $this->selected_access_modifier = $this->getAccessModifier();
                break;
            default:
                die("This object type was not defined");
                break;
        }

    }


    public function  CreateProperty($name, $type, $value = "")
    {
        $property = new BaseProperty($this->language, $this->build_in_data_types);
        $access_modifier = $this->getAccessModifier();
        $property->create($name, $access_modifier, $value, $type);
        array_push($this->properties, $property);
    }


    public function  DetermineListDataType()
    {
        if ($this->type == ObjectConfig::$is_array) {
            $flag_data_type = ObjectConfig::$is_empty;
            foreach ($this->properties as $property) {
                $current_data_type = $property->data_type;
                // if data type of property 1 = data type of property n => data type is data type of first property
                // if data type of property 1 != data type of property n => data type is object

                if (!empty($flag_data_type) && $flag_data_type != $current_data_type) {
                    $flag_data_type = $this->getBuildInDataType("object");
                    break;
                }
                $flag_data_type = $current_data_type;
            }
            $collection = $this->getDefaultCollection();
            if (str_contains($collection, "?"))
                $flag_data_type = htmlspecialchars(str_replace("?", $flag_data_type, $collection));

            $this->data_type = $flag_data_type;
        }

    }


    protected function  getBuildInDataType($key = "")
    {
        $data_types = ObjectConfig::$build_in_data_types;
        $object_type = null;
        if (array_key_exists($key, $data_types))
            return $data_types[$key];
        else
            return $data_types[ObjectConfig::$default_key];

    }


    public function  GetClassString()
    {
        $structure = ObjectConfig::$class_structure;
        $keywords = $this->getKeywords($structure);
        $prop_pattern = $this->getPropertyPattern($structure);
        $double_prop_pattern = $prop_pattern . " \r\n &#09;" . $prop_pattern;
        $class_keywords = $keywords["classes"];
        $prop_keywords = $keywords["props"];

        foreach ($class_keywords as $keyword) {
            switch ($keyword) {
                case ObjectConfig::$class_access_modifier:
                    $structure = str_replace($keyword, $this->selected_access_modifier, $structure);
                    break;
                case ObjectConfig::$class_name:
                    $structure = str_replace($keyword, $this->name, $structure);
                    break;

            }
        }

        $prop_count = count($this->properties);
        for ($index = 0; $index < $prop_count; $index++) {
            //add more property pattern into object structure
            if ($index < $prop_count - 1) {
                $structure = str_replace($prop_pattern, $double_prop_pattern, $structure);
            }

            // remove property sign ex: @
            $structure = $this->str_replace_limit(ObjectConfig::$prop_sign, "", $structure, 2);
            $property = $this->properties[$index];
            foreach ($prop_keywords as $keyword) {
                switch ($keyword) {
                    case ObjectConfig::$prop_access_modifier:
                        $structure = $this->str_replace_limit($keyword, $property->access_modifier, $structure, 1);
                        break;
                    case ObjectConfig::$prop_name:
                        $structure = $this->str_replace_limit($keyword, $property->name, $structure, 1);
                        break;
                    case ObjectConfig::$prop_data_type:
                        $structure = $this->str_replace_limit($keyword, $property->data_type, $structure, 1);
                        break;
                }
            }
        }
        $this->body_hash = hash(ObjectConfig::$hash_type, $structure);
        $this->result = $structure;

    }


    function str_replace_limit($search, $replace, $subject, $limit)
    {
        $limit = $limit + 1;
        return implode($replace, explode($search, $subject, $limit));
    }

    private function  getAccessModifier($access_modifier_key = "")
    {
        if (empty($access_modifier_key))
            $access_modifier_key = ObjectConfig::$default_key;
        return ObjectConfig::$access_modifiers[$access_modifier_key];
    }

    private function getKeywords($structure)
    {
        $pattern = ObjectConfig::$get_structure_keyword_regex;
        preg_match_all($pattern, $structure, $matches);
        $keywords = $matches[0];
        $full_keys = array();
        $class_keys = array();
        $prop_keys = array();
        foreach ($keywords as $keyword) {
            if (starts_with($keyword, ObjectConfig::$start_class_prefix)) {
                array_push($class_keys, $keyword);
            } else if (starts_with($keyword, ObjectConfig::$start_prop_prefix)) {
                array_push($prop_keys, $keyword);
            }
        }
        $full_keys["classes"] = $class_keys;
        $full_keys["props"] = $prop_keys;
        return $full_keys;
    }


    private function  getPropertyPattern($structure)
    {
        $pattern = ObjectConfig::$get_prop_pattern_regex;
        preg_match($pattern, $structure, $matches);
        if (empty($matches))
            die("Cannot get property pattern");
        return $matches[0];
    }


    private function  getDefaultCollection()
    {

        for ($index = 0; $index < count(ObjectConfig::$collections); $index++) {
            $collection = ObjectConfig::$collections[$index];
            $collection_name = $collection["name"];
            if ($collection["is_default"]) {
                return $collection_name;
            }
        }
        die("Cannot get default collection");
    }


//    private function  loadBuildInDataTypes()
//    {
//        if (empty(ObjectConfig::$build_in_data_types))
//            ObjectConfig::$build_in_data_types = DataType::getDataTypesByLanguageId($this->p_language_id);
//        if (empty(ObjectConfig::$build_in_data_types))
//            die("Cannot load data types");
//    }
//
//    private function  loadAccessModifiers()
//    {
//        if (empty(ObjectConfig::$access_modifiers))
//            ObjectConfig::$access_modifiers = AccessModifier::getAccessModifierByLanguageId($this->p_language_id);
//        if (empty(ObjectConfig::$access_modifiers))
//            die("Cannot load access modifiers");
//
//    }
//
//    private function  loadCollections()
//    {
//        if (empty(ObjectConfig::$collections))
//            ObjectConfig::$collections = Collection::getCollectionsByLanguageId($this->p_language_id);
//        if (empty(ObjectConfig::$collections))
//            die("Cannot load collections");
//    }


} 