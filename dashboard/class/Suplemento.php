<?php

require_once 'Conexion.php';

class Suplemento {

    private $idSuplementoHabitacion;
    private $suplemento;
    private $descripcion;
 
   

    

    const TABLA = 'suplemento_habitaciones';
    
    public function __construct($suplemento=null, $descripcion=null, $idSuplementoHabitacion=null) {
        
        $this->suplemento = $suplemento;
        $this->descripcion = $descripcion;
        $this->idSuplementoHabitacion = $idSuplementoHabitacion;
      
       
    }

    public function getIdSuplementoHabitacion() {
        return $this->idSuplementoHabitacion;
    }

    public function getSuplemento() {
        return $this->suplemento;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

 

    public function setSuplemento($suplemento) {
        $this->suplemento = $suplemento;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    
    

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idSuplementoHabitacion) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET suplemento = :suplemento, descripcion = :descripcion WHERE idSuplementoHabitacion = :idSuplementoHabitacion');
            $consulta->bindParam(':idSuplementoHabitacion', $this->idSuplementoHabitacion);
            $consulta->bindParam(':suplemento', $this->suplemento);
            $consulta->bindParam(':descripcion', $this->descripcion);  
            if ($consulta->execute()) {
                return true;
            } else {
                return false;
            }

        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (suplemento, descripcion) VALUES (:suplemento, :descripcion)');
            $consulta->bindParam(':suplemento', $this->suplemento);
            $consulta->bindParam(':descripcion', $this->descripcion);   
            if ($consulta->execute()) {
                $this->idSuplementoHabitacion= $conexion->lastInsertId();
                return true;
            } else {
                return false;
            }
          
            
        }
        $conexion = null;
    }
    
    public function eliminar(){
        //echo $this->idSuplementoHabitacion;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idSuplementoHabitacion = :idSuplementoHabitacion');
        $consulta->bindParam(':idSuplementoHabitacion', $this->idSuplementoHabitacion);
        $consulta->execute();
        $conexion = null;
       
    }

    public static function buscarPorId($idSuplementoHabitacion) {
   
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  idSuplementoHabitacion, suplemento, descripcion FROM ' . self::TABLA . ' WHERE idSuplementoHabitacion = :idSuplementoHabitacion');
        $consulta->bindParam(':idSuplementoHabitacion', $idSuplementoHabitacion);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['suplemento'], $registro['descripcion'], $idSuplementoHabitacion);
            
        } else {
            return false;
            
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM '.self::TABLA);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


}
