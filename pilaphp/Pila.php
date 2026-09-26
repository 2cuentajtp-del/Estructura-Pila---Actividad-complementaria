<?php

class Pila
{
    /** @var array Arreglo que representa la pila (índice 0 = base) */
    private array $elementos = [];


    public function agregar(Estudiante $estudiante): void
    {
        // array_push agrega al final del arreglo (= cima)
        $this->elementos[] = $estudiante->toArray();
    }


    public function quitar(): ?Estudiante
    {
        if ($this->estaVacia()) {
            return null;
        }
        // array_pop quita el último elemento (= cima)
        $datos = array_pop($this->elementos);
        return Estudiante::fromArray($datos);
    }

  
    public function mostrar(): array
    {
        // Invertimos una copia para mostrar cima → base
        $copia = array_reverse($this->elementos);
        $resultado = [];
        foreach ($copia as $datos) {
            $resultado[] = Estudiante::fromArray($datos);
        }
        return $resultado;
    }

  
    public function tamanyo(): int
    {
        return count($this->elementos);
    }

  
    public function estaVacia(): bool
    {
        return count($this->elementos) === 0;
    }

    
    public function toArray(): array
    {
        return $this->elementos;
    }

    public function fromArray(array $datos): void
    {
        $this->elementos = $datos;
    }
}
