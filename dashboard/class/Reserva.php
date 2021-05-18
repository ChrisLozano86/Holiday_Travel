<?php

require_once 'Conexion.php';

class Reserva
{

    private $idReserva;
    private $agencia;
    private $titular;
    private $fecha_reservacion;
    private $broker;
    private $clave;
    private $descripcion;
    private $fecha_inicio;
    private $precio;
    private $estatus_servicio;
    private $pago_operadora;
    private $pago_agencia;
    private $fecha_limite;
    private $fecha_notificacion;
    private $estatus_notificacion;


    const TABLA = 'reservaciones';

    public function __construct($agencia = null, $titular = null, $fecha_reservacion = null, $broker = null,
     $clave = null, $descripcion = null, $fecha_inicio = null, $precio = null, $estatus_servicio = null,
     $pago_operadora = null, $pago_agencia = null, $fecha_limite = null, $fecha_notificacion = null, $estatus_notificacion = null,  $idReserva = null)
    {
        
        $this->agencia = $agencia;
        $this->fecha_reservacion = $fecha_reservacion;
        $this->titular = $titular;
        $this->broker = $broker;
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->fecha_inicio = $fecha_inicio;
        $this->precio = $precio;
        $this->estatus_servicio = $estatus_servicio;
        $this->pago_operadora = $pago_operadora;
        $this->pago_agencia = $pago_agencia;
        $this->fecha_limite = $fecha_limite;
        $this->fecha_notificacion = $fecha_notificacion;
        $this->estatus_notificacion = $estatus_notificacion;
        $this->idReserva = $idReserva;
    }

    //Getters

    public function getIdReserva()
    {
        return $this->idReserva;
    }

    public function getAgencia()
    {
        return $this->agencia;
    }

    public function getTitular()
    {
        return $this->titular;
    }

    public function getFechaReservacion()
    {
        return $this->fecha_reservacion;
    }

    public function getBroker()
    {
        return $this->broker;
    }

    public function getClave()
    {
        return $this->clave;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getEstatusServicio()
    {
        return $this->estatus_servicio;
    }

    public function getPagoOperadora()
    {
        return $this->pago_operadora;
    }

    public function getPagoAgencia()
    {
        return $this->pago_agencia;
    }

    public function getFechaLimite()
    {
        return $this->fecha_limite;
    }

    public function getFechaNotificacion()
    {
        return $this->fecha_notificacion;
    }

    public function getEstatusNotificacion()
    {
        return $this->estatus_notificacion;
    }

    //Setters

    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;
    }

    public function setTitular($titular)
    {
        $this->titular = $titular;
    }


    public function setFechaReservacion($fecha_reservacion)
    {
        $this->fecha_reservacion = $fecha_reservacion;
    }

    public function setBroker($broker)
    {
        $this->broker = $broker;
    }

    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function setEstatusServicio($estatus_servicio)
    {
        $this->estatus_servicio= $estatus_servicio;
    }

    public function setPagoOperadora($pago_operadora)
    {
        $this->pago_operadora = $pago_operadora;
    }

    public function setPagoAgencia($pago_agencia)
    {
        $this->pago_agencia = $pago_agencia;
    }

    public function setFechaLimite($fecha_limite)
    {
        $this->fecha_limite = $fecha_limite;
    }

    public function setFechaNotificacion($fecha_notificacion)
    {
        $this->fecha_notificacion = $fecha_notificacion;
    }

    public function setEstatusNotificacion($estatus_notificacion)
    {
        $this->estatus_notificacion = $estatus_notificacion;
    }




    public function guardar()
    {
        $conexion = new Conexion();
        if ($this->idReserva) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET agencia = :agencia, titular = :titular, fecha_reservacion = :fecha_reservacion,
             broker=:broker, clave = :clave, descripcion = :descripcion, fecha_inicio = :fecha_inicio, precio = :precio, estatus_servicio = :estatus_servicio, pago_operadora = :pago_operadora, 
             pago_agencia = :pago_agencia, fecha_limite = :fecha_limite, fecha_notificacion = :fecha_notificacion, estatus_notificacion = :estatus_notificacion WHERE idReserva = :idReserva');
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':agencia', $this->agencia);
            $consulta->bindParam(':titular', $this->titular);
            $consulta->bindParam(':fecha_reservacion', $this->fecha_reservacion);
            $consulta->bindParam(':broker', $this->broker);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':estatus_servicio', $this->estatus_servicio);
            $consulta->bindParam(':pago_operadora', $this->pago_operadora);
            $consulta->bindParam(':pago_agencia', $this->pago_agencia);
            $consulta->bindParam(':fecha_limite', $this->fecha_limite);
            $consulta->bindParam(':fecha_notificacion', $this->fecha_notificacion);
            $consulta->bindParam(':estatus_notificacion', $this->estatus_notificacion);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (agencia, titular, fecha_reservacion, broker, clave, descripcion, fecha_inicio, precio, estatus_servicio, pago_operadora, pago_agencia, fecha_limite, fecha_notificacion, estatus_notificacion)
             VALUES (:agencia, :titular, :fecha_reservacion, :broker, :clave, :descripcion, :fecha_inicio, :precio, :estatus_servicio, :pago_operadora, :pago_agencia, :fecha_limite, :fecha_notificacion, :estatus_notificacion)');
            $consulta->bindParam(':agencia', $this->agencia);
            $consulta->bindParam(':titular', $this->titular);
            $consulta->bindParam(':fecha_reservacion', $this->fecha_reservacion);
            $consulta->bindParam(':broker', $this->broker);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':estatus_servicio', $this->estatus_servicio);
            $consulta->bindParam(':pago_operadora', $this->pago_operadora);
            $consulta->bindParam(':pago_agencia', $this->pago_agencia);
            $consulta->bindParam(':fecha_limite', $this->fecha_limite);
            $consulta->bindParam(':fecha_notificacion', $this->fecha_notificacion);
            $consulta->bindParam(':estatus_notificacion', $this->estatus_notificacion);
            if ($consulta->execute()) {
                $this->idReserva = $conexion->lastInsertId();
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
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $this->idReserva);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idReserva)
    {

        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->execute();
        $registro = $consulta->fetch();
        //var_dump($registro);
        $conexion = null;
        if ($registro) {
            return new self($registro['agencia'], $registro['titular'], $registro['fecha_reservacion'], $registro['broker'], $registro['clave'], $registro['descripcion'], $registro['fecha_inicio'], $registro['precio'], $registro['estatus_servicio'], $registro['pago_operadora'], $registro['pago_agencia'], $registro['fecha_limite'], $registro['fecha_notificacion'], $registro['estatus_notificacion'], $idReserva);
        } else {
            return false;
        }
    }

    public static function recuperarTodos()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones ORDER BY idReserva DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public static function recuperarPendientesPago()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones WHERE NOW() > fecha_notificacion AND (pago_operadora = "No Pagado" OR pago_agencia = "No Pagado") ORDER BY idReserva DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public static function enviarNotificaciones()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones WHERE NOW() > fecha_notificacion AND (pago_operadora = "No Pagado" OR pago_agencia = "No Pagado") AND estatus_notificacion = 0 ORDER BY idReserva DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public static function actualizarEstatusNotificacion($idReserva, $estatus_notificacion)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus_notificacion = :estatus_notificacion WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':estatus_notificacion', $estatus_notificacion);
        $consulta->execute();
        $conexion = null;
        
    }



    
}
