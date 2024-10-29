<?php

    $source = [
        'https://t.me/s/warpplus',
        'https://t.me/s/warppluscn',
        'https://t.me/s/warpPlusHome',
        'https://t.me/s/warp_veyke',
        'https://t.me/s/warp_key'
    ];

    $keys = [];
    $pattern = '/<code>([A-Za-z0-9-]+)<\/code>/';
    foreach($source as $url) {
        $getData = file_get_contents($url);
        if ( preg_match_all($pattern, $getData, $matches) ) {
            $keys = array_merge($keys, $matches[1]);
        }
    }

    $keys = array_unique($keys);
    if ( count($keys) > 0 ) {

        $x = 0;
        $full = "";
        foreach($keys as $key) {
            if ( $x >= 100 ) {
                break;
            }
            $full .= $key.( $key !== end($keys) ? "\n" : "");
            $x++;
        }
        file_put_contents("plus/full", $full);

        $i = 0;
        $lite = "";
        shuffle($keys);
        foreach($keys as $key) {
            if ( $i >= 15 ) {
                break;
            }
            $lite .= $key.( $key !== end($keys) ? "\n" : "");
            $i++;
        }
        file_put_contents("plus/lite", $lite);

    }
