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