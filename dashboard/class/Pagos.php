<?php

require_once 'Conexion.php';

class Reserva
{

    private $idPagoReserva;
    private $idReserva;
    private $fecha_pago;
    private $fecha_reservacion;
    private $broker;
    private $clave;
    private $descripcion;
    private $destino;
    private $fecha_inicio;
    private $precio;
    private $estatus_servicio;
    private $pago_operadora;
    private $pago_idReserva;
    private $fecha_limite;
    private $fecha_notificacion;
    private $estatus_notificacion;
    private $estatus_reserva;


    const TABLA = 'reservaciones';

    public function __construct($idReserva = null, $fecha_pago = null, $fecha_reservacion = null, $broker = null,
     $clave = null, $descripcion = null, $destino=null, $fecha_inicio = null, $precio = null, $estatus_servicio = null,
     $pago_operadora = null, $pago_idReserva = null, $fecha_limite = null, $fecha_notificacion = null, $estatus_notificacion = null, $estatus_reserva=null, $idPagoReserva = null)
    {
        
        $this->idReserva = $idReserva;
        $this->fecha_reservacion = $fecha_reservacion;
        $this->fecha_pago = $fecha_pago;
        $this->broker = $broker;
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->destino = $destino;
        $this->fecha_inicio = $fecha_inicio;
        $this->precio = $precio;
        $this->estatus_servicio = $estatus_servicio;
        $this->pago_operadora = $pago_operadora;
        $this->pago_idReserva = $pago_idReserva;
        $this->fecha_limite = $fecha_limite;
        $this->fecha_notificacion = $fecha_notificacion;
        $this->estatus_notificacion = $estatus_notificacion;
        $this->estatus_reserva = $estatus_reserva;
        $this->idPagoReserva = $idPagoReserva;
    }

    //Getters

    public function getidPagoReserva()
    {
        return $this->idPagoReserva;
    }

    public function getidReserva()
    {
        return $this->idReserva;
    }

    public function getfecha_pago()
    {
        return $this->fecha_pago;
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

    public function getDestino()
    {
        return $this->destino;
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

    public function getPagoidReserva()
    {
        return $this->pago_idReserva;
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
    public function getEstatusReserva()
    {
        return $this->estatus_reserva;
    }

    //Setters

    public function setidReserva($idReserva)
    {
        $this->idReserva = $idReserva;
    }

    public function setfecha_pago($fecha_pago)
    {
        $this->fecha_pago = $fecha_pago;
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

    public function setDestino($destino)
    {
        $this->destino = $destino;
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

    public function setPagoidReserva($pago_idReserva)
    {
        $this->pago_idReserva = $pago_idReserva;
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
    public function setEstatusReserva($estatus_reserva)
    {
        $this->estatus_reserva = $estatus_reserva;
    }




    public function guardar()
    {
        $conexion = new Conexion();
        if ($this->idPagoReserva) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET idReserva = :idReserva, fecha_pago = :fecha_pago, fecha_reservacion = :fecha_reservacion,
             broker=:broker, clave = :clave, descripcion = :descripcion, destino=:destino, fecha_inicio = :fecha_inicio, precio = :precio, estatus_servicio = :estatus_servicio, pago_operadora = :pago_operadora, 
             pago_idReserva = :pago_idReserva, fecha_limite = :fecha_limite, fecha_notificacion = :fecha_notificacion, estatus_notificacion = :estatus_notificacion, estatus_reserva = :estatus_reserva WHERE idPagoReserva = :idPagoReserva');
            $consulta->bindParam(':idPagoReserva', $this->idPagoReserva);
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':fecha_pago', $this->fecha_pago);
            $consulta->bindParam(':fecha_reservacion', $this->fecha_reservacion);
            $consulta->bindParam(':broker', $this->broker);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':destino', $this->destino);
            $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':estatus_servicio', $this->estatus_servicio);
            $consulta->bindParam(':pago_operadora', $this->pago_operadora);
            $consulta->bindParam(':pago_idReserva', $this->pago_idReserva);
            $consulta->bindParam(':fecha_limite', $this->fecha_limite);
            $consulta->bindParam(':fecha_notificacion', $this->fecha_notificacion);
            $consulta->bindParam(':estatus_notificacion', $this->estatus_notificacion);
            $consulta->bindParam(':estatus_reserva', $this->estatus_reserva);
            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (idReserva, fecha_pago, fecha_reservacion, broker, clave, descripcion, destino, fecha_inicio, precio, estatus_servicio, pago_operadora, pago_idReserva, fecha_limite, fecha_notificacion, estatus_notificacion, estatus_reserva)
             VALUES (:idReserva, :fecha_pago, :fecha_reservacion, :broker, :clave, :descripcion, :destino, :fecha_inicio, :precio, :estatus_servicio, :pago_operadora, :pago_idReserva, :fecha_limite, :fecha_notificacion, :estatus_notificacion, :estatus_reserva)');
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':fecha_pago', $this->fecha_pago);
            $consulta->bindParam(':fecha_reservacion', $this->fecha_reservacion);
            $consulta->bindParam(':broker', $this->broker);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':destino', $this->destino);
            $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':estatus_servicio', $this->estatus_servicio);
            $consulta->bindParam(':pago_operadora', $this->pago_operadora);
            $consulta->bindParam(':pago_idReserva', $this->pago_idReserva);
            $consulta->bindParam(':fecha_limite', $this->fecha_limite);
            $consulta->bindParam(':fecha_notificacion', $this->fecha_notificacion);
            $consulta->bindParam(':estatus_notificacion', $this->estatus_notificacion);
            $consulta->bindParam(':estatus_reserva', $this->estatus_reserva);
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
            return new self($registro['idReserva'], $registro['fecha_pago'], $registro['fecha_reservacion'], $registro['broker'], $registro['clave'], $registro['descripcion'], $registro['destino'], $registro['fecha_inicio'], $registro['precio'], $registro['estatus_servicio'], $registro['pago_operadora'], $registro['pago_idReserva'], $registro['fecha_limite'], $registro['fecha_notificacion'], $registro['estatus_notificacion'], $registro['estatus_reserva'], $idPagoReserva);
        } else {
            return false;
        }
    }

    public static function recuperarTodos()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones ORDER BY idPagoReserva DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public static function recuperarPendientesPago()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones WHERE NOW() > fecha_notificacion AND (pago_operadora = "No Pagado" OR pago_idReserva = "No Pagado") AND estatus_reserva = "Activa" ORDER BY idPagoReserva ASC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public static function enviarNotificaciones()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones WHERE NOW() > fecha_notificacion AND (pago_operadora = "No Pagado" OR pago_idReserva = "No Pagado") AND estatus_reserva = "Activa" AND estatus_notificacion = 0 ORDER BY idPagoReserva DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public function actualizarEstatusNotificacion($idPagoReserva, $estatus_notificacion)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus_notificacion = :estatus_notificacion WHERE idPagoReserva = :idPagoReserva');
        $consulta->bindParam(':idPagoReserva', $idPagoReserva);
        $consulta->bindParam(':estatus_notificacion', $estatus_notificacion);
        $consulta->execute();
        $conexion = null;
        
    }

    public function actualizarEstatusReserva($idPagoReserva, $estatus_reserva)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus_reserva = :estatus_reserva WHERE idPagoReserva = :idPagoReserva');
        $consulta->bindParam(':idPagoReserva', $idPagoReserva);
        $consulta->bindParam(':estatus_reserva', $estatus_reserva);
        $consulta->execute();
        $conexion = null;
        
    }

    public function actualizarPagoOperadora($idPagoReserva, $pago_operadora)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET pago_operadora = :pago_operadora WHERE idPagoReserva = :idPagoReserva');
        $consulta->bindParam(':idPagoReserva', $idPagoReserva);
        $consulta->bindParam(':pago_operadora', $pago_operadora);
        $consulta->execute();
        $conexion = null;
        
    }

    public function actualizarPagoidReserva($idPagoReserva, $pago_idReserva)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET pago_idReserva = :pago_idReserva WHERE idPagoReserva = :idPagoReserva');
        $consulta->bindParam(':idPagoReserva', $idPagoReserva);
        $consulta->bindParam(':pago_idReserva', $pago_idReserva);
        $consulta->execute();
        $conexion = null;
        
    }
  



    
}
