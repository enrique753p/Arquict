<?php
namespace Arquitectura\Model;

class ParentescoModel{
    private int $id;
    private int $miembroId;
    private int $parentesco_miembro_id;
    private string $parentesco;

    public function __construct(){
        $this->id = 0;
        $this->miembroId = 0;
        $this->parentesco_miembro_id = 0;
        $this->parentesco = "";
    }
    public function setData(array $data): void{
        $this->id = (int)$data['id'];
        $this->miembroId = (int)$data['miembro_id'];
        $this->parentesco_miembro_id = (int)$data['parentesco_miembro_id'];
        $this->parentesco = $data['parentesco'];
    }
}