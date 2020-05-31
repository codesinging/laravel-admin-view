<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-05-31 16:56:27
 */

namespace CodeSinging\LaravelAdminView\Tests\Foundation;

use CodeSinging\LaravelAdminView\Foundation\Buildable;
use PHPUnit\Framework\TestCase;

class BuildableTest extends TestCase
{

    public function test__toString()
    {
        self::assertEquals('example', new Example());
    }

    public function testBuild()
    {
        self::assertEquals('example', (new Example())->build());
    }
}

class Example extends Buildable
{

    /**
     * @inheritDoc
     */
    public function build()
    {
        return 'example';
    }
}