<?php

require_once 'Conexion.php';

class Habitacion {

    private $idHabitacion;
    private $idReserva;
    private $idTipoHabitacion;
    private $idSuplemento;
    private $idPlanAlimento;
    private $costo;

    

    const TABLA = 'reserva_habitaciones';
    
    public function __construct($idReserva=null, $idTipoHabitacion=null, $idSuplemento=null, $idPlanAlimento=null, $costo=null, $idHabitacion=null) {
        
        $this->idReserva = $idReserva;
        $this->idTipoHabitacion = $idTipoHabitacion;
        $this->idSuplemento = $idSuplemento;
        $this->idPlanAlimento = $idPlanAlimento;
        $this->costo = $costo;
        $this->idHabitacion = $idHabitacion;
      
       
    }

    public function getIdHabitacion() {
        return $this->idHabitacion;
    }

    public function getIdReserva() {
        return $this->idReserva;
    }

    public function getIdTipoHabitacion() {
        return $this->idTipoHabitacion;
    }

    public function getIdSuplemento() {
        return $this->idSuplemento;
    }

    public function getIdPlanAlimento() {
        return $this->idPlanAlimento;
    }

    public function getCosto() {
        return $this->costo;
    }




    public function setIdReserva($idReserva) {
        $this->idReserva = $idReserva;
    }

    public function setIdTipoHabitacion($idTipoHabitacion) {
        $this->idTipoHabitacion = $idTipoHabitacion;
    }

    public function setIdSuplemento($idSuplemento) {
        $this->idSuplemento = $idSuplemento;
    }

    public function setIdPlanAlimento($idPlanAlimento) {
        $this->idPlanAlimento = $idPlanAlimento;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idHabitacion) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET idReserva = :idReserva, idTipoHabitacion = :idTipoHabitacion, idSuplemento = :idSuplemento, idPlanAlimento = :idPlanAlimento, costo = :costo WHERE idHabitacion = :idHabitacion');
            $consulta->bindParam(':idHabitacion', $this->idHabitacion);
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':idTipoHabitacion', $this->idTipoHabitacion);  
            $consulta->bindParam(':idSuplemento', $this->idSuplemento);  
            $consulta->bindParam(':idPlanAlimento', $this->idPlanAlimento);  
            $consulta->bindParam(':costo', $this->costo);     
            if ($consulta->execute()) {
                return true;
            } else {
                return false;
            }

        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (idReserva, idTipoHabitacion, idSuplemento, idPlanAlimento, costo) VALUES (:idReserva, :idTipoHabitacion, :idSuplemento, :idPlanAlimento, :costo)');
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':idTipoHabitacion', $this->idTipoHabitacion);  
            $consulta->bindParam(':idSuplemento', $this->idSuplemento);  
            $consulta->bindParam(':idPlanAlimento', $this->idPlanAlimento);
            $consulta->bindParam(':costo', $this->costo);     
            if ($consulta->execute()) {
                $this->idHabitacion= $conexion->lastInsertId();
                return true;
            } else {
                return false;
            }
          
            
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
        $consulta = $conexion->prepare('SELECT  idHabitacion, idReserva, idTipoHabitacion, idSuplemento, idPlanAlimento FROM ' . self::TABLA . ' WHERE idHabitacion = :idHabitacion');
        $consulta->bindParam(':idHabitacion', $idHabitacion);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['idReserva'], $registro['idTipoHabitacion'], $registro['idSuplemento'], $registro['idPlanAlimento'], $registro['costo'], $idHabitacion);
            
        } else {
            return false;
            
        }
    }

    public static function recuperarTodos($idReserva) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT h.idHabitacion, h.idReserva, h.costo, th.tipo, sh.suplemento, pa.plan FROM reserva_habitaciones h
                                        JOIN tipo_habitaciones th ON h.idTipoHabitacion = th.idTipoHabitacion 
                                        JOIN suplemento_habitaciones sh ON h.idSuplemento = sh.idSuplementoHabitacion
                                        JOIN plan_alimentos pa ON h.idPlanAlimento = pa.idPlanAlimento
                                        WHERE h.idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


}
