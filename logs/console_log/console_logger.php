<?php

  class console_logger {
   
   public static function log_it_out($message){
     $output = $message;
     if ( is_array( $output ) )
       $output = implode( ',', $output);
  
     echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
    }
  }