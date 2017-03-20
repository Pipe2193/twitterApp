<?php

use mvc\routing\routingClass as routing;
use mvc\session\sessionClass as session;
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>"> Twitter App |</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php echo (session::getInstance()->hasFlash('home')) ? 'class="active"' : '' ?>>
                    <a  href="<?php echo routing::getInstance()->getUrlWeb('default', 'index') ?>" ><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <button type="button" class=" btn btn-primary tweet "  data-toggle="modal" data-target="#tweet">
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>   Tweet
                    </button>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="https://abs.twimg.com/sticky/default_profile_images/default_profile_6_normal.png" alt="profile" class=" img-circle" style="width: 20px;"> <?php echo mvc\session\sessionClass::getInstance()->getUserName(); ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Cambiar Contraseña</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo routing::getInstance()->getUrlWeb('shfSecurity', 'logout') ?>">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
