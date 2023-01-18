<?php

class Cipher
{
    private $pass;
    private $cipher;
    private $iv ;


     public function __construct($pass = "12345678", $iv ="1234567891234567", $cipher = "aes256")
     {
         $this->pass = $pass;
         $this->iv = $iv;
         $this->cipher = $cipher;
     }


     public function encrypt(array $data) :array
     {
         $return = array();
         foreach ($data as $key => $value) {
             $return[$key] = openssl_encrypt ($value, $this->cipher, $this->pass,$options=0, $this->iv);
         }
         return $return;
     }
    public function descrypt(array $data) :array
    {
         $return = array();
         foreach ($data as $key => $value) {
             $return[$key] = openssl_decrypt($value, $this->cipher, $this->pass,$options=0, $this->iv);
         }
         return $return;

    }
    public function encryptString(string $data) :string
    {
     return openssl_encrypt ($data, $this->cipher, $this->pass,$options=0, $this->iv);
    }
    public function descryptString(string $data) :string
    {
     return openssl_decrypt($data, $this->cipher, $this->pass,$options=0, $this->iv);
    }

 }
