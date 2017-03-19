<?php

use mvc\interfaces\controllerActionInterface;
use mvc\controller\controllerClass;
use mvc\config\myConfigClass as config;
use mvc\request\requestClass as request;
use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
use mvc\i18n\i18nClass as i18n;

/**
 * Description of callBackActionClass
 *
 * @author Andres F Alvarez L <andresf9321@gmail.com> 
 */
class callBackActionClass extends controllerClass implements controllerActionInterface {

    protected $client;
    protected $clientCallback = 'http://twitterapp.com/twitterApp/web/index.php/callBack';

    public function execute() {
        try {
            if (request::getInstance()->isMethod('GET')) {
                \Codebird\Codebird::setConsumerKey(config::getTwitterKey(), config::getSecretCustomerTwitterKey()); // static
                $this->client = $cb = \Codebird\Codebird::getInstance();
                if ($this->signIn()) {
                    hook\security\securityHookClass::loginTwitter();
                    hook\security\securityHookClass::redirectUrl();
                } else {
                    session::getInstance()->setError('Could not connect to Twitter.com, please try again.');
                    routing::getInstance()->redirect(config::getDefaultModuleSecurity(), config::getDefaultActionSecurity());
                }
            }
        } catch (PDOException $exc) {
            session::getInstance()->setFlash('exc', $exc);
            routing::getInstance()->forward('shfSecurity', 'exception');
        }
    }

    public function signIn() {
        if ($this->hasCallBack()) {
            $this->verifyTokens();

            $reply = $this->client->oauth_accessToken([
                'oauth_verifier' => $_GET['oauth_verifier']
            ]);

            if ($reply->httpstatus === 200) {

                $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);

                $_SESSION['user_id'] = $reply->user_id;
                $_SESSION['screen_name'] = $reply->screen_name;

                $data = array(
                    usuarioTableClass::ID => $reply->user_id,
                    usuarioTableClass::USER => $reply->screen_name,
                    usuarioTableClass::PASSWORD => md5($reply->user_id)
                );
                usuarioTableClass::insert($data);

                return true;
            }
        }
        return false;
    }

    protected function hasCallBack() {

        return isset($_GET['oauth_verifier']);
    }

    public function getAuthUrl() {

        $this->requestTokens();
        $this->verifyTokens();

        return $this->client->oauth_authenticate();
    }

    protected function requestTokens() {

        $reply = $this->client->oauth_requestToken([
            'oauth_callback' => $this->clientCallback
        ]);
        $this->storeTokens($reply->oauth_token, $reply->oauth_token_secret);
    }

    protected function storeTokens($token, $token_secret) {

        $_SESSION['oauth_token'] = $token;
        $_SESSION['oauth_token_secret'] = $token_secret;
    }

    protected function verifyTokens() {
        $this->client->setToken($_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
    }

}
