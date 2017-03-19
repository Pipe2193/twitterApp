<?php

use mvc\routing\routingClass as routing;
use mvc\view\viewClass as view;

view::includePartial('partials/menuPrincipal');
?>

<!-- Page Content -->
<div id="page-content-wrapper" style=" padding-top: 60px;">
    <div class="container container-fluid ">
        <div class=" col-md-6">
            <div class="row">

                <div class="twPc-div">
                    <div class="twPc-bg twPc-block" style='background: url("<?php echo $profile->profile_background_image_url; ?>")'></div>

                    <div>
                        <div class="twPc-button">

                        </div>
                        <a title="<?php echo $profile->screen_name; ?>" href="https://twitter.com/<?php echo $profile->screen_name; ?>" class="twPc-avatarLink">
                            <img alt="<?php echo $profile->screen_name; ?>" src="<?php echo $profile->profile_image_url; ?>" class="twPc-avatarImg">
                        </a>

                        <div class="twPc-divUser">
                            <div class="twPc-divName">
                                <a href="https://twitter.com/<?php echo $profile->screen_name; ?>"><?php echo $profile->name; ?></a>
                            </div>
                            <span>
                                <a href="https://twitter.com/<?php echo $profile->screen_name; ?>">@<span><?php echo $profile->screen_name; ?></span></a>
                            </span>
                        </div>

                        <div class="twPc-divStats">
                            <ul class="twPc-Arrange">
                                <li class="twPc-ArrangeSizeFit">
                                    <a href="https://twitter.com/<?php echo $profile->screen_name; ?>" title="<?php echo $profile->statuses_count; ?> Tweet">
                                        <span class="twPc-StatLabel twPc-block">Tweets</span>
                                        <span class="twPc-StatValue"><?php echo $profile->statuses_count; ?></span>
                                    </a>
                                </li>
                                <li class="twPc-ArrangeSizeFit">
                                    <a href="https://twitter.com/<?php echo $profile->screen_name; ?>/following" title="<?php echo $profile->friends_count; ?> Following">
                                        <span class="twPc-StatLabel twPc-block">Following</span>
                                        <span class="twPc-StatValue"><?php echo $profile->friends_count; ?></span>
                                    </a>
                                </li>
                                <li class="twPc-ArrangeSizeFit">
                                    <a href="https://twitter.com/<?php echo $profile->screen_name; ?>/followers" title="<?php echo $profile->screen_name; ?> Followers">
                                        <span class="twPc-StatLabel twPc-block">Followers</span>
                                        <span class="twPc-StatValue"><?php echo $profile->followers_count; ?></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="twPc-div">
                    <a class="twitter-timeline"
                       href="https://twitter.com/<?php echo $profile->screen_name; ?>"
                       data-chrome="nofooter noborders" data-aria-polite="assertive">
                        Tweets by @<?php echo $profile->screen_name; ?>
                    </a>
                </div>

                <?php
                foreach ($account->users as $follower) {
                    ?>
                    <!-- code start -->
                    <div class="twPc-div">
                        <div class="twPc-bg twPc-block" style='background: url("<?php echo $follower->profile_background_image_url; ?>")'></div>

                        <div>
                            <div class="twPc-button">
                                <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                                <a href="https://twitter.com/<?php echo $follower->screen_name; ?>" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow @<?php echo $follower->screen_name; ?></a>
                                <script>!function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                        if (!d.getElementById(id)) {
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = p + '://platform.twitter.com/widgets.js';
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }
                                    }(document, 'script', 'twitter-wjs');</script>
                                <!-- Twitter Button -->   
                            </div>

                            <a title="<?php echo $follower->screen_name; ?>" href="https://twitter.com/<?php echo $follower->screen_name; ?>" class="twPc-avatarLink">
                                <img alt="<?php echo $follower->screen_name; ?>" src="<?php echo $follower->profile_image_url; ?>" class="twPc-avatarImg">
                            </a>

                            <div class="twPc-divUser">
                                <div class="twPc-divName">
                                    <a href="https://twitter.com/<?php echo $follower->screen_name; ?>"><?php echo $follower->name; ?></a>
                                </div>
                                <span>
                                    <a href="https://twitter.com/mertskaplan">@<span><?php echo $follower->screen_name; ?></span></a>
                                </span></br>
    <!--                                <span style='color: #<?php echo $follower->profile_background_color; ?>'><?php echo $follower->description; ?></span>-->
                            </div>

                            <div class="twPc-divStats">
                                <ul class="twPc-Arrange">
                                    <li class="twPc-ArrangeSizeFit">
                                        <a href="https://twitter.com/<?php echo $follower->screen_name; ?>" title="<?php echo $follower->statuses_count; ?> Tweet">
                                            <span class="twPc-StatLabel twPc-block">Tweets</span>
                                            <span class="twPc-StatValue"><?php echo $follower->statuses_count; ?></span>
                                        </a>
                                    </li>
                                    <li class="twPc-ArrangeSizeFit">
                                        <a href="https://twitter.com/<?php echo $follower->screen_name; ?>/following" title="<?php echo $follower->friends_count; ?> Following">
                                            <span class="twPc-StatLabel twPc-block">Following</span>
                                            <span class="twPc-StatValue"><?php echo $follower->friends_count; ?></span>
                                        </a>
                                    </li>
                                    <li class="twPc-ArrangeSizeFit">
                                        <a href="https://twitter.com/<?php echo $follower->screen_name; ?>/followers" title="<?php echo $follower->followers_count; ?> Followers">
                                            <span class="twPc-StatLabel twPc-block">Followers</span>
                                            <span class="twPc-StatValue"><?php echo $follower->followers_count; ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <!-- code end -->
                    <?php
                }
                ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="twPc-div timeline">
                    <?php foreach ($timeline as $status) {
                        ?>
                        <blockquote class="twitter-tweet">
                            <p lang="en" dir="ltr"><?php echo $status->text; ?></p>&mdash; <?php echo $status->user->name; ?>
                            <a href="https://twitter.com/episod/status/<?php echo $status->id; ?>"</a>
                        </blockquote> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                    <?php }
                    ?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php view::includePartial('partials/footer') ?>


<!-- Modal -->
<div class="modal fade" id="tweet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop=”static” data-keyboard=”false”>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form role="form" method="POST" action="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class=" text-center modal-title" id="myModalLabel">Compose New tweet</h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="5" name="tweet" id="tweet" placeholder="What´s happening? "></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-twitter-square" aria-hidden="true"></i> Tweet</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="twitter-wjs"></div>