<?php 

class DavidUtil{ 

  // // singleton instance 
 

 
   public function __construct() { } 

  // // getInstance method 
  public static function getInstance() { 



    // if(!self::$instance) {  
    //   self::$instance = new self(); 
    // } 

    return new self(); 

  } 

  public static function buscar($array,$columna,$clave)
  {
    $sw= false;
    $objeto =null;

    for($i=0;$i<count($array);$i++)
    {
        if($array[$i]["".$columna.""]==$clave)
        {
          $objeto = $array[$i];
          $i=count($array);
        }
    }  
    return $objeto;
  }

} 
