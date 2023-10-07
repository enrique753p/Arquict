<?php
namespace Arquitectura\View;

class ActividadView{
    private function renderTableBody(array $rows): string
    {
        $rowData = '';
        foreach ($rows as $row) {
            $rowData .= "<tr>";
            $rowData .= "<td>{$row['id']}</td>";
            $rowData .= "<td>{$row['nombre']}</td>";
            $rowData .= "<td>{$row['descripcion']}</td>";
            $rowData .= "</tr>";
        }

        return "<tbody>$rowData</tbody>";
    }

    public function actualizar(array $actividad): void
    {
        $title = 'Arquitectura MVC';
        $tbody = $this->renderTableBody($actividad);   
        include '../template/Actividad/index.php';
    }
}