<?php

function twig()
{
    $siteKey = '6LdO7U4UAAAAAJNrYHV6_HK2K1DQZCnRmzVcHPp_';
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    echo $twig->render('index.html', ['url' => './php/app.php', 'key' => $siteKey]);

}

function submit()
{
    $remoteIp = $_SERVER['REMOTE_ADDR'];
    $gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
    $recaptcha = new \ReCaptcha\ReCaptcha('6LdO7U4UAAAAAARV5iYt6aW_6njJ3anNEIG-9xwG');
    $resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
    if ($resp->isSuccess()) {
        echo "Капча пройдена";
        return true;
    } else {
        echo "Капча НЕ пройдена";
        return false;
    }
}