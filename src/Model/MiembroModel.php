<?php
namespace Arquitectura\Model;

use Utils\Database;

class MiembroModel extends Database{
    private int $id;
    private string $nombres;
    private string $apellidos;
    private string $carnet;
    private string $celular;
    private \DateTime $fecha_ingreso;
    private string $estado;
    
    public function __construct(){
        $this->id = 0;
        $this->nombres = "";
        $this->apellidos = "";
        $this->carnet = "";
        $this->celular = "";
        $this->fecha_ingreso = "";
        $this->estado = "";
    }

    public function setData(array $data): void{
        $this->id = (int)$data['id'];
        $this->nombres = $data['nombres'];
        $this->apellidos = $data['apellidos'];
        $this->carnet = $data['carnet'];
        $this->celular = $data['celular'];
        $this->fecha_ingreso = $data['fecha_ingreso'];
        $this->estado = $data['estado'];
    }
    public function mostrarMiembro(): array
    {
        $conn = $this->getConnection();
        $result = $conn->query('SELECT * FROM miembro');
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $conn->close();
        return $data;
    }

    public function agregarMiembro(): array
    {
        $conn = $this->getConnection();

        // Inserción de un nuevo registro
        $sqlQuery = "INSERT INTO miembro (nombre, apellidos, carnet, celular, fecha_ingreso, estado) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bind_param("sssi", $this->nombres, $this->apellidos,$this->carnet,$this->celular,$this->fecha_ingreso,$this->estado);

        $result = $stmt->execute();

        if ($result) {
            // Puedes devolver los datos insertados
            $savedData = [
                "id" => $conn->insert_id, // El ID generado automáticamente por la base de datos
                "nombres" => $this->nombres,
                "apellidos" => $this->apellidos,
                "carnet" => $this->carnet,
                "celular" => $this->celular,
                "fecha_ingreso" => $this->fecha_ingreso,
                "estado" => $this->estado,
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