<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail;

class MailController extends Controller
{
    //
    public function index()
    {
        \Mail::send(['text' => 'mail'],['name', 'Dipshop mag'], function($message){
            $message->to('Mackinkenny@gmail.com', 'Dipmarket ept')->subject('Новая регистрация');
            $message->from('Mackinkenny@gmail.com', 'Dipshop mag');
        });
    }
}
