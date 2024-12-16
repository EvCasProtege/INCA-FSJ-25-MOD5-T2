<?php

// Definimos la interfaz para los personajes
interface Personaje {
    public function atacar();
    public function velocidad();
}

// Implementamos la clase Esqueleto
class Esqueleto implements Personaje {
    public function atacar() {
        return "Esqueleto ataca con flechas.";
    }

    public function velocidad() {
        return "Esqueleto tiene velocidad media.";
    }
}

// Implementamos la clase Zombi
class Zombi implements Personaje {
    public function atacar() {
        return "Zombi ataca con mordiscos.";
    }

    public function velocidad() {
        return "Zombi tiene velocidad lenta.";
    }
}

// Creamos la Factory para los personajes
class PersonajeFactory {
    public static function crearPersonaje($nivel) {
        switch ($nivel) {
            case 'facil':
                return new Esqueleto();
            case 'dificil':
                return new Zombi();
            default:
                throw new Exception("Nivel no válido.");
        }
    }
}

function prompt($mensaje){
    echo $mensaje;
    $input = trim(fgets(STDIN));
    return $input;
}

try {
    $nivel = $this->prompt("Ingrese el nivel de dificultad (facil, dificil)");
    $personaje = PersonajeFactory::crearPersonaje($nivel);
    echo $personaje->atacar() . "\n";
    echo $personaje->velocidad() . "\n";
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
