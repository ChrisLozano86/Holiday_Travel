<?php

require_once 'Conexion.php';

class TipoHabitacion {

    private $idTipoHabitacion;
    private $tipo;
    private $descripcion;
 
   

    

    const TABLA = 'tipo_habitaciones';
    
    public function __construct($tipo=null, $descripcion=null, $idTipoHabitacion=null) {
        
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->idTipoHabitacion = $idTipoHabitacion;
      
       
    }

    public function getIdTipoHabitacion() {
        return $this->idTipoHabitacion;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

   





    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    
    

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idTipoHabitacion) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET tipo = :tipo, descripcion = :descripcion WHERE idTipoHabitacion = :idTipoHabitacion');
            $consulta->bindParam(':idTipoHabitacion', $this->idTipoHabitacion);
            $consulta->bindParam(':tipo', $this->tipo);
            $consulta->bindParam(':descripcion', $this->descripcion);  
            if ($consulta->execute()) {
                return true;
            } else {
                return false;
            }

        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (tipo, descripcion) VALUES (:tipo, :descripcion)');
            $consulta->bindParam(':tipo', $this->tipo);
            $consulta->bindParam(':descripcion', $this->descripcion);   
            if ($consulta->execute()) {
                $this->idTipoHabitacion= $conexion->lastInsertId();
                return true;
            } else {
                return false;
            }
          
            
        }
        $conexion = null;
    }
    
    public function eliminar(){
        //echo $this->idTipoHabitacion;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idTipoHabitacion = :idTipoHabitacion');
        $consulta->bindParam(':idTipoHabitacion', $this->idTipoHabitacion);
        $consulta->execute();
        $conexion = null;
       
    }

    public static function buscarPorId($idTipoHabitacion) {
   
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  idTipoHabitacion, tipo, descripcion FROM ' . self::TABLA . ' WHERE idTipoHabitacion = :idTipoHabitacion');
        $consulta->bindParam(':idTipoHabitacion', $idTipoHabitacion);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['tipo'], $registro['descripcion'], $idTipoHabitacion);
            
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
