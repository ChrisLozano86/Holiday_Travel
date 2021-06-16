<?php

require_once 'Conexion.php';

class Pago
{

    private $idPagoReserva;
    private $idReserva;
    private $fecha_pago;
    private $referencia;
    private $forma_pago;
    private $monto;
    private $tipo_cambio;
    private $descripcion;
    private $creado_por;
    private $categoria_pago;
    


    const TABLA = 'pago_reservaciones';

    public function __construct($idReserva = null, $fecha_pago = null, $referencia = null, $forma_pago = null,
     $monto = null, $tipo_cambio=null, $descripcion = null, $creado_por = null, $categoria_pago=null, $idPagoReserva = null)
    {
        
        $this->idReserva = $idReserva;
        $this->referencia = $referencia;
        $this->fecha_pago = $fecha_pago;
        $this->forma_pago = $forma_pago;
        $this->monto = $monto;
        $this->tipo_cambio = $tipo_cambio;
        $this->descripcion = $descripcion;
        $this->creado_por = $creado_por;
        $this->categoria_pago = $categoria_pago;
        $this->idPagoReserva = $idPagoReserva;
    }

    //Getters

    public function getIdPagoReserva()
    {
        return $this->idPagoReserva;
    }

    public function getIdReserva()
    {
        return $this->idReserva;
    }

    public function getFechaPago()
    {
        return $this->fecha_pago;
    }

    public function getReferencia()
    {
        return $this->referencia;
    } 

    public function getFormaPago()
    {
        return $this->forma_pago;
    }

    public function getMonto()
    {
        return $this->monto;
    }

    public function getTipoCambio()
    {
        return $this->tipo_cambio;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getCreadoPor()
    {
        return $this->creado_por;
    }

    public function getCategoriaPago()
    {
        return $this->categoria_pago;
    }
   

    //Setters

    public function setIdReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }

    public function setFechaPago($fecha_pago)
    {
        $this->fecha_pago = $fecha_pago;
    }


    public function setReferencia($referencia)
    {
        $this->referencia = $referencia;
    }

    public function setFormaPago($forma_pago)
    {
        $this->forma_pago = $forma_pago;
    }

    public function setMonto($monto)
    {
        $this->monto = $monto;
    }

    public function setTipoCambio($tipo_cambio)
    {
        $this->tipo_cambio = $tipo_cambio;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setCreadoPor($creado_por)
    {
        $this->creado_por = $creado_por;
    }

    public function setCategoriaPago($categoria_pago)
    {
        $this->categoria_pago = $categoria_pago;
    }


    
    public function guardar()
    {
        $conexion = new Conexion();
        if ($this->idPagoReserva) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET idReserva = :idReserva, fecha_pago = :fecha_pago, referencia = :referencia,
             forma_pago=:forma_pago, monto = :monto, tipo_cambio = :tipo_cambio, descripcion = :descripcion, creado_por = :creado_por, categoria_pago = :categoria_pago WHERE idPagoReserva = :idPagoReserva');
            $consulta->bindParam(':idPagoReserva', $this->idPagoReserva);
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':fecha_pago', $this->fecha_pago);
            $consulta->bindParam(':referencia', $this->referencia);
            $consulta->bindParam(':forma_pago', $this->forma_pago);
            $consulta->bindParam(':monto', $this->monto);
            $consulta->bindParam(':tipo_cambio', $this->tipo_cambio);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':creado_por', $this->creado_por);
            $consulta->bindParam(':categoria_pago', $this->categoria_pago);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (idReserva, fecha_pago, referencia, forma_pago, monto, tipo_cambio, descripcion, creado_por, categoria_pago)
             VALUES (:idReserva, :fecha_pago, :referencia, :forma_pago, :monto, :tipo_cambio, :descripcion, :creado_por, :categoria_pago)');
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':fecha_pago', $this->fecha_pago);
            $consulta->bindParam(':referencia', $this->referencia);
            $consulta->bindParam(':forma_pago', $this->forma_pago);
            $consulta->bindParam(':monto', $this->monto);
            $consulta->bindParam(':tipo_cambio', $this->tipo_cambio);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':creado_por', $this->creado_por);
            $consulta->bindParam(':categoria_pago', $this->categoria_pago);
            if ($consulta->execute()) {
                $this->idPagoReserva = $conexion->lastInsertId();
                return true;
            } else {
                return false;
            }
        }
        $conexion = null;
    }

    public function eliminar()
    {
        //echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idPagoReserva = :idPagoReserva');
        $consulta->bindParam(':idPagoReserva', $this->idPagoReserva);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idPagoReserva)
    {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idPagoReserva = :idPagoReserva');
        $consulta->bindParam(':idPagoReserva', $idPagoReserva);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['idReserva'], $registro['fecha_pago'], $registro['referencia'], $registro['forma_pago'], $registro['monto'], $registro['tipo_cambio'], $registro['descripcion'], $registro['creado_por'], $registro['categoria_pago'], $idPagoReserva);
        } else {
            return false;
        }
    }

    public static function recuperarPagosAgencia($idReserva)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM pago_reservaciones WHERE idReserva = :idReserva AND categoria_pago = 1 ORDER BY fecha_pago ASC');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public static function recuperarPagosOperadora($idReserva)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM pago_reservaciones WHERE idReserva = :idReserva AND categoria_pago = 2 ORDER BY fecha_pago ASC');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public static function recuperarTotalAbonado($idReserva, $category)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT monto FROM pago_reservaciones WHERE idReserva = :idReserva AND categoria_pago = :category');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':category', $category);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public static function recuperarTotalAbonadoOperadora($idReserva)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT monto FROM pago_reservaciones WHERE idReserva = :idReserva AND categoria_pago = 2');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public function eliminarHistorialPago($idReserva, $category)
    {
        //echo $this->id;
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idReserva = :idReserva AND categoria_pago = :category');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':category', $category);
        $consulta->execute();
        $conexion = null;
    }


}
