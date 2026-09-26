package com.torrez.ed;

import java.util.EmptyStackException;

public class PilaString {

    private Estudiante[] elementos;
    private int tope;

    public PilaString() {
        elementos = new Estudiante[100];
        tope = -1;
    }

    public int tamanyo() {
        return tope + 1;
    }

    public void agregar(Estudiante estudiante) {
        if (tope == elementos.length - 1) {
            throw new IllegalStateException("La pila está llena");
        }

        tope++;
        elementos[tope] = estudiante;
    }

    public Estudiante quitar() {
        if (tope == -1) {
            throw new EmptyStackException();
        }

        Estudiante estudiante = elementos[tope];
        elementos[tope] = null;
        tope--;

        return estudiante;
    }

    public Estudiante mostrar() {
        if (tope == -1) {
            throw new EmptyStackException();
        }

        return elementos[tope];
    }

    public boolean isEmpty() {
        return tope == -1;
    }
}