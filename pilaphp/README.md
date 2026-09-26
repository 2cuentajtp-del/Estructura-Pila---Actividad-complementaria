# Pila de Estudiantes — PHP (sin framework)

Repositorio público de una aplicación web en **PHP puro** (sin frameworks) que gestiona estudiantes mediante una **pila (stack)** con comportamiento **LIFO** (Last In, First Out).

La pila se implementa usando **solamente arreglos de PHP** y expone los métodos:

- `agregar`
- `quitar`
- `mostrar`
- `tamanyo`

La interfaz se construye con **formularios HTML**.

---

## Herramientas necesarias

| Herramienta | Versión mínima | Notas |
|-------------|----------------|-------|
| **Git** | 2.x | Para clonar el repositorio |
| **PHP** | 8.0+ | Obligatorio (`php -v`) |
| **Servidor web local** | — | PHP built-in server, XAMPP, Laragon, WAMP o similar |

> No se necesita Composer ni ningún framework.

---

## Clonar el repositorio

```bash
git clone https://github.com/<usuario>/pila-php.git
cd pila-php
```

> Sustituye `<usuario>` por el nombre real del dueño del repositorio en GitHub.

---

## Ejecutar la aplicación

### Opción A — Servidor embebido de PHP (recomendado para pruebas)

```bash
php -S localhost:8000
```

Luego abre el navegador en:

```
http://localhost:8000
```

### Opción B — XAMPP / Laragon / WAMP

1. Copia la carpeta del proyecto dentro de `htdocs` (o la carpeta de documentos del servidor).
2. Inicia Apache.
3. Abre en el navegador: `http://localhost/pila-php`

---

## Usar la aplicación

1. Completa el formulario **Agregar estudiante** con los datos:
   - código
   - nombres
   - apellidos
   - email
   - fecha de nacimiento
   - género
2. Haz clic en **Agregar a la pila**.
3. Observa el tamaño (`tamanyo`) y la tabla (cima → base).
4. Usa el botón **Quitar (cima)** para extraer el último estudiante agregado.

La pila se mantiene entre recargas de página mediante **sesión PHP**.

---

## Estructura del código

```
pila-php/
├── README.md
├── index.php          # Interfaz web + formularios HTML + control de acciones
├── Estudiante.php     # Entidad estudiante (6 atributos)
├── Pila.php           # Lógica de la pila (solo arreglos)
└── style.css          # Estilos de la interfaz
```

### Entidad Estudiante

| Atributo          | Tipo   |
|-------------------|--------|
| codigo            | string |
| nombres           | string |
| apellidos         | string |
| email             | string |
| fechaNacimiento   | string (Y-m-d) |
| genero            | string (carácter: M, F, O) |

### Métodos de la pila

| Método     | Descripción                                      |
|------------|--------------------------------------------------|
| `agregar`  | Inserta un estudiante en la cima                 |
| `quitar`   | Elimina y retorna el estudiante de la cima       |
| `mostrar`  | Lista los estudiantes de cima a base (sin modificar) |
| `tamanyo`  | Cantidad de elementos en la pila                 |

---

## Tecnologías utilizadas

- PHP 8+
- HTML5
- CSS3
- Sesiones PHP (persistencia temporal)

---

## Licencia

Proyecto académico / educativo. Uso libre.
