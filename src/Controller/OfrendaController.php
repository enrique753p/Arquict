<?php
namespace Arquitectura\Controller;

use Arquitectura\Model\OfrendaModel;
use Arquitectura\View\OfrendaView;

class OfrendaController{
    private OfrendaView  $ofrendaView;
    private OfrendaModel $ofrendaModel;

    public function __construct()
    {
     $this->ofrendaModel = new OfrendaModel();
     $this->ofrendaView = new OfrendaView(); 
    }
    public function index(){
         
    }
    public function store(array $request){
        
    }
    public function delete(int $id){
        
    }
    public function find(int $id){
        
    }
}