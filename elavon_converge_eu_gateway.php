<?php
  // this prevent module from being run outside of prestashop for security.
  if (!defined('_PS_VERSION_')) {
    exit;
  }

  require_once(dirname(__FILE__) . '/controllers/transaction_logs.php');
  require_once(dirname(__FILE__) . '/controllers/helper_encrypt.php');
  use PrestaShop\PrestaShop\Core\Payment\PaymentOption;

  class elavon_converge_eu_gateway extends PaymentModule{

    /**
     * elavon_converge_eu_gateway constructor.
     */
    public function __construct(){
      $this->name                   = 'elavon_converge_eu_gateway';
      $this->tab                    = 'payment_gateways';
      $this->version                = '0.0.1';
      $this->author                 = 'Elavon/Interapt';
      $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
      $this->bootstrap              = true;
      parent::__construct();
      //these properties will need to be translated once we have the translator file set up
      // $this->displayName = $this->l('Elavon Converge EU Gateway');
      $this->displayName = 'Elavon Converge EU Gateway';
      $this->description = 'Receive credit card payments using Elavon Converge EU Gateway';
      $this->confirmUninstall = 'Are you sure you want to uninstall?';
    }

    /**
     * @return bool|mixed|string]
     */
    public function install(){
      if (!parent::install())
        return false;
      //register hooks
      //create module Config settings in Prestashop config table
      return true;
    }

    /**
     * @return bool
     */
    public function uninstall(){
      if (!parent::uninstall())
        return false;
      return true;
    }

    /**
     * @return string
     * this creates the configuration page on the back office.
     */
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
      return $this->display(__FILE__, '/views/templates/admin/configuration.tpl');

    }

    /**
     * this handles the form submits on the configuration page
     */
    public function processConfiguration(){
      if (Tools:: isSubmit('Configuration_form')) {
        //retrieve the POST or GET VALUE
        $elavon_enabled            = Tools::getValue('elavon_enabled');
        $elavon_environment        = Tools::getValue('elavon_environment');
        $elavon_title              = Tools::getValue('elavon_title');
        $elavon_debug              = Tools::getValue('elavon_debug');
        $elavon_processor_id       = Tools::getValue('elavon_processor_id');
        $elavon_merchant_name      = Tools::getValue('elavon_merchant_name');
        $elavon_merchant_alias     = Tools::getValue('elavon_merchant_alias');
        $elavon_public_key         = Tools::getValue('elavon_public_key');
        $elavon_secret_key         = Tools::getValue('elavon_secret_key');
        $elavon_name               = Tools::getValue('elavon_name');
        $elavon_phone              = Tools::getValue('elavon_phone');
        $elavon_url                = Tools::getValue('elavon_url');
        $elavon_payment_action     = Tools::getValue('elavon_payment_action');
        $elavon_integration_option = Tools::getValue('elavon_integration_option');
        $elavon_converge_email     = Tools::getValue('elavon_converge_email');
        $elavon_license_code       = Tools::getValue('elavon_license_code');

        //validate merchant information
        //encrypt secret key before saving in database
        $elavon_secret_key_encrypted = helper_encrypt::encrypt_data($elavon_secret_key);
        Configuration::updateValue('ELAVON_ENABLED', $elavon_enabled);
        Configuration::updateValue('ELAVON_ENVIRONMENT', $elavon_environment);
        Configuration::updateValue('ELAVON_TITLE', $elavon_title);
        Configuration::updateValue('ELAVON_DEBUG', $elavon_debug);
        Configuration::updateValue('ELAVON_PROCESSOR_ID', $elavon_processor_id);
        Configuration::updateValue('ELAVON_MERCHANT_NAME', $elavon_merchant_name);
        Configuration::updateValue('ELAVON_MERCHANT_ALIAS', $elavon_merchant_alias);
        Configuration::updateValue('ELAVON_PUBLIC_KEY', $elavon_public_key);
        Configuration::updateValue('ELAVON_SECRET_KEY', $elavon_secret_key_encrypted);
        Configuration::updateValue('ELAVON_NAME', $elavon_name);
        Configuration::updateValue('ELAVON_PHONE', $elavon_phone);
        Configuration::updateValue('ELAVON_URL', $elavon_url);
        Configuration::updateValue('ELAVON_PAYMENT_ACTION', $elavon_payment_action);
        Configuration::updateValue('ELAVON_INTEGRATION_OPTION', $elavon_integration_option);
        Configuration::updateValue('ELAVON_CONVERGE_EMAIL', $elavon_converge_email);
        Configuration::updateValue('ELAVON_LICENSE_CODE', $elavon_license_code);

          //admin updated configuration log
        if($elavon_debug){transaction_logs::trans_log($elavon_enabled);}
        //assign these variables to Smarty
        $this->context->smarty->assign('confirmation', 'Your settings have been saved');

      }
    }

    /**
     * set values for configuration page
     */
    public function assignConfiguration(){
      //takes the key of the configuration wanted as a parameter, and returns the associated value

      $elavon_enabled               = Configuration::get('ELAVON_ENABLED');
      $elavon_environment           = Configuration::get('ELAVON_ENVIRONMENT');
      $elavon_title                 = Configuration::get('ELAVON_TITLE');
      $elavon_debug                 = Configuration::get('ELAVON_DEBUG');
      $elavon_processor_id          = Configuration::get('ELAVON_PROCESSOR_ID');
      $elavon_merchant_name         = Configuration::get('ELAVON_MERCHANT_NAME');
      $elavon_merchant_alias        = Configuration::get('ELAVON_MERCHANT_ALIAS');
      $elavon_public_key            = Configuration::get('ELAVON_PUBLIC_KEY');
      $elavon_secret_key_encrypted  = Configuration::get('ELAVON_SECRET_KEY');
      $elavon_name                  = Configuration::get('ELAVON_NAME');
      $elavon_phone                 = Configuration::get('ELAVON_PHONE');
      $elavon_url                   = Configuration::get('ELAVON_URL');
      $elavon_payment_action        = Configuration::get('ELAVON_PAYMENT_ACTION');
      $elavon_integration_option    = Configuration::get('ELAVON_INTEGRATION_OPTION');
      $elavon_converge_email        = Configuration::get('ELAVON_CONVERGE_EMAIL');
      $elavon_license_code          = Configuration::get('ELAVON_LICENSE_CODE');

      //decrypt secret key
      $elavon_secret_key_decrypted = helper_encrypt::decrypt_data($elavon_secret_key_encrypted);
      //assign these variables to Smarty
      $this->context->smarty->assign('elavon_enabled', $elavon_enabled);
      $this->context->smarty->assign('elavon_environment', $elavon_environment);
      $this->context->smarty->assign('elavon_title', $elavon_title);
      $this->context->smarty->assign('elavon_debug', $elavon_debug);
      $this->context->smarty->assign('elavon_processor_id', $elavon_processor_id);
      $this->context->smarty->assign('elavon_merchant_name', $elavon_merchant_name);
      $this->context->smarty->assign('elavon_merchant_alias', $elavon_merchant_alias);
      $this->context->smarty->assign('elavon_public_key', $elavon_public_key);
      $this->context->smarty->assign('elavon_secret_key', $elavon_secret_key_decrypted);
      $this->context->smarty->assign('elavon_name', $elavon_name);
      $this->context->smarty->assign('elavon_phone', $elavon_phone);
      $this->context->smarty->assign('elavon_url', $elavon_url);
      $this->context->smarty->assign('elavon_payment_action', $elavon_payment_action);
      $this->context->smarty->assign('elavon_integration_option', $elavon_integration_option);
      $this->context->smarty->assign('elavon_converge_email', $elavon_converge_email);
      $this->context->smarty->assign('elavon_license_code', $elavon_license_code);

      //inject the css and js files for the template
      $this->context->controller->addCSS($this->_path.'/views/css/admin-styles.css');
      $this->context->controller->addJS($this->_path.'views/js/admin-js.js');
    }

  }