package com.torrez.ed;

import org.junit.jupiter.api.Test;

import java.time.LocalDate;
import java.util.EmptyStackException;

import static org.junit.jupiter.api.Assertions.*;

class PilaStringTests {

    private Estudiante crearEstudiante(String codigo, String nombres) {
        return new Estudiante(
                codigo,
                nombres,
                "Apellido",
                nombres.toLowerCase() + "@correo.com",
                LocalDate.of(2000, 1, 1),
                'M'
        );
    }

    @Test
    void pilaVaciaAlInicio() {
        PilaString pila = new PilaString();

        assertEquals(0, pila.tamanyo());
        assertTrue(pila.isEmpty());
    }

    @Test
    void agregarAumentaTamanyo() {
        PilaString pila = new PilaString();

        pila.agregar(crearEstudiante("001", "Juan"));
        pila.agregar(crearEstudiante("002", "Pedro"));

        assertEquals(2, pila.tamanyo());
    }

    @Test
    void quitarDevuelveElUltimoAgregado() {
        PilaString pila = new PilaString();

        Estudiante juan = crearEstudiante("001", "Juan");
        Estudiante pedro = crearEstudiante("002", "Pedro");
        Estudiante carlos = crearEstudiante("003", "Carlos");

        pila.agregar(juan);
        pila.agregar(pedro);
        pila.agregar(carlos);

        assertEquals(carlos, pila.quitar());
        assertEquals(2, pila.tamanyo());
    }

    @Test
    void quitarEnPilaVaciaLanzaExcepcion() {
        PilaString pila = new PilaString();

        assertThrows(EmptyStackException.class, pila::quitar);
    }

    @Test
    void mostrarDevuelveElElementoDeLaCima() {
        PilaString pila = new PilaString();

        Estudiante juan = crearEstudiante("001", "Juan");
        Estudiante pedro = crearEstudiante("002", "Pedro");
        Estudiante carlos = crearEstudiante("003", "Carlos");

        pila.agregar(juan);
        pila.agregar(pedro);
        pila.agregar(carlos);

        assertEquals(carlos, pila.mostrar());
    }
}