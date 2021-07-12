<?php

require_once 'Conexion.php';

class PlanAlimento {

    private $idPlanAlimento;
    private $plan;
    private $descripcion;
 
   

    

    const TABLA = 'plan_alimentos';
    
    public function __construct($plan=null, $descripcion=null, $idPlanAlimento=null) {
        
        $this->plan = $plan;
        $this->descripcion = $descripcion;
        $this->idPlanAlimento = $idPlanAlimento;
      
       
    }

    public function getIdPlanAlimento() {
        return $this->idPlanAlimento;
    }

    public function getPlan() {
        return $this->plan;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

 

    public function setPlan($plan) {
        $this->plan = $plan;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    
    

    public function guardar() {
        $conexion = new Conexion();
        if ($this->idPlanAlimento) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET plan = :plan, descripcion = :descripcion WHERE idPlanAlimento = :idPlanAlimento');
            $consulta->bindParam(':idPlanAlimento', $this->idPlanAlimento);
            $consulta->bindParam(':plan', $this->plan);
            $consulta->bindParam(':descripcion', $this->descripcion);  
            if ($consulta->execute()) {
                return true;
            } else {
                return false;
            }

        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (plan, descripcion) VALUES (:plan, :descripcion)');
            $consulta->bindParam(':plan', $this->plan);
            $consulta->bindParam(':descripcion', $this->descripcion);   
            if ($consulta->execute()) {
                $this->idPlanAlimento= $conexion->lastInsertId();
                return true;
            } else {
                return false;
            }
          
            
        }
        $conexion = null;
    }
    
    public function eliminar(){
        //echo $this->idPlanAlimento;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idPlanAlimento = :idPlanAlimento');
        $consulta->bindParam(':idPlanAlimento', $this->idPlanAlimento);
        $consulta->execute();
        $conexion = null;
       
    }

    public static function buscarPorId($idPlanAlimento) {
   
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT  idPlanAlimento, plan, descripcion FROM ' . self::TABLA . ' WHERE idPlanAlimento = :idPlanAlimento');
        $consulta->bindParam(':idPlanAlimento', $idPlanAlimento);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['plan'], $registro['descripcion'], $idPlanAlimento);
            
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
