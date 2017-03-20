<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;
use Abraham\TwitterOAuth\TwitterOAuth as TwitterOAuth;

/**
 * Description of ejemploClass
 *
 * @author Andres F Alvarez L <andresf9321@gmail.com> 
 */
class createActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {
            if (request::getInstance()->isMethod('POST')) {

                $tweet = request::getInstance()->getPost('tweet');

                if (strlen($tweet) > 140) {
                    throw new PDOException(i18n::__(00001, null, 'errors', array(':longitud' => 80)), 00001);
                }

                $instance = new TwitterOAuth(config::getTwitterKey(), config::getSecretCustomerTwitterKey(), config::getTokenKey(), config::getSecretTokenKey());
                $parameters = array('status' => $tweet);
                $status = $instance->post('statuses/update', $parameters);
                session::getInstance()->setSuccess("Tweet Posted!");
                routing::getInstance()->redirect('default', 'index');
            } else {
                routing::getInstance()->redirect('default', 'index');
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
