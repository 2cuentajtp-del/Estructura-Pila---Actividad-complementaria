package com.torrez.ed;

import org.springframework.web.bind.annotation.*;

import java.util.EmptyStackException;
import java.util.Map;

@RestController
@RequestMapping("/pila")
public class PilaController {

    private final PilaString pila = new PilaString();

    @GetMapping("/tamanyo")
    public Map<String, Integer> tamanyo() {
        return Map.of("tamanyo", pila.tamanyo());
    }

    @PostMapping("/agregar")
    public Map<String, Object> agregar(@RequestBody Estudiante estudiante) {
        pila.agregar(estudiante);

        return Map.of(
                "mensaje", "Estudiante agregado correctamente",
                "estudiante", estudiante,
                "tamanyo", pila.tamanyo()
        );
    }

    @DeleteMapping("/quitar")
    public Object quitar() {
        try {
            return pila.quitar();
        } catch (EmptyStackException e) {
            return Map.of("error", "La pila está vacía");
        }
    }

    @GetMapping
    public Estudiante mostrar() {
        try {
            return pila.mostrar();
        } catch (EmptyStackException e) {
            return null;
        }
    }
}