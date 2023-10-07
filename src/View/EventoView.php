<?php
namespace Arquitectura\View;

class EventoView{
    private function renderTableBody(array $rows): string
    {
        $rowData = '';
        foreach ($rows as $row) {
            $rowData .= "<tr>";
            $rowData .= "<td>{$row['id']}</td>";
            $rowData .= "<td>{$row['nombre']}</td>";
            $rowData .= "<td>{$row['fecha_programada']}</td>";
            $rowData .= "<td>{$row['detalle']}</td>";
            $rowData .= "</tr>";
        }

        return "<tbody>$rowData</tbody>";
    }

    public function actualizar(array $evento): void
    {
        $title = 'Arquitectura MVC';
        $tbody = $this->renderTableBody($evento);   
        include '../template/Evento/index.php';
    }
}