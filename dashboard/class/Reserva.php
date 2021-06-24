<?php

require_once 'Conexion.php';

class Reserva
{

    private $idReserva;
    private $idAgencia;
    private $markup_operadora;
    private $comision_agencia;
    private $precio_neto;
    private $titular;
    private $fecha_reservacion;
    private $broker;
    private $clave;
    private $descripcion;
    private $destino;
    private $fecha_inicio;
    private $precio;
    private $moneda;
    private $estatus_servicio;
    private $pago_operadora;
    private $pago_agencia;
    private $fecha_limite;
    private $fecha_notificacion;
    private $estatus_notificacion;
    private $estatus_reserva;
    private $saldo_restante;
    private $saldo_restanteO;


    const TABLA = 'reservaciones';

    public function __construct($idAgencia = null, $markup_operadora=null,  $comision_agencia = null, $precio_neto = null, $titular = null, $fecha_reservacion = null, $broker = null,
     $clave = null, $descripcion = null, $destino=null, $fecha_inicio = null, $precio = null, $moneda = null, $estatus_servicio = null,
     $pago_operadora = null, $pago_agencia = null, $fecha_limite = null, $fecha_notificacion = null, $estatus_notificacion = null, $estatus_reserva=null, $saldo_restante=null, $saldo_restanteO=null, $idReserva = null)
    {
        
        $this->idAgencia = $idAgencia;
        $this->markup_operadora = $markup_operadora;
        $this->comision_agencia = $comision_agencia;
        $this->precio_neto = $precio_neto;
        $this->fecha_reservacion = $fecha_reservacion;
        $this->titular = $titular;
        $this->broker = $broker;
        $this->clave = $clave;
        $this->descripcion = $descripcion;
        $this->destino = $destino;
        $this->fecha_inicio = $fecha_inicio;
        $this->precio = $precio;
        $this->moneda = $moneda;
        $this->estatus_servicio = $estatus_servicio;
        $this->pago_operadora = $pago_operadora;
        $this->pago_agencia = $pago_agencia;
        $this->fecha_limite = $fecha_limite;
        $this->fecha_notificacion = $fecha_notificacion;
        $this->estatus_notificacion = $estatus_notificacion;
        $this->estatus_reserva = $estatus_reserva;
        $this->saldo_restante = $saldo_restante;
        $this->saldo_restanteO = $saldo_restanteO;
        $this->idReserva = $idReserva;
    }

    //Getters

    public function getIdReserva()
    {
        return $this->idReserva;
    }

    public function getIdAgencia()
    {
        return $this->idAgencia;
    }

    public function getMarkupOperadora()
    {
        return $this->markup_operadora;
    }

    public function getComisionAgencia()
    {
        return $this->comision_agencia;
    }

    public function getPrecioNeto()
    {
        return $this->precio_neto;
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

    public function getMoneda()
    {
        return $this->moneda;
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
    public function getEstatusReserva()
    {
        return $this->estatus_reserva;
    }

    public function getSaldoRestante()
    {
        return $this->saldo_restante;
    }
    public function getSaldoRestanteOperadora()
    {
        return $this->saldo_restanteO;
    }


    //Setters

    public function setIdAgencia($idAgencia)
    {
        $this->idAgencia = $idAgencia;
    }

    public function setMarkupOperadora($markup_operadora)
    {
        $this->markup_operadora = $markup_operadora;
    }


    public function setComisionAgencia($comision_agencia)
    {
        $this->comision_agencia = $comision_agencia;
    }

    public function setPrecioNeto($precio_neto)
    {
        $this->precio_neto = $precio_neto;
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

    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;
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
    public function setEstatusReserva($estatus_reserva)
    {
        $this->estatus_reserva = $estatus_reserva;
    }

    public function setSaldoRestante($saldo_restante)
    {
        $this->saldo_restante = $saldo_restante;
    }

    public function setSaldoRestanteOperadora($saldo_restanteO)
    {
        $this->saldo_restanteO = $saldo_restanteO;
    }





    public function guardar()
    {
        $conexion = new Conexion();
        if ($this->idReserva) /* Modifica */ {
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET idAgencia = :idAgencia, markup_operadora = :markup_operadora, comision_agencia = :comision_agencia, precio_neto = :precio_neto, titular = :titular, fecha_reservacion = :fecha_reservacion,
             broker=:broker, clave = :clave, descripcion = :descripcion, destino=:destino, fecha_inicio = :fecha_inicio, precio = :precio, moneda = :moneda, estatus_servicio = :estatus_servicio, pago_operadora = :pago_operadora, 
             pago_agencia = :pago_agencia, fecha_limite = :fecha_limite, fecha_notificacion = :fecha_notificacion, estatus_notificacion = :estatus_notificacion, estatus_reserva = :estatus_reserva, saldo_restante = :saldo_restante, saldo_restanteO = :saldo_restanteO WHERE idReserva = :idReserva');
            $consulta->bindParam(':idReserva', $this->idReserva);
            $consulta->bindParam(':idAgencia', $this->idAgencia);
            $consulta->bindParam(':markup_operadora', $this->markup_operadora);
            $consulta->bindParam(':comision_agencia', $this->comision_agencia);
            $consulta->bindParam(':precio_neto', $this->precio_neto);
            $consulta->bindParam(':titular', $this->titular);
            $consulta->bindParam(':fecha_reservacion', $this->fecha_reservacion);
            $consulta->bindParam(':broker', $this->broker);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':destino', $this->destino);
            $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':moneda', $this->moneda);
            $consulta->bindParam(':estatus_servicio', $this->estatus_servicio);
            $consulta->bindParam(':pago_operadora', $this->pago_operadora);
            $consulta->bindParam(':pago_agencia', $this->pago_agencia);
            $consulta->bindParam(':fecha_limite', $this->fecha_limite);
            $consulta->bindParam(':fecha_notificacion', $this->fecha_notificacion);
            $consulta->bindParam(':estatus_notificacion', $this->estatus_notificacion);
            $consulta->bindParam(':estatus_reserva', $this->estatus_reserva);
            $consulta->bindParam(':saldo_restante', $this->saldo_restante);
            $consulta->bindParam(':saldo_restanteO', $this->saldo_restanteO);

            $consulta->execute();
        } else /* Inserta */ {
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (idAgencia, markup_operadora, comision_agencia, precio_neto, titular, fecha_reservacion, broker, clave, descripcion, destino, fecha_inicio, precio, moneda, estatus_servicio, pago_operadora, pago_agencia, fecha_limite, fecha_notificacion, estatus_notificacion, estatus_reserva, saldo_restante, saldo_restanteO)
             VALUES (:idAgencia,  :markup_operadora, :comision_agencia, :precio_neto, :titular, :fecha_reservacion, :broker, :clave, :descripcion, :destino, :fecha_inicio, :precio, :moneda, :estatus_servicio, :pago_operadora, :pago_agencia, :fecha_limite, :fecha_notificacion, :estatus_notificacion, :estatus_reserva, :saldo_restante, :saldo_restanteO)');
            $consulta->bindParam(':idAgencia', $this->idAgencia);
            $consulta->bindParam(':markup_operadora', $this->markup_operadora);
            $consulta->bindParam(':comision_agencia', $this->comision_agencia);
            $consulta->bindParam(':precio_neto', $this->precio_neto);
            $consulta->bindParam(':titular', $this->titular);
            $consulta->bindParam(':fecha_reservacion', $this->fecha_reservacion);
            $consulta->bindParam(':broker', $this->broker);
            $consulta->bindParam(':clave', $this->clave);
            $consulta->bindParam(':descripcion', $this->descripcion);
            $consulta->bindParam(':destino', $this->destino);
            $consulta->bindParam(':fecha_inicio', $this->fecha_inicio);
            $consulta->bindParam(':precio', $this->precio);
            $consulta->bindParam(':moneda', $this->moneda);
            $consulta->bindParam(':estatus_servicio', $this->estatus_servicio);
            $consulta->bindParam(':pago_operadora', $this->pago_operadora);
            $consulta->bindParam(':pago_agencia', $this->pago_agencia);
            $consulta->bindParam(':fecha_limite', $this->fecha_limite);
            $consulta->bindParam(':fecha_notificacion', $this->fecha_notificacion);
            $consulta->bindParam(':estatus_notificacion', $this->estatus_notificacion);
            $consulta->bindParam(':estatus_reserva', $this->estatus_reserva);
            $consulta->bindParam(':saldo_restante', $this->saldo_restante);
            $consulta->bindParam(':saldo_restanteO', $this->saldo_restanteO);
            
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
            return new self($registro['idAgencia'], $registro['markup_operadora'], $registro['comision_agencia'], $registro['precio_neto'], $registro['titular'], $registro['fecha_reservacion'], $registro['broker'], $registro['clave'], $registro['descripcion'], $registro['destino'], $registro['fecha_inicio'], $registro['precio'], $registro['moneda'], $registro['estatus_servicio'], $registro['pago_operadora'], $registro['pago_agencia'], $registro['fecha_limite'], $registro['fecha_notificacion'], $registro['estatus_notificacion'], $registro['estatus_reserva'], $registro['saldo_restante'], $registro['saldo_restanteO'], $idReserva);
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
        $consulta = $conexion->prepare('SELECT * FROM reservaciones WHERE NOW() > fecha_notificacion AND (pago_operadora = "No Pagado" OR pago_agencia = "No Pagado") AND estatus_reserva = "Activa" ORDER BY idReserva ASC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }

    public static function enviarNotificaciones()
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM reservaciones WHERE NOW() > fecha_notificacion AND (pago_operadora = "No Pagado" OR pago_agencia = "No Pagado") AND estatus_reserva = "Activa" AND estatus_notificacion = 0 ORDER BY idReserva DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        $conexion = null;
        return $registros;
    }


    public function actualizarEstatusNotificacion($idReserva, $estatus_notificacion)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus_notificacion = :estatus_notificacion WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':estatus_notificacion', $estatus_notificacion);
        $consulta->execute();
        $conexion = null;
        
    }

    public function actualizarEstatusReserva($idReserva, $estatus_reserva)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET estatus_reserva = :estatus_reserva WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':estatus_reserva', $estatus_reserva);
        $consulta->execute();
        $conexion = null;
        
    }

    public function actualizarPagoOperadora($idReserva, $pago_operadora)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET pago_operadora = :pago_operadora WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':pago_operadora', $pago_operadora);
        $consulta->execute();
        $conexion = null;
        
    }

    public function actualizarPagoAgencia($idReserva, $pago_agencia)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET pago_agencia = :pago_agencia WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':pago_agencia', $pago_agencia);
        $consulta->execute();
        $conexion = null;
        
    }


    public function actualizarSaldoRestante($idReserva, $saldo_restante)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET saldo_restante = :saldo_restante WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':saldo_restante', $saldo_restante);
        $consulta->execute();
        $conexion = null;
        
    }

    

    public function actualizarSaldoRestanteOperadora($idReserva, $saldo_restanteO)
    {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET saldo_restanteO = :saldo_restanteO WHERE idReserva = :idReserva');
        $consulta->bindParam(':idReserva', $idReserva);
        $consulta->bindParam(':saldo_restanteO', $saldo_restanteO);
        $consulta->execute();
        $conexion = null;
        
    }
  



    
}
