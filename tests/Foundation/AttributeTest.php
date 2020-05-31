<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-05-31 17:06:17
 */

namespace CodeSinging\LaravelAdminView\Tests\Foundation;

use CodeSinging\LaravelAdminView\Foundation\Attribute;
use PHPUnit\Framework\TestCase;

class AttributeTest extends TestCase
{
    public function testConstruct()
    {
        self::assertEquals(':id="1" title="Title"', (new Attribute(['id' => 1, 'title' => 'Title']))->build());
    }

    public function testConstructWithMultipleParams()
    {
        self::assertEquals(':id="1" title="Title"', (new Attribute(['id' => 1], ['title' => 'Title']))->build());
    }

    public function testAdd()
    {
        self::assertEquals('title="Title"', (new Attribute())->add('title', 'Title'));
    }

    public function testSetNameIsEmpty()
    {
        self::assertEquals([], (new Attribute())->set(null)->all());
        self::assertEquals([], (new Attribute())->set([])->all());
        self::assertEquals('', (new Attribute())->set(null)->build());
        self::assertEquals('', (new Attribute())->set([])->build());
    }

    public function testSetNameIsString()
    {
        self::assertEquals('title="Title"', (new Attribute())->set('title', 'Title'));
    }

    public function testSetNameIsArray()
    {
        self::assertEquals('title="Title"', (new Attribute())->set(['title' => 'Title']));
    }

    public function testHas()
    {
        $attribute = new Attribute();
        self::assertFalse($attribute->has('title'));
        $attribute->add('title', 'Title');
        self::assertTrue($attribute->has('title'));
    }

    public function testIsEmpty()
    {
        $attribute = new Attribute();
        self::assertTrue($attribute->isEmpty());
        $attribute->add('title', 'Title');
        self::assertFalse($attribute->isEmpty());
    }

    public function testClear()
    {
        self::assertTrue((new Attribute(['id' => 1]))->clear()->isEmpty());
    }

    public function testAll()
    {
        self::assertArrayHasKey('id', (new Attribute(['id' => 1]))->all());
    }

    public function testBuild()
    {
        self::assertEquals('id="1"', (new Attribute(['id' => '1'])));
        self::assertEquals(':id="1"', (new Attribute([':id' => '1'])));
        self::assertEquals(':id="1"', (new Attribute(['id' => 1])));
        self::assertEquals(':id="1"', (new Attribute(['id' => ':1'])));
        self::assertEquals(':id="1"', (new Attribute([':id' => ':1'])));

        self::assertEquals('disabled', new Attribute(['disabled']));
        self::assertEquals('disabled readonly', new Attribute(['disabled', 'readonly']));
        self::assertEquals('disabled :readonly="true"', new Attribute(['disabled', 'readonly' => true]));
        self::assertEquals('disabled :readonly="true"', new Attribute(['disabled', ':readonly' => true]));
        self::assertEquals('disabled :readonly="true"', new Attribute(['disabled', ':readonly']));
    }
}
