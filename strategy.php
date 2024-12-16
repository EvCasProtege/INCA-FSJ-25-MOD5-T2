<?php

// Interfaz para la estrategia de salida
interface EstrategiaSalida {
    public function mostrar($mensaje);
}

// Implementación de la estrategia para mostrar en consola
class SalidaConsola implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo "Consola: " . $mensaje . "\n";
    }
}

// Implementación de la estrategia para mostrar en formato JSON
class SalidaJSON implements EstrategiaSalida {
    public function mostrar($mensaje) {
        echo "JSON: " . json_encode(['mensaje' => $mensaje]) . "\n";
    }
}

// Implementación de la estrategia para mostrar en archivo TXT
class SalidaArchivoTXT implements EstrategiaSalida {
    public function mostrar($mensaje) {
        file_put_contents('mensaje.txt', "Archivo TXT: " . $mensaje . "\n", FILE_APPEND);
        echo "Mensaje guardado en mensaje.txt\n";
    }
}

// Contexto que utiliza la estrategia de salida
class Mensajero {
    private $estrategia;

    public function setEstrategia(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrarMensaje($mensaje) {
        $this->estrategia->mostrar($mensaje);
    }
}

$mensajero = new Mensajero();

$mensajero->setEstrategia(new SalidaConsola());
$mensajero->mostrarMensaje("Hola, mundo!");

$mensajero->setEstrategia(new SalidaJSON());
$mensajero->mostrarMensaje("Hola, mundo!");

$mensajero->setEstrategia(new SalidaArchivoTXT());
$mensajero->mostrarMensaje("Hola, mundo!");

?>