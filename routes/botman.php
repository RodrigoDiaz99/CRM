<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hola bot', 'App\Http\Controllers\ChatController@index');
//El primer parametro "hola bot" será el que active nuestro bot, llamará a la función
//index de nuestro controlador chatController.php y ésta a la función hello

$botman->fallback('App\Http\Controllers\FailChatController@index');
//Si lo que envia el usuario no lo conocemos, se ejecuta la función index del
//controlador FailChatController
