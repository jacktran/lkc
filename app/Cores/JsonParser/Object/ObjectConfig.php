<?php


/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 12/13/14
 * Time: 9:22 PM
 */


namespace Cores\JsonParser\Object;

class ObjectConfig
{
    public  static  $class_access_modifier = "[C:AccessModifier]";
    public  static  $class_name = "[C:Name]";
    public  static  $prop_access_modifier = "[P:AccessModifier]";
    public  static  $prop_data_type = "[P:DataType]";
    public  static  $prop_name = "[P:Name]";
    public  static  $upper_camel_case = "UpperCamelCase";
    public  static  $normal_case = "NormalCase";

    public  static  $language_id = 0;
    public  static  $class_name_pattern = "";

    public  static  $default_access_modifier_key = "_default";
    public  static  $build_in_data_types ;
    public  static  $access_modifiers ;
    public  static  $collections;

    public static $default_class_name = "default_name";

    public static $break_line = "<br>";

    public static $space = "&nbsp";

    public static $tab = "&#09;";

    public  static  $less_sign = "&lt;";

    public  static  $greater_sign = "&gt;";

    public static $php_root_object_name = "root_object";

    public  static  $root_object_name = "RootObject";

    public  static  $hash_type = "ripemd160";

    public  static  $start_class_prefix = "[C:";

    public  static  $start_prop_prefix = "[P:";

    public  static  $prop_sign = "@";

    public  static  $get_structure_keyword_regex =  "/\[.*?\]/";

    public  static  $get_prop_pattern_regex = "/\@.*?\@/";

    public  static  $class_structure = "";



    public  static  $is_reference = false;

    //public  static



    public  static  $start_array_name_sign = "";

    public static $is_empty = "";

    //programing languages
    public static $csharp = "CSharp";

    public static $php = "PHP";

    public  static  $java = "Java";

    //object type
    public static $is_class = "class";

    public static $is_array = "array";

    public  static  $is_build_in = "build_in";

    //access modifiers
    public static $public = "public";

    public static $private = "private";

    public static $internal = "internal";

    public static $protected = "protected";

    public static $empty_access_modifier = "empty";

    public static $default_key = "_default";

    //build-in data types (C# Reference http://msdn.microsoft.com/en-us/library/ya5y69ds.aspx)
    public static $boolean = "boolean";

    public static $byte = "byte";

    public static $sbyte = "sbyte";

    public static $char = "char";

    public static $decimal = "decimal";

    public static $double = "double";

    public static $float = "float";

    public static $integer = "integer";

    public static $uint = "uint";

    public static $ulong = "ulong";

    public static $short = "short";

    public static $ushort = "ushort";

    public static $string = "string";

    public  static  $object = "object";

    public  static  $null = "null";

    public static $php_data_type = "$";

    //List
    public  static  $list =  "list";

    public  static  $list_object =  "list_object";




    public static function getAccessModifiers($lang,$type)
    {
        if (self::$access_modifiers == null || count(self::$access_modifiers) == 0) {
            self::$access_modifiers = array
            (
                self::$java => array
                (
                    self::$default_key => self::$public,
                    self::$empty_access_modifier => self::$is_empty,
                    self::$public => self::$public,
                    self::$private => self::$private,
                    self::$protected => self::$protected
                ),
                self::$csharp => array
                (
                    self::$default_key => self::$public,
                    self::$empty_access_modifier => self::$is_empty,
                    self::$public => self::$public,
                    self::$private => self::$private,
                    self::$internal => self::$internal,
                    self::$protected => self::$protected
                ),
                self::$php => array
                (
                    self::$default_key => self::$public,
                    self::$empty_access_modifier => self::$is_empty,
                    self::$public => self::$public,
                    self::$private => self::$private,
                    self::$protected => self::$protected
                ),
            );
        }
        if (isset(self::$access_modifiers[$lang][$type]))
            return self::$access_modifiers[$lang][$type];
        else
            die("access modifiers of this language was not defined");
    }

    public  static  function  getListObject($lang,$type)
    {
        if(self::$collections == null || count(self::$collections) == 0)
        {
            self::$collections = array
            (
                self::$java=>array
                (
                    self::$list => "List",
                    self::$list_object => "List<%s>",
                ),
                self::$csharp =>array
                (
                    self::$list => "List",
                    self::$list_object =>"List<%s>",
                ),
                self::$php => array
                (
                    self::$list => "array",
                ),
            );
        }
        if (isset(self::$collections[$lang][$type]))
            return self::$collections[$lang][$type];
        else
            die("This object type was not defined $type");
    }




//    public static function  getBuildInDataType($lang,$type)
//    {
//        $type = strtolower($type);
//        if (self::$build_in_data_types == null || count(self::$build_in_data_types) == 0) {
//            switch($lang)
//            {
//                case  self::$csharp;
//                    self::$build_in_data_types = array
//                    (
//                        self::$csharp => array
//                        (
//                            self::$boolean => "bool",
//                            self::$byte => self::$byte,
//                            self::$sbyte => self::$sbyte,
//                            self::$char => self::$char,
//                            self::$decimal => self::$decimal,
//                            self::$double => self::$double,
//                            self::$float => self::$float,
//                            self::$integer => "int",
//                            self::$null =>self::$null,
//                            self::$uint => self::$uint,
//                            self::$ulong => self::$ulong,
//                            self::$short => self::$short,
//                            self::$ushort => self::$ushort,
//                            self::$string => self::$string,
//                            self::$object => self::$object,
//                        ),
//                    );
//                    break;
//                case self::$java:
//                    self::$build_in_data_types = array
//                    (
//                        self::$java => array
//                        (
//                            self::$boolean => "boolean",
//                            self::$byte => self::$byte,
//                            self::$char => self::$char,
//                            self::$double => self::$double,
//                            self::$float => self::$float,
//                            self::$integer => "int",
//                            self::$null =>self::$null,
//                            self::$short => self::$short,
//                            self::$string => ucfirst(self::$string),
//                        ),
//                    );
//                    break;
//            }
//
//        }
//        if ($lang == self::$php)
//            return self::$php_data_type;
//        if (isset(self::$build_in_data_types[$lang][$type]))
//        {
//            return self::$build_in_data_types[$lang][$type];
//        }
//        else
//            die("build-in data of this language was not defined ($type)");
//
//    }



}