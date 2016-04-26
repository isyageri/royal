<?php

class M_parameter extends CI_Model
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('sequence');
    }

    function crud_account_type()
    {
        $oper = $this->input->post('oper');
        $id_ = $this->input->post('id');

        $accounttypedesc = ucfirst(trim($this->input->post('AccountTypeDesc')));
        $AccountTypeID = $this->input->post('AccountTypeID');
        $AccountTypeName = ucfirst(trim($this->input->post('AccountTypeName')));
        $AllowReferal = $this->input->post('AllowReferal');
        $DepositMinimum = $this->input->post('DepositMinimum');
        $Period = $this->input->post('Period');
        $Rate = $this->input->post('Rate');
        $ReferalRate = $this->input->post('ReferalRate');
        $WDBonusFee = $this->input->post('WDBonusFee');
        $WDDepositFeeRate = $this->input->post('WDDepositFeeRate');


        $data = array("AccountTypeName" => $AccountTypeName,
            "DepositMinimum" => $DepositMinimum,
            "AccountTypeDesc" => $accounttypedesc,
            "Period" => $Period,
            "AllowReferal" => $AllowReferal,
            "Rate" => $Rate,
            "ReferalRate" => $ReferalRate,
            "WDDepositFeeRate" => $WDDepositFeeRate,
            "WDBonusFee" => $WDBonusFee
        );

        $tabel = "accounttype";

        switch ($oper) {
            case 'add':
                $this->db->insert($tabel, $data);
                break;
            case 'edit':
                $this->db->where("AccountTypeID", $id_);
                $this->db->update($tabel, $data);

                break;
            case 'del':
                $this->db->where('AccountTypeID', $id_);
                $this->db->delete($tabel);
                break;
        }

    }

    function crud_bank_owner()
    {

        $oper = $this->input->post('oper');
        $id_ = $this->input->post('id');

        $BankAccountName = ucfirst(trim($this->input->post('BankAccountName')));
        $BankAccount = $this->input->post('BankAccount');
        $BankAddress = ucfirst(trim($this->input->post('BankAddress')));
        $BankCity = ucfirst(trim($this->input->post('BankCity')));
        $BankName = ucfirst(trim($this->input->post('BankName')));


        $data = array("BankAccountName" => $BankAccountName,
            "BankAccount" => $BankAccount,
            "BankAddress" => $BankAddress,
            "BankCity" => $BankCity,
            "BankName" => $BankName
        );

        $tabel = "corpbank";

        switch ($oper) {
            case 'add':
                $this->db->insert($tabel, $data);
                break;
            case 'edit':
                $this->db->where("CorpBankID", $id_);
                $this->db->update($tabel, $data);

                break;
            case 'del':
                $this->db->where('CorpBankID', $id_);
                $this->db->delete($tabel);
                break;
        }

    }

    function crud_identification()
    {

        $oper = $this->input->post('oper');
        $id_ = $this->input->post('id');

        $Type = ucfirst(trim($this->input->post('Type')));


        $data = array("Type" => $Type);

        $tabel = "identificationtype";

        switch ($oper) {
            case 'add':
                $this->db->insert($tabel, $data);
                break;
            case 'edit':
                $this->db->where("ID", $id_);
                $this->db->update($tabel, $data);

                break;
            case 'del':
                $this->db->where('ID', $id_);
                $this->db->delete($tabel);
                break;
        }

    }

    function crud_sequrity()
    {

        $oper = $this->input->post('oper');
        $id_ = $this->input->post('id');

        $Question = ucfirst(trim($this->input->post('Question')));


        $data = array("Question" => $Question);

        $tabel = "securityquestion";

        switch ($oper) {
            case 'add':
                $this->db->insert($tabel, $data);
                break;
            case 'edit':
                $this->db->where("SecurityQuestionID", $id_);
                $this->db->update($tabel, $data);

                break;
            case 'del':
                $this->db->where('SecurityQuestionID', $id_);
                $this->db->delete($tabel);
                break;
        }

    }

    function crud_citizenship()
    {

        $oper = $this->input->post('oper');
        $id_ = $this->input->post('id');

        $Citizenship = ucfirst(trim($this->input->post('Citizenship')));


        $data = array("Citizenship" => $Citizenship);

        $tabel = "citizenship";

        switch ($oper) {
            case 'add':
                $this->db->insert($tabel, $data);
                break;
            case 'edit':
                $this->db->where("CitizenshipID", $id_);
                $this->db->update($tabel, $data);

                break;
            case 'del':
                $this->db->where('CitizenshipID', $id_);
                $this->db->delete($tabel);
                break;
        }

    }

    function crud_country()
    {

        $oper = $this->input->post('oper');
        $id_ = $this->input->post('id');

        $CountryName = ucfirst(trim($this->input->post('CountryName')));
        $CountryCode = ucfirst(trim($this->input->post('CountryCode')));


        $data = array("CountryName" => $CountryName,
            "CountryCode" => $CountryCode
        );

        $tabel = "country";

        switch ($oper) {
            case 'add':
                $this->db->insert($tabel, $data);
                break;
            case 'edit':
                $this->db->where("CountryID", $id_);
                $this->db->update($tabel, $data);

                break;
            case 'del':
                $this->db->where('CountryID', $id_);
                $this->db->delete($tabel);
                break;
        }

    }


}