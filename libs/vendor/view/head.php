<!DOCTYPE html>
<html lang="<?php echo \mvc\config\configClass::getDefaultCulture() ?>">
    <head>
        <?php echo \mvc\view\viewClass::genTitle() ?>
        <?php echo \mvc\view\viewClass::genMetas() ?>
        <?php echo \mvc\view\viewClass::genFavicon() ?>
        <?php echo \mvc\view\viewClass::genStylesheet() ?>
        <?php echo \mvc\view\viewClass::genJavascript() ?>
        <script>window.twttr = (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0],
                        t = window.twttr || {};
                if (d.getElementById(id))
                    return t;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://platform.twitter.com/widgets.js";
                fjs.parentNode.insertBefore(js, fjs);

                t._e = [];
                t.ready = function (f) {
                    t._e.push(f);
                };

                return t;
            }(document, "script", "twitter-wjs"));</script>
    </head>
    <body>
        <div id="wrapper">