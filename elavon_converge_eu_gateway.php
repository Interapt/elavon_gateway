<?php
    // prevents module being ran outside of Prestashop for security
  if (!defined('_PS_VERSION_')) {
    exit;
  }

  use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

  class elavon_converge_eu_gateway extends PaymentModule
  {

    /**
     * elavon_converge_eu_gateway constructor.
     */
    public function __construct(){

      $this->name                   = 'elavon_converge_eu_gateway';
      $this->tab                    = 'payments_gateways';
      $this->version                = '0.0.1';
      $this->author                 = 'Elavon/Interapt';
      $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
      $this->bootstrap              = true;
      parent::__construct();
      // these properties will need to be translated, once we have the translate file setup.
      // $this->displayName = $this->l('Elavon Converge EU Gateway');
      $this->displayName      = 'Elavon Converge EU Gateway';
      $this->description      = 'Receive credit card payments using Elavon Converge EU Gateway.' ;
      $this->confirmUninstall = 'Are you sure you want to uninstall?';
    }

    /**
     * @return bool|mixed|string
     */
    public function install(){

      if (!parent::install())
        return false;
      // register hooks
      // create module Config settings in Prestashop Config table.
      return true;

    }

  // uninstall function
    public function uninstall(){

      if (!parent::uninstall())
        return false;

      return true;
    }
  // function for settings page

    public function getContent(){
      //because the getContent is the only method called when coming to the configuration page we need to
      //call our other functions to handle the processes of the page.
      // write a process configuration method that will handle the submission of the form
      // this method will connect to the validation of the entered information. story B-194616
      $this->processConfiguration();
      // write a assign config method that will pull the stored data from the configuration table.
      $this->assignConfiguration();
      // the display method takes 2 arguments what type to display and the value
      // a block of html code is generated and returned.
      return $this->display(__FILE__, 'configuration.tpl');


    }

    public function processConfiguration(){
      if (Tools::isSubmit('Configuration_form')){
        // GET and POST
        $elavon_enabled             = Tools::getValue('elavon_enabled');
        $elavon_environment         = Tools::getValue('elavon_environment');
        $elavon_title               = Tools::getValue('elavon_title');
        $elavon_debug               = Tools::getValue('elavon_debug');
        $elavon_processor_account_Id = Tools::getValue('elavon_processor_account_Id');
        $elavon_merchantName        = Tools::getValue('elavon_merchantName');
        $elavon_merchantAlias       = Tools::getValue('elavon_merchantAlias');
        $elavon_publicKey           = Tools::getValue('elavon_publicKey');
        $elavon_secretKey           = Tools::getValue('elavon_secretKey');
        Configuration::updateValue('ELAVON_ENABLED' , $elavon_enabled);
        Configuration::updateValue('ELAVON_ENVIRONMENT' , $elavon_environment);
        Configuration::updateValue('ELAVON_TITLE' , $elavon_title);
        Configuration::updateValue('ELAVON_DEBUG' , $elavon_debug);
        Configuration::updateValue('ELAVON_PROCESSOR_ACCOUNT_ID', $elavon_processor_account_Id);
        Configuration::updateValue('ELAVON_MERCHANTNAME', $elavon_merchantName);
        Configuration::updateValue('ELAVON_MERCHANTALIAS', $elavon_merchantAlias);
        Configuration::updateValue('ELAVON_PUBLICKEY', $elavon_publicKey);
        Configuration::updateValue('ELAVON_SECRETKEY', $elavon_secretKey);

        //Assign variable to smarty
        $this->context->smarty->assign('confirmation', 'Youre settings have been saved');

      }

    }

    public function assignConfiguration(){
      $elavon_enabled     = Configuration::get('ELAVON_ENABLED');
      $elavon_environment = Configuration::get('ELAVON_ENVIRONMENT');
      $elavon_title       = Configuration::get('ELAVON_TITLE');
      $elavon_debug       = Configuration::get('ELAVON_DEBUG');
      $elavon_processor_account_Id = Configuration::get('ELAVON_PROCESSOR_ACCOUNT_ID');
      $elavon_merchantName = Configuration::get('ELAVON_MERCHANTNAME');
      $elavon_merchantAlias = Configuration::get('ELAVON_MERCHANTALIAS');
      $elavon_publicKey     = Configuration::get('ELAVON_PUBLICKEY');
      $elavon_secretKey     = Configuration::get('ELAVON_SECRETKEY');
      // Assign variable to Template
      $this->context->smarty->assign('elavon_enabled', $elavon_enabled);
      $this->context->smarty->assign('elavon_environment', $elavon_environment);
      $this->context->smarty->assign('elavon_title', $elavon_title);
      $this->context->smarty->assign('elavon_debug', $elavon_debug);
      $this->context->smarty->assign('elavon_ProcessorAccount_Id', $elavon_processor_account_Id);
      $this->context->smarty->assign('elavon_merchantName', $elavon_merchantName);
      $this->context->smarty->assign('elavon_merchantAlias', $elavon_merchantAlias);
      $this->context->smarty->assign('elavon_publicKey', $elavon_publicKey);
      $this->context->smarty->assign('elavon_secretKey', $elavon_secretKey);
      $this->context->controller->addCSS($this->_path.'/views/css/admin-styles.css');
      $this->context->controller->addJS($this->_path.'views/js/admin-js.js');

    }

  }