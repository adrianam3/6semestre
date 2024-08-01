<?php
 /*
 TAREAS: 
 */

 // a. Declaración de Variables:
 echo "<strong>"."a. Declaración de Variables:"."</strong>". "<br>". "<br>";

 echo "Tipo de dato String: variable: nombre = ";
 $nombre = "Martin"; // Tipo de dato String
 echo  $nombre."<br>". "<br>";

 echo "Tipo de dato String: variable: apellido = ";
 $apellido = "Velasco"; // Tipo dedato String
echo  $apellido."<br>". "<br>";

echo "Tipo de dato Integer: variable: edad = ";
 $edad = 25; // Tipo de dato Integer
echo  $edad."<br>". "<br>";


 $altura = 1.75; // Tipo de dato Float
echo "Tipo de dato Float: variable: altura = " . $altura . "<br>". "<br>";

 $casado = false; // Tipo de dato Boolean
echo "Tipo de dato Boolean: variable: casado = ".$casado . "<br>". "<br>";

 $array = array(1, 2, 3); // Tipo de dato Array
 echo "Tipo de dato Array: variable: array = (1, 2, 3)". "<br>". "<br>";
 
 $persona = new Persona(); // tipo de dato Objeto
 echo "Tipo de dato Objeto: variable: persona ". "<br>". "<br>";
 
 $precioArroz = 2.5;
 echo "Tipo de dato Float: variable: precioArroz = " . $precioArroz . "<br>". "<br>";
 
 $cantidadArroz = 3;
 echo "Tipo de dato Integer: variable: cantidadArroz = " . $cantidadArroz . "<br>". "<br>";

 "<br>". "<br>";

 // b. Operadores Aritméticos:
 echo "<strong>"."b. Operadores Aritméticos:"."</strong>". "<br>". "<br>";

 $suma = $edad + 10;
 echo "La suma de la edad mas 10 años es: $suma". "<br>". "<br>";

 $valorCompra = $precioArroz * $cantidadArroz;
 echo "El valor de la compra de arroz es: $valorCompra". "<br>". "<br>";

// c. . Manipulación de Cadenas:

echo "<strong>"."c. Manipulación de Cadenas:"."</strong>"."<br>". "<br>";

$nombreCompleto = "El nombre completo es: ". $nombre . " " . $apellido . ".";

echo $nombreCompleto. "<br>". "<br>";

$tamanioCadena = strlen($nombreCompleto);
echo "La longitud de la cadena es: $tamanioCadena". "<br>". "<br>";

// d. Uso de Condicionales:

echo "<strong>"."d. Uso de Condicionales:"."</strong>". "<br>". "<br>";

if ($casado) {
    echo "Es casado". "<br>". "<br>";
} else {
    echo "No es casado". "<br>". "<br>";
}

if ($edad >= 18) {
    echo "Es mayor de edad". "<br>". "<br>";
} else {
    echo "No es mayor de edad". "<br>". "<br>";
}

//  e. Creación de un Array:
echo "<strong>"."e. Creación de un Array:"."</strong>"."<br>". "<br>";


$animalesMascotas = array("Perro", "Gato", "Pájaro", "Conejo", "Tortuga");

echo  "<strong>"."<em>"."- Muestra un elemento específico del arreglo utilizando su índice:". "</strong>"."</em>". "<br>". "<br>";

echo "El 4 animal del array es " . $animalesMascotas[3]. "<br>". "<br>";

echo  "<strong>"."<em>"."- Mostrar todos los elementos del  arreglo con al menos cinco elementos.". "</strong>"."</em>". "<br>". "<br>";


$tamanioArray = count($animalesMascotas);
for ($i=0; $i < $tamanioArray ; $i++) { 
    echo $animalesMascotas[$i] . " ";
}

foreach ($animalesMascotas as $animal) {
    echo $animal . " ";
}

"<br>". "<br>";

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