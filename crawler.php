<?php

    $source = [
        'https://t.me/s/warpplus',
        'https://t.me/s/warppluscn',
        'https://t.me/s/warpPlusHome',
    ];

    $keys = [];
    $pattern = '/<code>([A-Za-z0-9-]+)<\/code>/';
    foreach($source as $url) {
        $getData = file_get_contents($url);
        if ( preg_match_all($pattern, $getData, $matches) ) {
            $keys = array_merge($keys, $matches[1]);
        }
    }

    $html = "";
    $i = 0;
    if ( count($keys) > 0 ) {
        shuffle($keys);
        foreach($keys as $key) {
            if ( $i >= 15 ) {
                break;
            }
            $html .= $key.( $key !== end($keys) ? "\n" : "");
            $i++;
        }
        file_put_contents("list", $html);
    }
