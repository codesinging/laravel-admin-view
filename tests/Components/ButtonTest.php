<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-06-02 08:37:25
 */

namespace CodeSinging\LaravelAdminView\Tests\Components;

use CodeSinging\LaravelAdminView\Components\Button;
use PHPUnit\Framework\TestCase;

class ButtonTest extends TestCase
{

    public function test__construct()
    {
        self::assertEquals(
            '<el-button>Button</el-button>',
            Button::init('Button')
        );
        self::assertEquals(
            '<el-button type="primary">Button</el-button>',
            Button::init('Button', 'primary')
        );
        self::assertEquals(
            '<el-button disabled type="primary">Button</el-button>',
            Button::init('Button', 'primary', ['disabled'])
        );
    }

    public function testSize()
    {
        foreach (['medium', 'small', 'mini'] as $size) {
            self::assertEquals(
                sprintf('<el-button size="%s"></el-button>', $size),
                Button::init()->size($size)
            );
        }
    }

    public function testSizeShortcut()
    {
        self::assertEquals(
            '<el-button size="default"></el-button>',
            Button::init()->sizeAsDefault()
        );
        self::assertEquals(
            '<el-button size="medium"></el-button>',
            Button::init()->sizeAsMedium()
        );
        self::assertEquals(
            '<el-button size="small"></el-button>',
            Button::init()->sizeAsSmall()
        );
        self::assertEquals(
            '<el-button size="mini"></el-button>',
            Button::init()->sizeAsMini()
        );
    }

    public function testType()
    {
        foreach (['primary', 'success', 'warning', 'danger', 'info', 'text'] as $type) {
            self::assertEquals(
                sprintf('<el-button type="%s">Button</el-button>', $type),
                Button::init('Button')->type($type)->build()
            );
        }
    }

    public function testTypeShortcut()
    {
        self::assertEquals(
            '<el-button type="default"></el-button>',
            Button::init()->typeAsDefault()
        );
        self::assertEquals(
            '<el-button type="primary"></el-button>',
            Button::init()->typeAsPrimary()
        );
        self::assertEquals(
            '<el-button type="success"></el-button>',
            Button::init()->typeAsSuccess()
        );
        self::assertEquals(
            '<el-button type="warning"></el-button>',
            Button::init()->typeAsWarning()
        );
        self::assertEquals(
            '<el-button type="danger"></el-button>',
            Button::init()->typeAsDanger()
        );
        self::assertEquals(
            '<el-button type="info"></el-button>',
            Button::init()->typeAsInfo()
        );
        self::assertEquals(
            '<el-button type="text"></el-button>',
            Button::init()->typeAsText()
        );
    }

    public function testPlain()
    {
        self::assertEquals(
            '<el-button type="primary" :plain="true">Button</el-button>',
            Button::init('Button', 'primary')->plain()->build()
        );
    }

    public function testRound()
    {
        self::assertEquals(
            '<el-button type="primary" :round="true">Button</el-button>',
            Button::init('Button', 'primary')->round()->build()
        );
    }

    public function testCircle()
    {
        self::assertEquals(
            '<el-button type="primary" :circle="true">Button</el-button>',
            Button::init('Button', 'primary')->circle()->build()
        );
        self::assertEquals(
            '<el-button type="primary" :circle="false">Button</el-button>',
            Button::init('Button', 'primary')->circle(false)->build()
        );
    }

    public function testLoading()
    {
        self::assertEquals(
            '<el-button type="primary" :loading="true">Button</el-button>',
            Button::init('Button', 'primary')->loading()->build()
        );
    }

    public function testDisabled()
    {
        self::assertEquals(
            '<el-button type="primary" :disabled="true">Button</el-button>',
            Button::init('Button', 'primary')->disabled()->build()
        );
    }

    public function testIcon()
    {
        self::assertEquals(
            '<el-button type="primary" icon="el-icon-loading">Button</el-button>',
            Button::init('Button', 'primary')->icon('el-icon-loading')->build()
        );
    }

    public function testAutofocus()
    {
        self::assertEquals(
            '<el-button type="primary" :autofocus="true">Button</el-button>',
            Button::init('Button', 'primary')->autofocus()->build()
        );
    }

    public function testNativeType()
    {
        self::assertEquals(
            '<el-button type="primary" native-type="submit">Button</el-button>',
            Button::init('Button', 'primary')->nativeType('submit')->build()
        );
        self::assertEquals(
            '<el-button type="primary" :native-type="type">Button</el-button>',
            Button::init('Button', 'primary')->nativeType(':type')->build()
        );
    }
}
