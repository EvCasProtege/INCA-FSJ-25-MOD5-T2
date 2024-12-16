<?php

// Interfaz para los documentos
interface Documento {
    public function abrir();
}

class DocumentoWord implements Documento {
    public function abrir() {
        return "Abriendo documento de Word.";
    }
}

class DocumentoExcel implements Documento {
    public function abrir() {
        return "Abriendo documento de Excel.";
    }
}

class DocumentoPowerPoint implements Documento {
    public function abrir() {
        return "Abriendo documento de PowerPoint.";
    }
}

class DocumentoAntiguoAdapter implements Documento {
    private $documentoAntiguo;

    public function __construct($documentoAntiguo) {
        $this->documentoAntiguo = $documentoAntiguo;
    }

    public function abrir() {
        // logica para adaptar el documento antiguo
        return $this->documentoAntiguo->abrir() . " (convertido para Windows 10)";
    }
}

// Ejemplo de uso
$documentoWord = new DocumentoWord();
$documentoExcel = new DocumentoExcel();
$documentoPowerPoint = new DocumentoPowerPoint();

// Simulamos un documento antiguo
$documentoAntiguo = new DocumentoWord(); 
$documentoAdaptado = new DocumentoAntiguoAdapter($documentoAntiguo);

echo $documentoWord->abrir() . "\n";
echo $documentoExcel->abrir() . "\n";
echo $documentoPowerPoint->abrir() . "\n";
echo $documentoAdaptado->abrir() . "\n";

?>