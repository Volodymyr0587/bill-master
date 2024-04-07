<?php

if (! function_exists('bm_isUrl')) {
    function bm_isUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
