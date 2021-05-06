<?php

use Kata\CategoryTree\Category;
use Kata\CategoryTree\Printer;
use PHPUnit\Framework\TestCase;

class PrinterTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_return_built_string_tree()
    {
        /**
         *  Ejemplo para crear un árbol, damos por hecho que los datos del stack están bien.
         *  para evitar problemas de loops y démas.
         */
        $root = new Category(1, 'root');

        $stack = [
            (object) ['id' => 17, 'parent' => 6, 'name' => 'suspenso'],
            (object) ['id' => 18, 'parent' => 6, 'name' => 'románticas'],
            (object) ['id' => 19, 'parent' => 6, 'name' => 'acción'],
            (object) ['id' => 2, 'parent' => 1, 'name' => 'libros'],
            (object) ['id' => 4, 'parent' => 1, 'name' => 'ropa'],
            (object) ['id' => 7, 'parent' => 2, 'name' => 'fantasía'],
            (object) ['id' => 10, 'parent' => 3, 'name' => 'televisiones'],
            (object) ['id' => 11, 'parent' => 3, 'name' => 'computadoras'],
            (object) ['id' => 21, 'parent' => 15, 'name' => 'faldas'],
            (object) ['id' => 22, 'parent' => 15, 'name' => 'pantalones'],
            (object) ['id' => 23, 'parent' => 15, 'name' => 'blusas'],
            (object) ['id' => 24, 'parent' => 15, 'name' => 'sombreros'],
            (object) ['id' => 25, 'parent' => 15, 'name' => 'ropa interior'],
            (object) ['id' => 26, 'parent' => 25, 'name' => 'calzones'],
            (object) ['id' => 27, 'parent' => 25, 'name' => 'brasieres'],
            (object) ['id' => 28, 'parent' => 27, 'name' => 'playtex'],
            (object) ['id' => 28, 'parent' => 27, 'name' => 'curvation'],
            (object) ['id' => 28, 'parent' => 27, 'name' => 'hannes'],
            (object) ['id' => 12, 'parent' => 11, 'name' => 'apple'],
            (object) ['id' => 13, 'parent' => 11, 'name' => 'lenovo'],
            (object) ['id' => 5, 'parent' => 1, 'name' => 'musica'],
            (object) ['id' => 6, 'parent' => 1, 'name' => 'películas'],
            (object) ['id' => 14, 'parent' => 4, 'name' => 'hombre'],
            (object) ['id' => 15, 'parent' => 4, 'name' => 'mujer'],
            (object) ['id' => 16, 'parent' => 6, 'name' => 'comedia'],
            (object) ['id' => 8, 'parent' => 2, 'name' => 'clásicos'],
            (object) ['id' => 9, 'parent' => 2, 'name' => 'poesía'],
            (object) ['id' => 20, 'parent' => 6, 'name' => 'anime'],
            (object) ['id' => 3, 'parent' => 1, 'name' => 'electrónicos'],
        ];

        function build(Category $parent, array $data)
        {
            $id = $parent->id();

            foreach ($data as $index => $element) {
                if ($element->parent === $id) {
                    $parent->addChild(new Category($element->id, $element->name));
                }
            }

            foreach ($parent->children() as $child) {
                build($child, $data);
            }
        }

        build($root, $stack);

        $printer = new Printer();

        $expected = <<<EOT
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
  musica
  películas
    acción
    anime
    comedia
    románticas
    suspenso
  ropa
    hombre
    mujer
      blusas
      faldas
      pantalones
      ropa interior
        brasieres
          curvation
          hannes
          playtex
        calzones
      sombreros

EOT;

        $this->assertEquals($expected, $printer->build($root));
    }
}
