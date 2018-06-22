<?php

require_once "models/clients.php";

$clients =new ClientsModel();
$ClientsListView= $clients->getAll();

require_once "views/clients.php";

 ?>
