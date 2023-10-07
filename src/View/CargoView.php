<?php
namespace Arquitectura\View;

class CargoView{

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

    public function actualizar(array $cargo): void
    {
        $title = 'Arquitectura MVC';
        $tbody = $this->renderTableBody($cargo);   
        include '../template/Cargo/index.php';
    }
}