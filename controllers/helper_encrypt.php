<?php

  class helper_encrypt{



    public static function getKey()
    {
      $keyString = _PS_ADMIN_DIR_;
      $realKey = substr($keyString, -9);
      return $realKey;
    }



    public static function encryptPassword($secretKey){
      echo "<script>console.log('Im here');</script>";
      $encryptionKey = self::getKey();
      $encryptedPassword = openssl_encrypt($secretKey, "AES-128-ECB", $encryptionKey);
      echo "<script>console.log($encryptedPassword);</script>";
      return  $encryptedPassword;
    }


    public static function decryptPassword($encryptedPassword){
      $encryptionKey = self::getKey();
      $decryptedPassword = openssl_decrypt($encryptedPassword, "AES-128-ECB", $encryptionKey);
      echo "<script>console.log($decryptedPassword);</script>";
      return $decryptedPassword;
    }
  }