<?php

    $url = 'https://t.me/s/warpplus';
    $pattern = '/Key: ([A-Za-z0-9\-]+) \(\d+\)/';
    $getData = file_get_contents($url);
    file_put_contents("list", $getData);die;

    $keys = [];
    if ( preg_match_all($pattern, $getData, $matches) ) {
        $keys = $matches[1];
    }

    $i = 1;
    $html = "";
    foreach($keys as $key) {
        if ( $i > 15 ) {
            break;
        }
        $html .= $key.( $key !== end($key) ? "\n" : "");

    }
    file_put_contents("list", $html);
