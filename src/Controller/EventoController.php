<?php
namespace Arquitectura\Controller;

use Arquitectura\Model\EventoModel;
use Arquitectura\View\EventoView;

class EventoController{
    private EventoModel $eventoModel;
    private EventoView  $eventoView;

       public function __construct()
   {
    $this->eventoModel=new EventoModel();
    $this->eventoView=new  EventoView();
   }
   public function mostrarEvento(): void
   {
       $evento = $this->eventoModel->mostrarEvento();
       $this->eventoView->actualizar($evento);

   }
   public function agregarEvento(array $request): void
    {
        $this->eventoModel->setData($request);
        $this->eventoModel->agregarEvento();
        
        $evento = $this->eventoModel->mostrarEvento();
        
        $this->eventoView->actualizar($evento);
    }

   public function store(array $request){
       
   }
   public function delete(int $id){
       
   }
   public function find(int $id){
       
   }
}