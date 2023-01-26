<?php
namespace app\controller;
class HomeController extends Controller{
    public function teste(){
        Controller::view('home',[]);
    }
}