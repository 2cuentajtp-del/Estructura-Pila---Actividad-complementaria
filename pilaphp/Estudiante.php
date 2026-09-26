<?php
/**
 * Entidad Estudiante
 * Atributos: codigo, nombres, apellidos, email, fechaNacimiento, genero
 */
class Estudiante
{
    private string $codigo;
    private string $nombres;
    private string $apellidos;
    private string $email;
    private string $fechaNacimiento; // formato Y-m-d
    private string $genero;          // un caracter (M, F, etc.)

    public function __construct(
        string $codigo,
        string $nombres,
        string $apellidos,
        string $email,
        string $fechaNacimiento,
        string $genero
    ) {
        $this->codigo = $codigo;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->genero = $genero;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getNombres(): string
    {
        return $this->nombres;
    }

    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFechaNacimiento(): string
    {
        return $this->fechaNacimiento;
    }

    public function getGenero(): string
    {
        return $this->genero;
    }

   
    public function toArray(): array
    {
        return [
            'codigo'          => $this->codigo,
            'nombres'         => $this->nombres,
            'apellidos'       => $this->apellidos,
            'email'           => $this->email,
            'fechaNacimiento' => $this->fechaNacimiento,
            'genero'          => $this->genero,
        ];
    }

   
    public static function fromArray(array $datos): Estudiante
    {
        return new Estudiante(
            $datos['codigo'] ?? '',
            $datos['nombres'] ?? '',
            $datos['apellidos'] ?? '',
            $datos['email'] ?? '',
            $datos['fechaNacimiento'] ?? '',
            $datos['genero'] ?? ''
        );
    }
}
