<?php

// Interfaz para los personajes
interface Personaje {
    public function atacar();
}

// Implementación de un personaje Guerrero
class Guerrero implements Personaje {
    public function atacar() {
        return "Guerrero ataca con sus puños.";
    }
}

// Implementación de un personaje Mago
class Mago implements Personaje {
    public function atacar() {
        return "Mago ataca con magia básica.";
    }
}

// Clase decoradora abstracta
abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }

    abstract public function atacar();
}

// Decorador para añadir una espada
class EspadaDecorator extends ArmaDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " con una espada.";
    }
}

// Decorador para añadir un arco
class ArcoDecorator extends ArmaDecorator {
    public function atacar() {
        return $this->personaje->atacar() . " con un arco.";
    }
}

// Ejemplo de uso
$guerrero = new Guerrero();
$mago = new Mago();

$guerreroConEspada = new EspadaDecorator($guerrero);
$magoConArco = new ArcoDecorator($mago);

echo $guerrero->atacar() . "\n"; // Guerrero ataca con sus puños.
echo $guerreroConEspada->atacar() . "\n"; // Guerrero ataca con sus puños con una espada.
echo $mago->atacar() . "\n"; // Mago ataca con magia básica.
echo $magoConArco->atacar() . "\n"; // Mago ataca con magia básica con un arco.

?>