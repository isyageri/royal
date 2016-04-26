<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');

        $this->load->model('M_auth', 'db_auth');
    }

    public function index()
    {
        $this->session->sess_destroy();
        $this->load->view('user/login');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . "auth");
    }

    public function timeout()
    {
        $session_id = $this->session->userdata('name');
        if ($session_id == '' or $session_id == NULL) {
            $status = 'expired';
        } else {
            $status = 'success';
        }
        $data['status'] = $status;
        $this->status = $status;
        $this->load->view('templates/interval', $data);
    }

    public function login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $ip_address = $this->input->ip_address();
        //Returns TRUE if every character in text is either a letter or a digit, FALSE otherwise.
        if (ctype_alnum($username)) {
            $login = $this->db_auth->getUserLogin($this->security->xss_clean($username), $password);
            $r = $login->row_array();
            if ($login->num_rows() > 0 && $r['password'] == md5($password)) {

                 /*Jika cocok cek status
                set session dan update status*/
                $userdetail = $this->db_auth->getUserDetail($r['p_user_id']);
                if($userdetail['p_user_status_id'] <> 1){
                    $data['success'] = false;
                    $data['msg'] = "Username has been looked. Please contact your administrator!";
                    echo json_encode($data);
                }else{
                    $sessions = array(
                        'user_id' => $userdetail['p_user_id'],
                        'username' => $userdetail['username'],
                        'ip' => $ip_address,
                        'name' => $userdetail['full_name'],
                        'profile_name' => $userdetail['profile_name'],
                        'prof_id' => $userdetail['p_profile_id']
                    );

                    $this->session->set_userdata($sessions);
                    $this->db_auth->updateUserInformation($userdetail['p_user_id']);
                    $data['success'] = true;
                    $data['msg'] = "You will be direct .. !";
                    echo json_encode($data);
                }

            } else {
                echo json_encode(array('msg' => "Username atau Password salah !"));

            }

        } else {
            echo json_encode(array('msg' => "Disallow character"));
        }
    }


}
