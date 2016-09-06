<?php 

class DavidHelper { 

  // // singleton instance 
 

 
   public function __construct() { } 

  // // getInstance method 
  public static function getInstance() { 



    // if(!self::$instance) {  
    //   self::$instance = new self(); 
    // } 

    return new self(); 

  } 

  public function NavLink($route, $text)
  {
    if( Request::path() == $route ) {
        $active = 'class = "active"';
    }
      else {
        $active = '';
    }
    return '<li '.$active.' ><a href ="'.url($route).'"  >'.ucwords($text).'</a></li>';
    // return "<a href = '{{url($route)}}' $active> {{$text}}</a>";
      
  }

  public function NavLink2($route, $text,$titulo)
  {
    if( Request::path() == $route ) {
        $active = 'class = "active"';
    }
      else {
        $active = '';
    }
    return '<li '.$active.' ><a href ="'.url($route).'"  >'.ucwords($titulo).'</a></li>';
    // return "<a href = '{{url($route)}}' $active> {{$text}}</a>";
      
  }
  public function Link($route, $text)
  {
    if( Request::path() == $route ) {
        $active = "class = 'active'";
    }
      else {
        $active = '';
    }
    return 'HOla';
    return '<li '.$active.' ><a href ="'.url($route).'"  >'.ucwords($text).'</a></li>';
    // return "<a href = '{{url($route)}}' $active> {{$text}}</a>";
      
  }

} 