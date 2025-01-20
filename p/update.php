<?php
require(__DIR__ . '/../constants.php');
require(LIB_PATH . '/lib_rss.php');

if (isset($_POST["token"])) {
        FreshRSS_Context::initSystem();
        $user = FreshRSS_Context::systemConf()->default_user;
        FreshRSS_Context::initUser($user);
        $token = FreshRSS_Context::userConf()->token;
        if ($token === $_POST["token"]) {
            $command = "php " . __DIR__ . "/../app/actualize_script.php > /tmp/FreshRSS.log 2>&1 &";
            pclose(popen($command,'r'));
            die('1');
        }
        else {
            die('0');
        }
}
else {
    die('0');
}
