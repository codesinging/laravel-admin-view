<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-06-01 17:58:50
 */

namespace CodeSinging\LaravelAdminView\Tests\Foundation;

use CodeSinging\LaravelAdminView\Foundation\Page;
use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    public function test__construct()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->build());
    }

    public function testCharset()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="gbk">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->charset('gbk')->build());
    }

    public function testTitle()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>the title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->title('the title')->build());
    }

    public function testBase()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '<base href="http://localhost">' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->base(['href' => 'http://localhost'])->build());
    }

    public function testLink()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '<link rel="stylesheet" href="http://localhost">' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->link(['rel' => 'stylesheet', 'href' => 'http://localhost'])->build());
    }

    public function testMeta()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->meta([
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1, viewport-fit=cover'
        ])->build());
    }

    public function testScriptWithinHead()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '<script>let id = 1</script>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->script('let id = 1', true)->build());
    }

    public function testScriptWithinBody()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '<script>let id = 1</script>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->script('let id = 1')->build());
    }

    public function testStyle()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '<style>body{}</style>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->style('body{}')->build());
    }

    public function testJsWithinHead()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '<script src="app.js"></script>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->js('app.js', true)->build());
    }

    public function testJsWithinBody()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '<script src="app.js"></script>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->js('app.js')->build());
    }

    public function testContent()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '<div>content</div>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->content('<div>content</div>')->build());
    }

    public function testPrependContent()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '<div>prepend</div>' . PHP_EOL .
            '<div>content</div>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->content('<div>content</div>')->prependContent('<div>prepend</div>')->build());
    }

    public function testBuild()
    {
        $html = '<!DOCTYPE html>' . PHP_EOL .
            '<html lang="en">' . PHP_EOL .
            '<head>' . PHP_EOL .
            '<meta charset="utf-8">' . PHP_EOL .
            '<title>Title</title>' . PHP_EOL .
            '</head>' . PHP_EOL .
            '<body>' . PHP_EOL .
            '<div>content</div>' . PHP_EOL .
            '</body>' . PHP_EOL .
            '</html>';

        self::assertEquals($html, (new Page('Title'))->content('<div>content</div>')->build());
    }
}
