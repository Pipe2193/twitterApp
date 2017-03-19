<?php

namespace mvc\config {

  use mvc\config\configClass;
  
  /**
   * Description of myConfigClass
   *
   * @author Andres F Alvarez L <andresf9321@gmail.com> 
   */
  class myConfigClass extends configClass {
    
    private static $customer_key;
    private static $customer_secret_key;
    private static $token;
    private static $token_secret;
    
      /**
     * Obtiene customer key
     *
     * @return string
     */
    public static function getTwitterKey() {
      return self::$customer_key;
    }

    /**
     * Configuro la customer key
     *
     * @param string $customer_key
     */
    public static function setTwitterKey($customer_key) {
      self::$customer_key = $customer_key;
    }
    
    /**
     * Obtiene la customer secret key (API key)
     *
     * @return string
     */
    public static function getSecretCustomerTwitterKey() {
      return self::$customer_secret_key;
    }

    /**
     * Configuro la  customer secret key (API key)
     *
     * @param string $customer_secret_key
     */
    public static function setSecretCustomerTwitterKey($customer_secret_key) {
      self::$customer_secret_key = $customer_secret_key;
    }
    
       /**
     * Obtiene token key
     *
     * @return string
     */
    public static function getTokenKey() {
      return self::$token;
    }

    /**
     * Configuro la token key
     *
     * @param string $token
     */
    public static function setTokenKey($token) {
      self::$token = $token;
    }
    
    /**
     * Obtiene la token secret key (API key)
     *
     * @return string
     */
    public static function getSecretTokenKey() {
      return self::$token_secret;
    }

    /**
     * Configuro la  token secret key (API key)
     *
     * @param string $token_secret
     */
    public static function setSecretTokenKey($token_secret) {
      self::$token_secret = $token_secret;
    }
    
  }

}