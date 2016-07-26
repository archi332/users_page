<?php

class Validation
{

    /**
     * @param array $array
     * @return array|null
     * @list max_length, min_length, precision, valid_email
     */
    function check_valid($array = [])
    {
        foreach ($array as $key => $value) {

            $field_name = $value['field_name'];
            unset($value['field_name']);

            foreach ($value as $k => $val) {
                $error = $this->$k($_POST[$key], $val, $field_name);
                if (!empty($error)) $errors_v[] = $error;
            }
        }
        return (isset($errors_v)) ? $errors_v : null;
    }

    /**
     * @param $string
     * @param $length
     * @param $field_name
     * @return string
     */
    function max_length($string, $length, $field_name)
    {
        return (mb_strlen($string) > $length) ? "Field `{$field_name}` is too long! It must be less than {$length} chars!" : '';
    }

    /**
     * @param $string
     * @param $length
     * @param $field_name
     * @return string
     */
    function min_length($string, $length, $field_name)
    {
        return (mb_strlen($string) < $length && $string) ? "Field `{$field_name}` is too short! It must be more than {$length} chars!" : '';
    }

    /**
     * @param $string
     * @param bool|false $status
     * @param $field_name
     * @return string
     */
    function precision($string, $status = false, $field_name)
    {
        if ($status === true) {
            return (!$string) ? "Field `{$field_name}` is not isset!" : '';
        } else {
            return '';
        }
    }

    /**
     * @param $email
     * @param bool|false $status
     * @param $field_name
     * @return string
     */
    function valid_email($email, $status = false, $field_name)
    {
        if ($status === true) {
            return (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Field `{$field_name}` is not correct!" : '';
        } else {
            return '';
        }
    }

    /**
     * @param $date
     * @param bool|false $status
     * @param $field_name
     * @return string
     */
    function valid_date($date, $status = false, $field_name)
    {
        if ($status === true) {
            $regularka = "/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/";
            return (!preg_match($regularka, $date)) ? "Field {$field_name} is incorrect!" : '';
        } else {
            return '';
        }
    }

    /**
     * @param $cur_date
     * @param $max_date
     * @param $field_name
     * @return string
     */
    function max_date($cur_date, $max_date, $field_name)
    {
        $cur_date = explode("-", $cur_date);
        $max = explode("-", $max_date);

        $i = 0;
        if ($cur_date[$i] > $max[$i]) {
            return "Value field `{$field_name}`, must be  earlier than $max_date";

        } elseif ($cur_date[$i] == $max[$i]) {
            $i++;
            if ($cur_date[$i] > $max[$i]) {
                return "Value field `{$field_name}`, must be  earlier than $max_date";

            } elseif ($cur_date[$i] == $max[$i]) {
                $i++;
                echo $cur_date[$i] . '--' . $max[$i];

                if ($cur_date[$i] > $max[$i]) {
                    return "Value field `{$field_name}`, must be  earlier than $max_date";
                }
            }
        }

    }

    /**
     * @param $value
     * @param bool|false $status
     * @param $field_name
     * @return string
     */
    function numeric($value, $status = false, $field_name)
    {
        if ($status === true) {
            return (!is_numeric($value)) ? "Field `{$field_name}`, must be  numeric!" : '';
        }
    }

    /**
     * @param $rules array
     * @return array|null
     */
    function check_valid_img($rules)
    {
        foreach ($rules as $key => $value){

            $field_name = $value['field_name'];
            unset($value['field_name']);

            foreach ($value as $k => $val) {

                $error = $this->$k($_FILES['foto_name'][$key], $val, $field_name);
                if (!empty($error)) $errors_v[] = $error;

            }

        }

        return (isset($errors_v)) ? $errors_v : null;

    }

    /**
     * @param $name
     * @param $types
     * @param $field_name
     * @return string
     */
    function type_img($name, $types, $field_name)
    {
        $type = explode(".", $name);
        $type = $type[count($type)-1];

        return (!@strstr($types, $type) && $name) ? "Type of file `{$field_name}` is incorrect! Please load {$types} file!" : '';


    }

    /**
     * @param $cur_size
     * @param $max_size
     * @param $field_name
     * @return string
     */
    function max_file_size($cur_size, $max_size, $field_name)
    {

        $max_size_b = $max_size * 1024;

        return ($cur_size > $max_size_b) ? "Size of file in the field `{$field_name}` is more than {$max_size} Kb!" : '';

    }
}