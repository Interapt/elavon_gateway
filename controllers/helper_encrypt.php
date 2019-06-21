<?php

  class helper_encrypt{



    public static function getKey()
    {
      $keyString = _PS_ADMIN_DIR_;

      $realKey = substr($keyString, -9);
      echo "<script>console.log('im in get key');</script>";
      return $realKey;
    }



    public static function encryptPassword($secretKey){
      echo "<script>console.log('im here');</script>";
      $encryptionKey = self::getKey();
      $encryptedPassword = openssl_encrypt($secretKey, "AES-128-ECB", $encryptionKey);
      echo "<script>console.log($encryptedPassword);</script>";
      return  $encryptedPassword;
    }


    public static function decryptPassword($encryptedPassword){
      $decryptedPassword = password_get_info($encryptedPassword);
      echo "<script>console.log($decryptedPassword);</script>";
    }
  }