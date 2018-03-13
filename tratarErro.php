<?php
    error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
    $URL_ATUAL= "$_SERVER[REQUEST_URI]";

    $url = str_replace("/","",$URL_ATUAL);

    if(strpos($url, 'PulseiraSeguranca')){
  // YourDevPulseiraSegurancaindex.php
     //   $url = str_replace("YourDevPulseiraSegurancaindex.php","",$url);
      //  $url = str_replace("%20"," ",$url);
      //  header("location:.php");
    }else{
        if (strpos($url, 'locou')) {
            header("location:http://www.yourdev.com.br/clientes/locou/index.php");
        }else {
            header("location:http://www.yourdev.com.br");
        }
    }
    
    
    
  

?>