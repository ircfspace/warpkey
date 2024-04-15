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
    $keys = array_rand($keys, 15);
    foreach($keys as $key) {
        $html .= $key.( $key !== end($keys) ? "\n" : "");
    }
    file_put_contents("list", $html);
