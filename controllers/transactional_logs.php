<?php

  class transactional_logs{


    public static function trans_log($tested){
      if (!$tested){
        error_log('tested failed \n', '3', '/Applications/MAMP/htdocs/prestashop/modules/elavon_converge_eu_gateway/logs/logs.txt');

        }else{
            error_log('tested passed \n','3','/Applications/MAMP/htdocs/prestashop/modules/elavon_converge_eu_gateway/logs/logs.txt');
        }
      return;
    }

  }