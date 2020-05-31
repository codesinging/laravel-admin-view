<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-05-31 17:12:45
 */

namespace CodeSinging\LaravelAdminView\Tests\Foundation;

use CodeSinging\LaravelAdminView\Foundation\Builder;
use PHPUnit\Framework\TestCase;

class BuilderTest extends TestCase
{
    public function testConstruct()
    {
        self::assertEquals('<div>hello</div>', new Builder('div', 'hello'));
    }

    public function testTag()
    {
        self::assertEquals('<span></span>', (new Builder())->tag('span'));
    }

    public function testContent()
    {
        self::assertEquals('<div>hello</div>', (new Builder())->content('hello'));
    }

    public function testAttribute()
    {
        self::assertEquals('<div></div>', (new Builder())->attribute());
        self::assertEquals('<div id="app"></div>', (new Builder())->attribute('id="app"'));
    }

    public function testClosing()
    {
        self::assertEquals('<input />', (new Builder('input'))->closing(false)->build());
    }

    public function testLinebreak()
    {
        self::assertEquals('<div></div>', (new Builder())->linebreak(false)->build());
        self::assertEquals('<div>' . PHP_EOL . '</div>', (new Builder())->linebreak(true)->build());
        self::assertEquals('<div>' . PHP_EOL . 'hello' . PHP_EOL . '</div>', (new Builder('div', 'hello'))->linebreak(true)->build());
    }

    public function testBuildIndex()
    {
        self::assertIsInt((new Builder())->buildIndex());
        self::assertEquals((new Builder())->buildIndex() + 1, (new Builder())->buildIndex());
    }

    public function testBuildId()
    {
        self::assertIsNumeric((new Builder())->buildId());
        self::assertIsString((new Builder())->buildId());
        self::assertStringStartsWith('prefix_', (new Builder())->buildId('prefix_'));
        self::assertStringEndsWith('_suffix', (new Builder())->buildId('', '_suffix'));
    }

    public function testBuild()
    {
        self::assertEquals('<div></div>', new Builder('div'));
    }
}
