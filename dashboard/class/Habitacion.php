<?php

require_once 'Conexion.php';

class Habitacion {

    private $idHabitacion;
    private $idReserva;
    private $tipo_habitacion;
    private $suplemento;
    private $plan_alimento;

    

    const TABLA = 'reserva_habitaciones';
    
    public function __construct($idReserva=null, $tipo_habitacion=null, $suplemento=null, $plan_alimento=null, $idHabitacion=null) {
        
        $this->idReserva = $idReserva;
        $this->tipo_habitacion = $tipo_habitacion;
        $this->suplemento = $suplemento;
        $this->plan_alimento = $plan_alimento;
        $this->idHabitacion = $idHabitacion;
      
       
    }

    public function getIdHabitacion() {
        return $this->idHabitacion;
    }

    public function getIdReserva() {
        return $this->idReserva;
    }

    public function getTipoHabitacion() {
        return $this->tipo_habitacion;
    }

    public function getSuplemento() {
        return $this->suplemento;
    }

    public function getPlanAlimento() {
        return $this->plan_alimento;
    }





    public function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    public function setTipoHabitacion($tipo_habitacion) {
        $this->tipo_habitacion = $tipo_habitacion;
    }

    public function setSuplemento($suplemento) {
        $this->suplemento = $suplemento;
    }

    public function setPlanAlimento($plan_alimento) {
        $this->plan_alimento = $plan_alimento;
    }

    

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idHabitacion) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET idReserva = :idReserva, tipo_habitacion = :tipo_habitacion, suplemento = :suplemento, plan_alimento = :plan_alimento WHERE idHabitacion = :idHabitacion');
            $consulta->bindParam(':idHabitacion', $this->idHabitacion);
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':tipo_habitacion', $this->tipo_habitacion);  
            $consulta->bindParam(':suplemento', $this->suplemento);  
            $consulta->bindParam(':plan_alimento', $this->plan_alimento);  
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (idReserva, tipo_habitacion, suplemento, plan_alimento) VALUES (:idReserva, :tipo_habitacion, :suplemento, :plan_alimento)');
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':tipo_habitacion', $this->tipo_habitacion);  
            $consulta->bindParam(':suplemento', $this->suplemento);  
            $consulta->bindParam(':plan_alimento', $this->plan_alimento);   
            $consulta->execute();
            $this->idHabitacion = $conexion->lastInsertId();
          
            
        }
        $conexion = null;
    }
    
    public function eliminar(){
        //echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idHabitacion = :idHabitacion');
        $consulta->bindParam(':idHabitacion', $this->idHabitacion);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idHabitacion) {
   
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  idReserva, tipo_habitacion, suplemento, plan_alimento FROM ' . self::TABLA . ' WHERE idHabitacion = :idHabitacion');
        $consulta->bindParam(':idHabitacion', $idHabitacion);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['idReserva'], $registro['tipo_habitacion'], $registro['suplemento'], $registro['plan_alimento'], $idHabitacion);
            
        } else {
            return false;
            
        }
    }

    public static function recuperarTodos($idReserva) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM '.self::TABLA.' WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


}
