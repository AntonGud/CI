<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller
{


    public function index()
    {
        $this->auth_lib->check_admin();

        $this->load->model('comments_model');
        $this->load->model('pages_model');
        $this->load->model('sections_model');

        $data = array();

        // всего материалов
        $data['materials_count']   = $this->materials_model->count_all();

        // всего страниц
        $data['pages_count']       = $this->pages_model->count_all();

        // всего категорий
        $data['sections_count']    = $this->sections_model->count_all();

        // всего комментариев
        $data['comments_count']    = $this->comments_model->count_all();

        //популярные материалы
        $data['popular_materials'] = $this->materials_model->get_popular();

        //свежие комментарии
        $data['latest_comments']   = $this->comments_model->get_latest();

        $name = 'main_admin';
        $this->display_lib->admin_page($data,$name);
    }


    public function preferences()
    {
        $this->auth_lib->check_admin();

        //Если нажата кнопка "Сохранить настройки"
        if (isset($_POST['save_button']))
        {
            //Установка правил валидации
            $this->form_validation->set_rules($this->administration_model->preferences_rules);

            //Если валидация успешно пройдена
            if ($this->form_validation->run() == TRUE)
            {
                //Заносим в массив data полученные из формы переменные
                $data = array();
                $data['user_per_page']   = $this->input->post('user_per_page');
                $data['admin_per_page']  = $this->input->post('admin_per_page');
                $data['admin_login']     = $this->input->post('admin_login');
                $data['admin_pass']      = $this->input->post('admin_pass');

                foreach ($data as $key => $value)
                {
                    //Обновление в цикле для каждой настройки
                    $this->db->where('pref_id',$key);
                    //Второй параметр для update - массив (полю value присваиваем значение переменной $value)
                    $this->db->update('preferences',array('value' => $value));
                }

                $data = array('info' => 'Настройки сохранены');
                $this->display_lib->admin_info_page($data);
            }

            //Если валидация не пройдена
            else
            {
                $name = 'preferences';

                //Передаем пустой массив data, так как этого требует функция admin_page()
                $this->display_lib->admin_page($data = array(),$name);//
            }
        }

        //Кнопка "Сохранить настройки" не нажата: выводим просто форму с подставленными из базы данными (данные напрямую берутся в виде, что не совсем по правилам)
        else
        {
            $name = 'preferences';
            $this->display_lib->admin_page($data = array(),$name);
        }
    }



    public function login()
    {
        //Установка правил валидации
        $this->form_validation->set_rules($this->administration_model->login_rules);

        //Если валидация не пройдена
        if ($this->form_validation->run() == FALSE)
        {
            $this->display_lib->login_page();
        }

        //Если валидация пройдена, пытаемся войти
        else
        {
            $this->auth_lib->do_login($this->input->post('login'),$this->input->post('pass'));
        }
    }


    public function logout()
    {
        //Проверяем, был ли осуществлен вход
        $this->auth_lib->check_admin();
        $this->auth_lib->do_logout();
    }

}