<?php
if (isset($_POST["token"])) {
        $token = $_POST["token"];
        if ($token === "849614cf-d266-461b-aa92-6ad3f5437909") {
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
