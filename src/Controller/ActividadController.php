<?php
namespace Arquitectura\Controller;


use Arquitectura\View\ActividadView;
use Arquitectura\Model\ActividadModel;

class ActividadController{
    private ActividadModel  $actividadModel;
    private ActividadView   $actividadView;
    
   public function __construct()
   {
    $this->actividadModel=new ActividadModel();
    $this->actividadView=new  ActividadView();
   }
   public function mostrarActividad(): void
   {
       $actividad = $this->actividadModel->mostrarActividad();
       $this->actividadView->actualizar($actividad);

   } 
   public function agregarActividad(array $request): void
    {
        $this->actividadModel->setData($request);
        $this->actividadModel->agregarActividad();
        
        $actividad = $this->actividadModel->mostrarActividad();
        
        $this->actividadView->actualizar($actividad);
    }

   public function store(array $request){
       
   }
   public function delete(int $id){
       
   }
   public function find(int $id){
       
   }
}