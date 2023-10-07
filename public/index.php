<?php

use Arquitectura\Controller\ActividadController;
use Arquitectura\Controller\CargoController;
use Arquitectura\Controller\EventoController;
use Arquitectura\Controller\MiembroController;

    require "../vendor/autoload.php";
    require_once('../src/controller/HomeController.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/') {
    $home = new HomeController();
    $home->index();
    return;
    }

    //------------------------Cargo------------------------------------------------------

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/cargo') {
        $cargo = new CargoController();
        $cargo->mostrarCargo();
        return;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/cargo') {
        $cargo = new CargoController();
        $cargo->agregarCargo($_POST);
        return;
    }
    //------------------------Cargo------------------------------------------------------


    //------------------------Evento------------------------------------------------------
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/evento') {
        $evento = new EventoController();
        $evento->mostrarEvento();
        return;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/evento') {
        $cargo = new EventoController();
       // $cargo->agregarCargo();
        $cargo->agregarEvento($_POST);
        return;
    }
    //------------------------Evento------------------------------------------------------


    //------------------------Actividad------------------------------------------------------
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/actividad') {
        $evento = new ActividadController();
        $evento->mostrarActividad();
        return;
     }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/actividad') {
        $cargo = new ActividadController();
        // $cargo->agregarCargo();
        $cargo->agregarActividad($_POST);
        return;
    }


    //------------------------Miembro------------------------------------------------------
    if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SERVER['REQUEST_URI'] == '/miembro') {
        $evento = new MiembroController();
        $evento->mostrarMiembro();
        return;
     }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == '/miembro') {
        $cargo = new MiembroController();
        // $cargo->agregarCargo();
        $cargo->agregarMiembro($_POST);
        return;
    }
    //------------------------Miembro------------------------------------------------------
