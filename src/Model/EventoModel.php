<?php
namespace Arquitectura\Model;

use Utils\Database;

class EventoModel extends Database{
    private int $id;
    private string $nombre;
    private \DateTime $fecha_programada;
    private string $detalle;
    
    public function __construct(){
        $this->id = 0;
        $this->nombre = "";
        $this->fecha_programada = "";
        $this->detalle = "";
    }

    public function setData(array $data): void{
        $this->id = (int)$data['id'];
        $this->nombre = $data['nombre'];
        $this->fecha_programada = $data['fecha_programada'];
        $this->detalle = $data['detalle'];
    }

    public function mostrarEvento(): array
    {
        $conn = $this->getConnection();
        $result = $conn->query('SELECT * FROM evento');
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $conn->close();
        return $data;
    }
    public function agregarEvento(): array
    {
        $conn = $this->getConnection();

        // Inserción de un nuevo registro
        $sqlQuery = "INSERT INTO evento (nombre, fecha_programada , detalle) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bind_param("sssi", $this->nombre, $this->fecha_programada,$this->detalle);

        $result = $stmt->execute();

        if ($result) {
            // Puedes devolver los datos insertados
            $savedData = [
                "id" => $conn->insert_id, // El ID generado automáticamente por la base de datos
                "nombre" => $this->nombre,
                "fecha_programada" => $this->fecha_programada,
                "detalle" => $this->detalle,
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