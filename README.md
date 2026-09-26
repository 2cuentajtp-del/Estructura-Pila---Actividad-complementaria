# Pila — API REST de una pila de Strings

Repositorio público de una API REST en **Spring Boot** que implementa una **pila (stack)** de cadenas de texto siguiendo el principio **LIFO** (Last In, First Out).

---

## Herramientas necesarias

| Herramienta | Versión mínima | Notas |
|-------------|----------------|-------|
| **Git** | 2.x | Para clonar el repositorio |
| **Java JDK** | 24 | Obligatorio (`java -version`) |
| **Maven** | 3.8+ | Opcional: el proyecto incluye el wrapper `mvnw` |

> Si usas el wrapper (`./mvnw`), no es necesario tener Maven instalado globalmente.

---

## Clonar el repositorio

```bash
git clone https://github.com/2cuentajtp-del/pila.git
cd pila/ed-pila/ed
```

---

## Compilar el proyecto

```bash
./mvnw clean package
```

o con Maven instalado:

```bash
mvn clean package
```

Esto genera el JAR en:

```
target/ed-0.0.1-SNAPSHOT.jar
```

---

## Ejecutar la aplicación

```bash
./mvnw spring-boot:run
```

o con el JAR:

```bash
java -jar target/ed-0.0.1-SNAPSHOT.jar
```

La API queda disponible en: **http://localhost:8080**

---

## Usar la API

| Método   | Endpoint            | Descripción                              | Parámetros          |
|----------|---------------------|------------------------------------------|---------------------|
| `GET`    | `/pila`             | Lista los elementos (cima → base)        | —                   |
| `GET`    | `/pila/size`        | Devuelve el tamaño actual de la pila     | —                   |
| `POST`   | `/pila/agregar`     | Agrega un elemento a la cima             | `valor` (query)     |
| `DELETE` | `/pila/quitar`      | Quita y devuelve el elemento de la cima  | —                   |

### Ejemplos con curl

```bash
# Agregar elementos
curl -X POST "http://localhost:8080/pila/agregar?valor=Hola"
curl -X POST "http://localhost:8080/pila/agregar?valor=Mundo"

# Consultar tamaño
curl http://localhost:8080/pila/size

# Mostrar la pila
curl http://localhost:8080/pila

# Quitar el último elemento
curl -X DELETE http://localhost:8080/pila/quitar
```

---

## Ejecutar las pruebas

```bash
./mvnw test
```

---

## Estructura del código

```
ed/
├── pom.xml
├── src/main/java/com/torrez/ed/
│   ├── EdApplication.java
│   ├── PilaString.java
│   └── PilaController.java
└── src/test/java/com/torrez/ed/
    └── PilaStringTests.java
```

---

## Tecnologías utilizadas

- Spring Boot 4.1.1
- Spring Web MVC
- Java 24
- JUnit 5
- Maven

---

## Licencia

Proyecto académico / educativo. Uso libre.
