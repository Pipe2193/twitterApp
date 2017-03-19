<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use hook\log\logHookClass as log;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of twitterActionClass
 *
 * @author Andres F Alvarez L <andresf9321@gmail.com> 
 */
class twitterActionClass extends controllerClass implements controllerActionInterface {
    protected $client;
    protected $clientCallback = 'http://twitterapp.com/twitterApp/web/index.php/callBack';


    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                \Codebird\Codebird::setConsumerKey(config::getTwitterKey(), config::getSecretCustomerTwitterKey()); // static
                $this->client = $cb = \Codebird\Codebird::getInstance();
                 header("Location: " . $this->getAuthUrl());
                 
                 
               
            } else {
                routing::getInstance()->redirect(config::getDefaultModule(), config::getDefaultAction());
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }
    
    public function getAuthUrl() {
        
        $this->requestTokens();
        $this->verifyTokens();
        
        return $this->client->oauth_authenticate();
    }


    protected function requestTokens(){
        
        $reply = $this->client->oauth_requestToken([
            'oauth_callback' => $this->clientCallback
        ]);
        $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);
    }
    
    protected function storeTokens($token, $token_secret){
        
        $_SESSION['oauth_token'] = $token;
        $_SESSION['oauth_token_secret'] = $token_secret;
    }
    
    protected function verifyTokens(){
        $this->client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    }
}
