<?php
/**
 * Created by PhpStorm.
 * User: AK
 * Date: 10/30/2014
 * Time: 1:59 AM
 */

class Module_Generator {
    private $view;
    private $model;


    function __construct($view, $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    function generate(){
        $err = false;
        if(isset($_POST["num"]) AND is_numeric($_POST["num"])){
            $max=(int)$_POST["num"];
            if($max>100) {
                $data['err'] = "Length must be less then 101 chars";
                $err = true;
            } else if($max<1){
                $data['err'] = "Length must be at least 1 char";
                $err = true;
            }
        } else {
            $data['err'] = "Length error";
            $err= true;
        }
        if(!$err) {
            if (isset($_POST["anum"])) {
                $chars = '23456789';
            }


            if (isset($_POST["acap"])) {
                $chars .= 'QWERTYUIPASDFGHJKLZXCVBNM';
            }


            if (isset($_POST["alit"])) {
                $chars .= 'qwertyuiopasdfghjkzxcvbnm';
            }

            // Символы, которые будут использоваться в пароле.

            $size = StrLen($chars) - 1;

            $done = null;

            $this->model->db_init();

            while (!$done) {

                $max_cur = $max;
                $password = null;

                while ($max_cur--)
                    $password .= $chars[rand(0, $size)];

                if ($this->model->check_pass($password) === true) {
                    $done = true;
                } else {
                    $done = false;
                }
            }

            $data['password'] = $password;
        } // err check end
        return $data;
    }


} 