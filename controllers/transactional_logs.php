<?php

  class transactional_logs{

    /**
     * @param $tested
     * these are notes transactional_logs lets see if it shows
     */
    public static function trans_log($tested){
      if (!$tested){
        error_log('tested failed', '3', '/Applications/MAMP/htdocs/prestashop/modules/elavon_converge_eu_gateway/logs/logs.txt');

        }else{
            error_log('tested passed','3','/Applications/MAMP/htdocs/prestashop/modules/elavon_converge_eu_gateway/logs/logs.txt');
        }
      return;
    }

  }