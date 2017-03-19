<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\session\sessionClass as session ?>
<div class="container container-fluid">

    <div class="form-signin">
        <form  role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'login') ?>" method="POST">
            <h2 class="form-signin-heading">Login</h2>
            <label for="inputUser" class="sr-only">User name</label>
            <input type="text" id="inputUser" name="inputUser" class="form-control" placeholder="Enter User name" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Enter Password" required>
            <div class="checkbox">
                <label>
                    <input type="checkbox" value="true" name="chkRememberMe"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-success btn-block" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Log in</button>
        </form>

        <form  style="padding-top: 5px;" role="form" action="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'twitter') ?>" method="POST">
            <button class="btn btn-lg btn-info btn-block" type="submit"><i class="fa fa-twitter" aria-hidden="true"></i> Sign in with Twitter</button>
        </form>
        <?php if (session::getInstance()->hasError() or session::getInstance()->hasInformation() or session::getInstance()->hasSuccess() or session::getInstance()->hasWarning()): ?>
            <?php view::includeHandlerMessage() ?>
        <?php endif ?>
    </div>
</div> <!-- /container -->