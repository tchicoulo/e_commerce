<?php

class Route {
  private function formatUrl(){

    if (isset($_SERVER["PATH_INFO"])){
      $url = $_SERVER["PATH_INFO"];
    }
    else {
      $url="/home/";
    }

    $urlTrim= trim($url,"/");


    $urlTab=explode ("/", $url);

    return $urlTab;
  }

  // getting the controller's action
  public function getAction(){
    $controllers = $this->formatUrl();

    if(isset($controllers[2])){
        $action = $controllers[2];

        if($action){
          return $action;
        }
    }
  }

  //getting the controller's arguments
  public function getArgs(){
    $controllers = $this->formatUrl();

    $args = array();

    if(isset($controllers[3])){
      if($controllers[3]){
        array_push($args, $controllers[3]);
      }
    }

    if(isset($controllers[4])){
      if($controllers[4]){
        array_push($args, $controllers[4]);
      }
    }

    if(isset($controllers[5])){
      if($controllers[5]){
        array_push($args, $controllers[5]);
      }
    }

    return $args;
  }

  public function getController(){

  $controllers= $this->formatUrl();
  $controllerPath = "controllers/".$controllers[1].".php";

    // On teste si le fichier existe avant de l'inclure pour eviter une erreur
  if(file_exists($controllerPath)){
    require_once $controllerPath;
    return $controllers;
  }
  else{
    $content = "views/error.php";
    require_once "views/layout.php";
  }
}
}

?>
