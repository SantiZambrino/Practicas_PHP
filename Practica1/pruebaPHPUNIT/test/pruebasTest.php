<?php 
 use PHPUnit\Framework\TestCase;
 include "../Practicas_PHP/Practica1/biblioteca/funcionesZamoen.php";
 

class pruebasTest extends TestCase {

    public function testcamposCompletados(){
        $matricula = '123jhs';
        $tipoServicio = 'cambio aceite';
        $descripcionServicio = 'lkajsdlkjalskdjk';
        $this ->assertTrue(camposCompletados($matricula, $tipoServicio, $descripcionServicio),'Los campos estan completados');
        $this ->assertFalse(camposCompletados($matricula, '', $descripcionServicio),'Los campos estan completados');
    }
     public function testCompletadosNuevoUsu(){
        $nombre = 'Pepe';
        $apellidos = 'Gomez';
        $dni = '79149092B';
        $telefono = '614625374';
        $email = 'pepegomez@gmail.com';
        $contraseña = 'pepegomez321';
        $this ->assertTrue(camposCompletadosNuevoUsuario($nombre, $apellidos,$dni,$telefono,$email,$contraseña));
        $this ->assertFalse(camposCompletadosNuevoUsuario($nombre, $apellidos,$dni,'',$email,$contraseña));
     }

     public function testDatosvehiculos(){
         $matricula = '123jhs';
         $marca = 'Volvo';
         $year = 2019;
         $this ->assertTrue(comprobarDatosNuevoVehivulo($matricula,$marca,$year));
         $this ->assertFalse(comprobarDatosNuevoVehivulo($matricula,'',$year));
     }
}

?>