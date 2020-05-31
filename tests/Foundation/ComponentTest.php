<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-05-31 17:25:13
 */

namespace CodeSinging\LaravelAdminView\Tests\Foundation;

use CodeSinging\LaravelAdminView\Foundation\Component;
use PHPUnit\Framework\TestCase;

class ComponentTest extends TestCase
{

    public function test__construct()
    {
        self::assertEquals('<el-component></el-component>', new Component());
        self::assertEquals('<el-component id="app"></el-component>', new Component(['id' => 'app']));
    }

    public function testFullTag()
    {
        self::assertEquals('el-component', (new Component())->fullTag());
        self::assertEquals('el-components', (new Components())->fullTag());
        self::assertEquals('el-component-example', (new ComponentExample())->fullTag());

    }

    public function testBaseTag()
    {
        self::assertEquals('component', (new Component())->baseTag());
        self::assertEquals('components', (new Components())->baseTag());
        self::assertEquals('component-example', (new ComponentExample())->baseTag());
    }
}

class ComponentExample extends Component
{

}

class Components extends Component
{

}