<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

// CREATE
$app->post('user_access', [
    'as' => 'UserAccessController.register', 'uses' => 'UserAccessController@register'
]);
// READ
$app->get('sent_otp/{id}', [
    'as' => 'UserAccessController.sent_otp', 'uses' => 'UserAccessController@sent_otp'
]);
$app->get('user_access/{id}', [
    'as' => 'UserAccessController.sent_otp', 'uses' => 'UserAccessController@getUserData'
]);
// $app->get('show_user',['as'=>'show_user.userdetail','uses'=>'UserAccessController@view_detail']);
