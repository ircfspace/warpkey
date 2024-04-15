<?php

    $url = 'https://t.me/s/warpplus';
    $pattern = '/🔐 Key: ([A-Za-z0-9\-]+) \(\d+ GB\)/';
    $getData = file_get_contents($url);

    $keys = [];
    if ( preg_match_all($pattern, $getData, $matches) ) {
        $keys = $matches[1];
    }

    file_put_contents("list", $matches[1];die;

    $i = 1;
    $html = "";
    foreach($keys as $key) {
        if ( $i > 15 ) {
            break;
        }
        $html .= $key.( $key !== end($key) ? "\n" : "");
        $i++;
    }
    file_put_contents("list", $html);
