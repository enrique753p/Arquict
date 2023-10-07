<?php
namespace  Arquitectura\Controller;

use Arquitectura\Model\MiembroModel;
use Arquitectura\View\MiembroView;

class MiembroController{
    private MiembroModel $miembroModel; 
    private MiembroView  $miembroView;
    
    public function __construct()
    {
     $this->miembroModel=new MiembroModel();
     $this->miembroView=new  MiembroView();
    }
    public function mostrarMiembro(): void
    {
        $miembro = $this->miembroModel->mostrarMiembro();
        $this->miembroView->actualizar($miembro);
 
    } 

    public function agregarMiembro(array $request): void
    {
        $this->miembroModel->setData($request);
        $this->miembroModel->agregarMiembro();
        
        $miembro = $this->miembroModel->mostrarMiembro();
        
        $this->miembroView->actualizar($miembro);
    }
    public function store(array $request){
        
    }
    public function delete(int $id){
        
    }
    public function find(int $id){
        
    }
}