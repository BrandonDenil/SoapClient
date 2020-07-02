<?php
class Client{
    public function __construct()
    {
            $params = array("location"=>"http://localhost/www/soapServer/server.php",
            'uri'=> "urn://www/soap/server.php",
            'trace'=>1);
        $this->instance=new SoapClient(NUll,$params);

        //header
        $auth_params= new stdClass(); //instancia un objeto generico para autenticación
        $auth_params->username="Denilson"; // usuario
        $auth_params->password="Denilson"; // contraseña
        $header_params= new SoapVar($auth_params,SOAP_ENC_OBJECT); //adjuntamos los credenciales
        $header= new SoapHeader('soap','authenticate',$header_params,false); //creamos el header
        $this->instance->__setSoapHeaders(array($header));//y agregamos el header a la instancia cliente
    }

    public function verBoleta($dpi){
        return $this->instance->__soapCall('verificarBoleto',$dpi);
    }

    public function verPartida($arreglo){
        return $this->instance->__soapCall('verificarPartida',$arreglo);
    }

    public function pago($arreglo){
        return $this->instance->__soapCall('realizarPago',$arreglo);
    }

}

$client=new Client;
?>