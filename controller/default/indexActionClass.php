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
class indexActionClass extends controllerClass implements controllerActionInterface {

    public function execute() {
        try {

            $instance = new TwitterOAuth(config::getTwitterKey(), config::getSecretCustomerTwitterKey(), config::getTokenKey(), config::getSecretTokenKey());
            $friendsList = $instance->get("friends/list");
            $this->account = $friendsList;
            if (isset($this->account->errors)):

                $this->account = session::getInstance()->getCache('friends');
            else:
                session::getInstance()->setCache('friends', $friendsList);
                $this->account = $friendsList;
            endif;

            session::getInstance()->setCache('account/verify_credentials', $instance->get("account/verify_credentials"));
            $this->profile = session::getInstance()->getCache('account/verify_credentials');

            $statusList = $instance->get("statuses/home_timeline");
            $this->timeline = $statusList;
            if (isset($this->timeline->errors)):
                $this->timeline = session::getInstance()->getCache('hometimeline');
            else:
                session::getInstance()->setCache('hometimeline', $statusList);
                $this->timeline = $statusList;
            endif;
            session::getInstance()->setFlash('home', true);

            $this->defineView('index', 'default', session::getInstance()->getFormatOutput());
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

}
