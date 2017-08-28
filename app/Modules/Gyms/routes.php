<?php

$app->group(['middleware' => 'jwt-auth'], function ($app){
    $app->get('/','GymController@index');
    $app->post('/','GymController@store');
    $app->post('infos','GymController@infos');
    $app->delete('{id}','GymController@destroy');
});