<?php

  class Security{

    public static function encryptPassword($secretKey){
      $encryptedPassword = password_hash($secretKey, PASSWORD_DEFAULT);
      return  $encryptedPassword;
    }
  }