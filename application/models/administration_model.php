<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration_model extends CI_Model
{


//правила для страницы настроек
    public $preferences_rules = array
    (
        array
        (
            'field' => 'admin_login',
            'label' => 'Логин',
            'rules' => 'alpha_dash|trim|required|max_length[50]'
        ),
        array
        (
            'field' => 'admin_pass',
            'label' => 'Пароль',
            'rules' => 'alpha_dash|trim|required|max_length[50]'
        ),
        array
        (
            'field' => 'user_per_page',
            'label' => 'Материалов на страницу',
            'rules' => 'required|numeric'
        ),
        array
        (
            'field' => 'admin_per_page',
            'label' => 'Материалов на страницу',
            'rules' => 'required|numeric'
        )
    );



//правила для страницы логина
    public $login_rules = array
    (
        array
        (
            'field' => 'login',
            'label' => 'Логин',
            'rules' => 'trim|required|alpha_dash|max_length[50]'
        ),
        array
        (
            'field' => 'pass',
            'label' => 'Пароль',
            'rules' => 'trim|required|alpha_dash|max_length[50]'
        )
    );


    public function __construct()
    {
        parent::__construct();
        $this->get_preferences();
    }



//Считывание настроек из базы в массив config для  дальнейшего использования
    public function get_preferences()
    {
        $query = $this->db->get('preferences');

        //Получаем переменную в массив со всеми настройками
        $preferences = $query->result_array();

        foreach ($preferences as $item)
        {
            $val = $item['value'];

            if(is_numeric($val))
            {
                settype($val,"int");
            }

            //Устанавливаем элементу значение
            $this->config->set_item($item['pref_id'],$val);
        }
    }

}
?>