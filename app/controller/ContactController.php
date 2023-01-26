<?php 
namespace app\controller; 
class ContactController extends Controller{
    public function teste(){
        Controller::view('contact');
    }

    public function store($params){
        dd($params);
        exit;
    }
}