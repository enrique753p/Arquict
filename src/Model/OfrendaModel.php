<?php
namespace Arquitectura\Model;

class OfrendaModel{
    private int $id;
    private int $montoTotal;
    private \DateTime $fecha;
    private int $miembro_id;
    private int $actividad_id;
    
    public function __construct(){
        $this->id = 0;
        $this->montoTotal = 0;
        $this->fecha = "";
        $this->miembro_id = 0;
        $this->actividad_id = 0;
    }

    public function setData(array $data): void{
        $this->id = (int)$data['id'];
        $this->montoTotal = (int)$data['montoTotal'];
        $this->fecha = $data['fecha'];
        $this->miembro_id = (int)$data['miembro_id'];
        $this->actividad_id = (int)$data['actividad_id'];
    }
    
}