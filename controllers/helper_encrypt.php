<?php

  class helper_encrypt{

    /**
     * @return bool|string
     */
    public static function get_key(){
      $directory_string = _PS_ADMIN_DIR_;
      $encryption_key = substr($directory_string, -9);
      return $encryption_key;
    }

    /**
     * @param $data
     * @return string
     */
    public static function encrypt_data($data){
      $encrypted_data = openssl_encrypt($data, "AES-128-ECB", self::get_key());
      return  $encrypted_data;
    }

    /**
     * @param $encrypted_data
     * @return string
     */
    public static function decrypt_data($encrypted_data){
      $decrypted_data = openssl_decrypt($encrypted_data, "AES-128-ECB", self::get_key());
      return $decrypted_data;
    }
  }