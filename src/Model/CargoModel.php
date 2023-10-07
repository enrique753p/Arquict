<?php
namespace Arquitectura\Model;

use Utils\Database;

//require_once('../Model/Conexion/Database.php');

class CargoModel extends Database {
    private int $id ;
    private string $nombre ;
    private string $descripcion ;
    
    public function __construct(){
        $this->id=0;
        $this->nombre="";
        $this->descripcion="";
    }

    public function setData(array $data):void{
        $this->id=(int)$data['id'];
        $this->nombre=$data['nombre'];
        $this->descripcion=$data['descripcion'];
    }
    public function mostrarCargo(): array
    {
        $conn = $this->getConnection();
        $result = $conn->query('SELECT * FROM cargo');
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $conn->close();
        return $data;
    }
    public function agregarCargo(): array
    {
        $conn = $this->getConnection();

        // Inserción de un nuevo registro
        $sqlQuery = "INSERT INTO cargo (nombre, descripcion) VALUES (?, ?)";
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bind_param("sssi", $this->nombre, $this->descripcion);

        $result = $stmt->execute();

        if ($result) {
            // Puedes devolver los datos insertados
            $savedData = [
                "id" => $conn->insert_id, // El ID generado automáticamente por la base de datos
                "nombre" => $this->nombre,
                "descripcion" => $this->descripcion,
            ];
        } else {
            // Manejo de errores en caso de falla en la operación de base de datos
            $savedData = ["error" => "Error al guardar el registro"];
        }

        $stmt->close();
        $conn->close();

        return $savedData;
    }
}