<?php

use Kata\CategoryTree\Category;
use PHPUnit\Framework\TestCase;

class CategoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_instanciated()
    {
        $this->assertInstanceOf(Category::class, new Category(1, 'Apple'));
    }

    /**
     * @test
     */
    public function attributes_can_be_read()
    {
        $category = new Category(1, 'Apple');

        $this->assertEquals(1, $category->id());
        $this->assertEquals('Apple', $category->name());
        $this->assertEquals([], $category->children());
    }

    /**
     * @test
     */
    public function can_add_children_categories()
    {
        $category = new Category(1, 'root');

        $apple = new Category(2, 'apple');
        $samsung = new Category(3, 'samsung');

        $category->addChild($apple);
        $category->addChild($samsung);

        $this->assertEquals($apple, $category->children()[0]);
        $this->assertEquals($samsung, $category->children()[1]);
    }
}
