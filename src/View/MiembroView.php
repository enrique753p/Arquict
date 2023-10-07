<?php
namespace Arquitectura\View;

class MiembroView{
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

    public function actualizar(array $miembro): void
    {
        $title = 'Arquitectura MVC';
        $tbody = $this->renderTableBody($miembro);   
        include '../template/Miembro/index.php';
    }
}