<?php
/**
 * Created by PhpStorm.
 * User: wuchuanchuan
 * Date: 2018/8/2
 * Time: 下午1:50
 */

function route_class()
{
    return str_replace('.','_',Route::currentRouteName());
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return str_limit($excerpt,$length);
}