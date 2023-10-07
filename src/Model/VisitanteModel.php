<?php
namespace Arquitectura\Model;

class VisitanteModel{
    private int $id;
    private string $nombreCompleto;
    private ?string $celular;
    private ?string $motivo;
    private ?int $miembro_id;

    public function __construct(){
        $this->id = 0;
        $this->nombreCompleto = "";
        $this->celular = null;
        $this->motivo = null;
        $this->miembro_id = null;
    }
    public function setData(array $data): void {
        $this->id = (int)$data['id'];
        $this->nombreCompleto = $data['nombre_completo'];
        $this->celular = isset($data['celular']) ? $data['celular'] : null;
        $this->motivo = isset($data['motivo']) ? $data['motivo'] : null;
        $this->miembro_id = isset($data['miembro_id']) ? (int)$data['miembro_id'] : null;
    }
    
}