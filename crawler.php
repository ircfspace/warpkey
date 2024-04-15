<?php

    $url = 'https://t.me/s/warpplus';
    $pattern = '/<code>([A-Za-z0-9-]+)<\/code>/';
    $getData = file_get_contents($url);

    $keys = [];
    if ( preg_match_all($pattern, $getData, $matches) ) {
        $keys = implode('', $matches[1]);
    }

    $i = 0;
    $html = "";
    foreach($keys as $key) {
        if ( $i >= 15 ) {
            break;
        }
        $html .= $key.( $key !== end($keys) ? "\n" : "");
        $i++;
    }
    file_put_contents("list", $html);
