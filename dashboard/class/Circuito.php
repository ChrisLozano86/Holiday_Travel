<?php
require_once 'Conexion.php';

class Circuito {

    private $idSlider;
    private $titulo;
    private $imguno;
    private $imgdos;
    private $video;
    private $paises;
    private $ciudades;
    private $incluye;
    private $no_incluye;
    private $itinerario;
    private $tarifas;
    private $hoteles;
    private $mapa;
    private $tours;
    private $visas;
    private $url_imagen1;
    private $descripcion;
    private $fecha_publicacion;
    private $keywords;
    private $visible;
    
    
    

    const TABLA = 'circuito';
    
  
    
    public function __construct( $titulo=null, $imguno=null, $imgdos=null, $video=null, $paises=null, $ciudades=null, $incluye=null, $no_incluye=null, $itinerario=null, $tarifas=null, $hoteles=null, $mapa = null, $tours = null, $visas = null, $url_imagen1=null, $descripcion=null, $fecha_publicacion=null, $keywords=null, $visible=null, $idSlider=null) {
        $this->titulo = $titulo;
        $this->imguno = $imguno;
        $this->imgdos = $imgdos;
        $this->video = $video;
        $this->paises = $paises;
        $this->ciudades = $ciudades;
        $this->incluye = $incluye;
        $this->no_incluye = $no_incluye;
        $this->itinerario = $itinerario;
        $this->tarifas = $tarifas;
        $this->hoteles = $hoteles;
        $this->mapa = $mapa;
        $this->tours = $tours;
        $this->visas = $visas;
        $this->url_imagen1 = $url_imagen1;
        $this->descripcion = $descripcion;
        $this->fecha_publicacion = $fecha_publicacion;
        $this->keywords = $keywords;
        $this->visible = $visible;
        $this->idSlider = $idSlider;
        

    }
    
    public function getidSlider() {
        return $this->idSlider;
    }

    public function getTitulo() {
        return $this->titulo;
    }
    public function getImgUno() {
        return $this->imguno;
    }
    public function getImgDos() {
        return $this->imgdos;
    }
    public function getVideo() {
        return $this->video;
    }
    public function getPaises() {
        return $this->paises;
    }
    public function getCiudades() {
        return $this->ciudades;
    }

    public function getIncluye() {
        return $this->incluye;
    }

    public function getNoIncluye() {
        return $this->no_incluye;
    }

    public function getItinerario() {
        return $this->itinerario;
    }
    public function getTarifas() {
        return $this->tarifas;
    }
    public function getHoteles() {
        return $this->hoteles;
    }

    public function getMapa() {
        return $this->mapa;
    }
    public function getTours() {
        return $this->tours;
    }

    public function getVisas() {
        return $this->visas;
    }

    public function getUrlImagen1() {
        return $this->url_imagen1;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechaPublicacion() {
        return $this->fecha_publicacion;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function getVisible() {
        return $this->visible;
    }
    

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
    public function setImgUno($imguno) {
        $this->imguno = $imguno;
    }
    public function setImgDos($imgdos) {
        $this->imgdos = $imgdos;
    }
    public function setVideo($video) {
        $this->video = $video;
    }
    public function setPaises($paises) {
        $this->paises = $paises;
    }
    public function setCiudades($ciudades) {
        $this->ciudades = $ciudades;
    }

    public function setIncluye($incluye) {
        $this->incluye = $incluye;
    }
    public function setNoIncluye($no_incluye) {
        $this->no_incluye = $no_incluye;
    }

    public function setItinerario($itinerario) {
        $this->itinerario = $itinerario;
    }

    public function setTarifas($tarifas) {
        $this->tarifas = $tarifas;
    }

    public function setHoteles($hoteles) {
        $this->hoteles = $hoteles;
    }

    public function setMapa($mapa) {
        $this->mapa = $mapa;
    }

    public function setTours($tours) {
        $this->tours = $tours;
    }

    public function setVisas($visas) {
        $this->visas = $visas;
    }

    public function setUrlImagen1($url_imagen1) {
        $this->url_imagen1 = $url_imagen1;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFechaPublicacion($fecha_publicacion) {
        $this->fecha_publicacion = $fecha_publicacion;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }
    public function setVisible($visible) {
        $this->visible = $visible;
    }

  

    public function guardar() {
        $conexion = new Conexion();
        if($this->idSlider)/*UPDATE*/{
            $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET  titulo = :titulo, imguno = :imguno, imgdos = :imgdos, video = :video, paises = :paises, ciudades = :ciudades, incluye = :incluye, no_incluye = :no_incluye, itinerario = :itinerario, tarifas = :tarifas, hoteles = :hoteles, mapa = :mapa, tours = :tours, visas = :visas, url_imagen1 = :url_imagen1, descripcion = :descripcion, fecha_publicacion = :fecha_publicacion, keywords = :keywords, visible = :visible WHERE idSlider = :idSlider');
            $consulta->bindParam(':idSlider', $this->idSlider);         
            $consulta->bindParam(':titulo', $this->titulo);
            $consulta->bindParam(':imguno', $this->imguno);
            $consulta->bindParam(':imgdos', $this->imgdos);
            $consulta->bindParam(':video', $this->video);
            $consulta->bindParam(':paises', $this->paises);
            $consulta->bindParam(':ciudades', $this->ciudades);
            $consulta->bindParam(':incluye', $this->incluye);
            $consulta->bindParam(':no_incluye', $this->no_incluye);
            $consulta->bindParam(':itinerario', $this->itinerario);
            $consulta->bindParam(':tarifas', $this->tarifas);
            $consulta->bindParam(':hoteles', $this->hoteles);
            $consulta->bindParam(':mapa', $this->mapa);
            $consulta->bindParam(':tours', $this->tours);
            $consulta->bindParam(':visas', $this->visas);
            $consulta->bindParam(':url_imagen1', $this->url_imagen1);
            $consulta->bindParam(':descripcion', $this->descripcion); 
            $consulta->bindParam(':fecha_publicacion', $this->fecha_publicacion); 
            $consulta->bindParam(':keywords', $this->keywords);            
            $consulta->bindParam(':visible', $this->visible);   
            $consulta->execute();
        }else /*Insert*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (titulo, imguno, imgdos, video, paises, ciudades, incluye, no_incluye, itinerario, tarifas, hoteles, mapa, tours, visas, url_imagen1, descripcion, fecha_publicacion, keywords, visible) VALUES (:titulo, :imguno, :imgdos, :video, :paises, :ciudades, :incluye, :no_incluye, :itinerario, :tarifas, :hoteles, :mapa, :tours, :visas, :url_imagen1,  :descripcion, :fecha_publicacion, :keywords, :visible)');
            $consulta->bindParam(':titulo', $this->titulo);
            $consulta->bindParam(':imguno', $this->imguno);
            $consulta->bindParam(':imgdos', $this->imgdos);
            $consulta->bindParam(':video', $this->video);
            $consulta->bindParam(':paises', $this->paises);
            $consulta->bindParam(':ciudades', $this->ciudades);
            $consulta->bindParam(':incluye', $this->incluye);
            $consulta->bindParam(':no_incluye', $this->no_incluye);
            $consulta->bindParam(':itinerario', $this->itinerario);
            $consulta->bindParam(':tarifas', $this->tarifas);
            $consulta->bindParam(':hoteles', $this->hoteles);
            $consulta->bindParam(':mapa', $this->mapa);
            $consulta->bindParam(':tours', $this->tours);
            $consulta->bindParam(':visas', $this->visas);
            $consulta->bindParam(':url_imagen1', $this->url_imagen1);
            $consulta->bindParam(':descripcion', $this->descripcion); 
            $consulta->bindParam(':fecha_publicacion', $this->fecha_publicacion);
            $consulta->bindParam(':keywords', $this->keywords);              
            $consulta->bindParam(':visible', $this->visible);   
            //var_dump($consulta);
            if($consulta->execute()){
                $this->id = $conexion->lastInsertId();
                
                return true;
            }else{       
                return false;
                
            }
        }
           
            $conexion = null;
    }


    
    public function eliminar(){
        
        $conexion = new Conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE idSlider = :idSlider');
        $consulta->bindParam(':idSlider', $this->idSlider);
        $consulta->execute();
        $conexion = null;
    }

    public static function buscarPorId($idSlider) {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE idSlider = :idSlider');
        $consulta->bindParam(':idSlider', $idSlider);
        $consulta->execute();
        $registro = $consulta->fetch();
        //print_r($registro);
        $conexion = null;
        if ($registro) {
           
            return new self($registro['titulo'], $registro['imguno'], $registro['imgdos'], $registro['video'], $registro['paises'], $registro['ciudades'], $registro['incluye'], $registro['no_incluye'], $registro['itinerario'],$registro['tarifas'], $registro['hoteles'], $registro['mapa'], $registro['tours'], $registro['visas'], $registro['url_imagen1'], $registro['descripcion'],  $registro['fecha_publicacion'], $registro['keywords'], $registro['visible'], $registro['idSlider']);
            
        } else {
            return false;
            
        }
    }

    public static function recuperarTodos() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA. '  ORDER BY idSlider DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
    }

    public static function recuperarPublicados() {
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM circuito WHERE visible = 1 ORDER BY idSlider DESC');
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
    }

    public static function busqueda($search) {
        $conexion = new Conexion();
        //$consulta = $conexion->prepare("SELECT *,DATE_FORMAT(fecha_publicacion, '%d-%m-%Y') FROM anuncios INNER JOIN categorias ON categorias.idCategoria = anuncios.idCategoria WHERE ( keywords LIKE '%$search%') AND estatus_anuncio='Publicado'");
        $consulta = $conexion->prepare("SELECT * from circuito WHERE (keywords LIKE '%$search%') AND visible = 1");
        $consulta->execute();
        $registros = $consulta->fetchAll();
  
        $conexion = null;
        return $registros;
    }


}
