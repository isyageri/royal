<?php
class M_client extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->helper('sequence');
    }

    public function approve(){
        $account_id = (int)$this->input->post('account_id');


        $this->db->trans_begin();
        $this->db->where('AccountID',$account_id);
        $this->db->set('status',1);
        $this->db->update('c_user');

        /*----------------- Send email ---------------*/
        $email = $this->getAccountByID($account_id)->Email;
        $password = $this->getUserByID($account_id)->passwd;
        $UserID = $this->getUserByID($account_id)->UserID;
        $to = trim($email);

        $subject = 'RIB Account';
        $sender = 'Admin RIB';
        $sender_name = 'Royal Investment Business';
        $message = "Now that you're an awesome member of The Royal Investment and Business, you can login to your account at <a href='http:www.rib.company/chome/Login' target='_blank'></a> with the email and password below
                            <br>
                            <br>
                            Username : <strong>".$UserID." </strong>
                            <br>
                            Password : <strong>" .$this->encrypt->decode($password)." </strong>
                            <br>
                            <br>
                            Now you can make deposit to active your account.
                            <br>
                            How to Deposit ?
                            <br>
                            1. Login into your account.
                            <br>
                            2. Click <strong>Deposit Funds</strong> in <strong>Funds Transfer</strong> menu.
                            <br>
                            3. Click button <strong>New Deposit</strong>.
                            <br>
                            4. Fill Deposit form with valid data.
                            <br>
                            5. Click button <strong>Confirm</strong> and upload your Transfer Evidence
                            <br>
                            6. Please wait for Admin confirmation. Max 3x24 jam
                            <br>
                            <br>
                            <br>
                            For more Information : <strong>support@rib.company</strong>";

        // Sent Mail
        $this->send_email($to, $message, $subject, $sender, $sender_name);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $status['success'] = true;
            $status['message'] = "1 user has been approved";
            echo json_encode($status);
            $this->db->trans_commit();
        }
    }

    public function reject(){
        $account_id = (int)$this->input->post('account_id');
        $reason = trim(ucfirst($this->input->post('reason')));


        $this->db->trans_begin();
        $this->db->where('AccountID',$account_id);
        $this->db->set('status',3);
        $this->db->update('c_user');

        /*----------------- Send email ---------------*/
        $email = $this->getAccountByID($account_id)->Email;
        $name = $this->getAccountByID($account_id)->FirstName;
        $to = trim($email);

        $subject = 'Registration Failed';
        $sender = 'Admin RIB';
        $sender_name = 'Royal Investment Business';
        $message = " Dear <strong> ".$name." ,</strong>
                            <br>
                            <br>
                            Sorry we can not accept your registration for following reason
                            <br>
                             <strong>".$reason." </strong>
                            <br>
                            <br>
                            Please re-registration with valid data
                            <br>
                            <br>
                            <br>
                            For more Information : <strong>support@rib.company</strong>";

        // Sent Mail
        $this->send_email($to, $message, $subject, $sender, $sender_name);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $status['success'] = true;
            $status['message'] = "1 user has been rejected";
            echo json_encode($status);
            $this->db->trans_commit();
        }
    }

    public function getAccountByID($account_id)
    {
        $this->db->where('AccountID', $account_id);
        $query = $this->db->get('account');

        if ($query->num_rows() > 0) {
            return $row = $query->row();
        }

    }

    public function getUserByID($account_id)
    {
        $this->db->where('AccountID', $account_id);
        $query = $this->db->get('c_user');

        if ($query->num_rows() > 0) {
            return $row = $query->row();
        }

    }

    public function send_email($to, $message, $subject, $sender, $sender_name){
        //Sent to Email Username & Password
        $email_config = Array(
            'protocol'  => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
            //'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => '465',
            'smtp_user' => 'strawblack@gmail.com',
            'smtp_pass' => 'gACGf6431278',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );

        # load email library
        $this->load->library("email",$email_config);

        $this->email->from($sender,$sender_name);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }



}