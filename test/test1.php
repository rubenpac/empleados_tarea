<?php

//variables
$apellidos = "PACHAS";
$nombres = "RUBEN";

//Constantes
define("DNI","73208847");

/* echo $apellidos . " " .$nombres . " " . DNI; */

//Arreglo (1) - UNI-DIMENSIONAL
$amigos = array("Karina", "Melisa","Vania","Maria","Estefani");
$paises = ["Peru","Argentina","Brasil","Venesuela",];

//Funcion imprime: tipo, longitud, dato (DEBUG)
/* var_dump($amigos); */

/* foreach($paises as $paise){
  echo $paise . " ";
} */

//Arreglo (2) MULTI-DIMENSIONAL
$softwares = [
  ["Eset","Avast","Windows","Avaira","Karpersky"],
  ["Warzone","CALL OF DUTY","FreeFire","MarioBross","Pepsiman"],
  ["VSCode","NetBeans","AndroidStudio","PSeint"]
];

/* 
echo $softwares[0][3] . "<br>"; 
echo $softwares[2][0] . "<br>";
echo $softwares[2][2] . "<br>";  
echo $softwares[1][0] . "<br>"; 
*/

/* foreach ($softwares as $lista){
  foreach($lista as $softwares){
    echo $softwares . "<br>";
  }
} */

//Arreglo (3) ASOCIATIVA (sin indice)
//PHP, JS (Asociativo), JAVA (Mapas), c# (listas), python (Diccionario)
$catalogo = [
  "so"          => "Windows 10",
  "antivirus"   => "Panda",
  "utilitario"  => "WinRAR",
  "Videojuego"  => "MarioBross"
];

/* echo $catalogo["antivirus"]; */

//Arreglo (4) MULTIDIMENSIONAL + ASOCIATIVO (con/sin indice)
$desarrollador = [
  "datospersonales" => [
    "apellidos" => "PACHAS",
    "nombres" => "RUBEN",
    "edad" => 20,
    
    "telefono" => ["9653869","945861274"]
  ],
  "formacion"     => [
    "inicial"     => ["Sergio Bautista"],
    "primari"     => ["Sergio Bautista"],
    "secundaria"  => ["Simon Bolivar","Augusto B. leguia"]
  ],
  "habilidades" => [
    "bd"        => ["MsQL", "MSSQL"],
    "Frameworks" => ["Laravle","CodeIgniter","Hibernite"]
  ]
];

/* echo "<pre>";
var_dump($desarrollador);
echo "<pre>"; */

echo json_encode($desarrollador);