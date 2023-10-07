<?php
namespace Arquitectura\Controller;

use Arquitectura\Model\CargoModel;
use Arquitectura\View\CargoView;

class CargoController{
    private CargoModel  $cargoModel;
    private CargoView   $cargoView;
    
    
    public function __construct(){
        $this->cargoModel=new CargoModel();
        $this->cargoView=new CargoView();
    }
    public function mostrarCargo(): void
    {
        $cargo = $this->cargoModel->mostrarCargo();
        $this->cargoView->actualizar($cargo);

    }
    public function agregarCargo(array $request): void
    {
        $this->cargoModel->setData($request);
        $this->cargoModel->agregarCargo();
        
        $estudiantes = $this->cargoModel->mostrarCargo();
        
        $this->cargoView->actualizar($estudiantes);
    }
    public function store(array $request){
        
    }
    public function delete(int $id){
        
    }
    public function find(int $id){
        
    }
}