<?php
 /*
 TAREAS: 
 */

 // a. Declaración de Variables:
 $nombre = "Martin"; // Tipo de dato String
 $apellido = "Velasco"; // Tipo dedato String
 $edad = 25; // Tipo de dato Integer
 $altura = 1.75; // Tipo de dato Float
 $casado = false; // Tipo de dato Boolean
 $array = array(1, 2, 3); // Tipo de dato Array
 $persona = new Persona(); // tipo de dato Objeto
 $precioArroz = 2.5;
 $cantidadArroz = 3;

 // b. Operadores Aritméticos:

 $suma = $edad + 10;
 echo "La suma de la edad y 10 es: $suma";

 $valorCompra = $precioArroz * $cantidadArroz;
 echo "El valor de la compra es: $valorCompra";

// c. . Manipulación de Cadenas:

$nombreCompleto = "El nombre completo es: ". $nombre . " " . $apellido . ".";

echo $nombreCompleto;

$tamanioCadena = strlen($nombreCompleto);
echo "La longitud de la cadena es: $tamanioCadena";

// d. Uso de Condicionales:

if ($casado) {
    echo "Es casado";
} else {
    echo "No es casado";
}

if ($edad >= 18) {
    echo "Es mayor de edad";
} else {
    echo "No es mayor de edad";
}

//  e. Creación de un Array:
$animalesMascotas = array("Perro", "Gato", "Pájaro", "Conejo", "Tortuga");

echo "El 4 animal del array es" . $animalesMascotas[3];

$tamanioArray = count($animalesMascotas);
for ($i=0; $i < $tamanioArray ; $i++) { 
    echo $animalesMascotas[$i] . " ";
}

foreach ($animalesMascotas as $animal) {
    echo $animal . " ";
}

class  Persona {
    public $nombre;
    public $apellido;
    public $edad;
    public $peso;
    public $activo;

    public function getNombre() {
        return $this->nombre;
    }
    public function getApellido() {
        return $this->apellido;
    }
    public function getEdad() {
        return $this->edad;
    }
    public function getPeso() {
        return $this->peso;
    }
    public function getActivo() {
        return $this->activo;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function setEdad($edad) {
        $this->edad = $edad;
    }
    public function setPeso($peso) {
        $this->peso = $peso;
    }
    public function setActivo($activo) {
        $this->activo = $activo;
    }
    public function esMayorDeEdad() {
        if ($this->edad >= 18) {
            return true;
        } else {
            return false;
        }
    }
    public function esActivo() {
        if ($this->activo) {
            return true;
        } else {
            return false;
        }
    }

}