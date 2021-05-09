<?php
require_once 'dashboard/class/Agencia.php';

    $idAgencia = (isset($_REQUEST['idAgencia'])) ? $_REQUEST['idAgencia'] : null;
    
    if($idAgencia){        
        $agencia = Agencia::buscarPorId($idAgencia);        
    }else{
        $agencia = new Agencia();
    }

    //Request
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $agencia->setRazonSocial($_POST['razon_social']);
        $agencia->setNombreComercial($_POST['nombre_comercial']);
        $agencia->setRFC($_POST['rfc']);
        $agencia->setCalle($_POST['calle']);
        $agencia->setNumExterior($_POST['num_exterior']);
        $agencia->setNumInterior($_POST['num_interior']);
        $agencia->setColonia($_POST['colonia']);
        $agencia->setMunicipio($_POST['municipio']);
        $agencia->setCiudad($_POST['ciudad']);
        $agencia->setEstado($_POST['estado']);
        $agencia->setCP($_POST['cp']);
        $agencia->setPais($_POST['pais']);
        $agencia->setMoneda($_POST['moneda']);
        $agencia->setTel1($_POST['tel1']);
        $agencia->setTel2($_POST['tel2']);
        $agencia->setTel3($_POST['tel3']);
        $agencia->setPaginaWeb($_POST['pagina_web']);
        $agencia->setActivo('Si');
        $agencia->setClaveBackOffice($_POST['clave_back_office']);
        $agencia->setHeaderFooter('Activo');
        $agencia->setMenu('Activo');
        //$agencia->setObservaciones($_POST['observaciones']);
        $agencia->setNombreContacto($_POST['nombre_contacto']);
        $agencia->setApellidoPaterno($_POST['apellido_paterno']);
        $agencia->setApellidoMaterno($_POST['apellido_materno']);
        $agencia->setCargo($_POST['cargo']);
        $agencia->setSexo($_POST['sexo']);
        $agencia->setTelDirecto($_POST['tel_directo']);
        $agencia->setTelMovil($_POST['tel_movil']);
        $agencia->setEmailContacto($_POST['email_contacto']);
        $agencia->setEmailServidor($_POST['email_servidor']);
        $agencia->setClave($_POST['clave']);
        $agencia->setServidorSMTP($_POST['servidor_smtp']);
        $agencia->setPortSMTP($_POST['port_smtp']);
        $agencia->setFechaCreacion(date('Y-m-d'));


        $rutaServidor = 'uploads/images';

        if ($_FILES['url_img1']['name']!=null) {
    
          if (!is_dir('uploads/images')) {
            mkdir('uploads/images', 0777, true); 
          }
         
          $rutaTemporal1 = $_FILES['url_img1']['tmp_name'];
          $extension = pathinfo($_FILES['url_img1']['name'], PATHINFO_EXTENSION);
          $nombreImagen1 = date('YmdHis').'_logo.'.$extension;
          $rutaDestino1 = $rutaServidor.'/'.$nombreImagen1;
          unlink($_POST['logo']);
          move_uploaded_file($rutaTemporal1, 'dashboard/modules/travel_agencies/'.$rutaDestino1); 
          $agencia->setLogo($rutaDestino1); 
        
         } else{
          $agencia->setLogo($_POST['logo']);    
            } 


         if ($agencia->guardar()) {

            
            define("DEMO", false); 
        
        
            $template_file = "template/email_template/template_solicitud.php";
        
            $email= 'agencias@holidaytravel.com.mx, direcciongeneral@holidaytravel.com.mx, '.$_POST['email_contacto'];

            $email_from = "Solicitud de registro <soporte@htop.com.mx>";
        
        
            $swap_var = array(
                "{SITE_ADDR}" => "https://www.htop.com.mx",
                "{EMAIL_TITLE}" => "Ha recibido una solicitud de ".$_POST['nombre_comercial'],
                "{NOMBRE_COMERCIAL}" => $_POST['nombre_comercial'],
            );
        
        
            $email_headers = "From: ".$email_from."\r\nReply-To: ".$email_from."\r\n";
            $email_headers .= "MIME-Version: 1.0\r\n";
            $email_headers .= "Content-Type: text/html; charset=UTF-8 \r\n";
        
        
            $email_to = $email;
            $email_subject = $swap_var['{EMAIL_TITLE}']; 
        
        
            if (file_exists($template_file)){
                $email_message = file_get_contents($template_file);
            }else{
                die ("Error al cargar el template");
            }
            
            foreach (array_keys($swap_var) as $key){
                if (strlen($key) > 2 && trim($swap_var[$key]) != '')
                    $email_message = str_replace($key, $swap_var[$key], $email_message);
            }
        
            if (DEMO){
                die("<hr /><center>Esto solo es una prueba </center>");
        
            }
            if (mail($email_to, $email_subject, $email_message, $email_headers) ){ 
              ?>

            <script>

     $(document).ready(function()
      {
        $('#successModal').modal({backdrop: 'static', keyboard: false}); 
         $("#successModal").modal("show");
        
      }); 

</script>
        
        <?php
          
          }else{
          

            //Mensaje si ocurrio un error al enviar mensaje
          }
          
        }
    }
           
        
        

?>