<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/25
 * Time: 16:44
 */

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}