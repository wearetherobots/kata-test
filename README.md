## We Are The Robots - Kata Test

Pequeños desafios de programación, recuerda muchos de estos desafios se pueden resolver con simples funciones existentes, la idea es **NO USARLOS** para
poder evaluar el ingenio además se evalua la calidad del código así como la velocidad de ejecución.

Cada test tiene las pruebas unitarios necesarias, para ejecutarlas con solo hacer lo siguiente:

```
composer test
```

**UniqueArray** - Sin utilizar ninguna función ya existente de php, desarollar el método ```__invoke``` para obtener los valores únicos del arreglo.

**CategoryTree** - dado un arreglo con categorias ```[id, parent(id), name]``` desarrollar el método build de la clase ```Printer``` el cual
debe regresar un string que represente al árbol de categorias ordenados tanto padres e hijos de forma alfabética. Se deberá usar forzosamente
las funciones ```usort``` y ```str_repeat```, además usar forzosamente para el ```usort``` un ```arrow function``` y ```spaceship operator```.

ejemplo de árbol de salida:

```
root
  electrónicos
    computadoras
      apple
      lenovo
    televisiones
  libros
    clásicos
    fantasía
    poesía
```
Para más detalle de como es la salida las pruebas unitarias tienen un ejemplo más extenso.
