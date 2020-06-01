<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-06-01 16:26:53
 */

namespace CodeSinging\LaravelAdminView\Foundation;

use Closure;

class Page extends Buildable
{
    /**
     * @var Content
     */
    protected $content;

    /**
     * The html element of the page.
     *
     * @var Element
     */
    protected $html;

    /**
     * The head element of the page.
     *
     * @var Element
     */
    protected $head;

    /**
     * The body element of the page.
     *
     * @var Element
     */
    protected $body;

    /**
     * The page charset.
     *
     * @var string
     */
    protected $charset = 'utf-8';

    /**
     * The page title.
     *
     * @var string
     */
    protected $title = 'A page built by Laravel Admin View';

    /**
     * Page constructor.
     *
     * @param string|null $title
     */
    public function __construct(string $title = null)
    {
        $this->initPage();
        $title and $this->title($title);
    }

    /**
     * Set page charset.
     *
     * @param string $charset
     *
     * @return $this
     */
    public function charset(string $charset)
    {
        $this->charset = $charset;
        return $this;
    }

    /**
     * Set page title.
     *
     * @param string $title
     *
     * @return $this
     */
    public function title(string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Add a base element.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function base(array $attributes)
    {
        $element = new Element('base', $attributes, null, false);
        $this->head->content($element);
        return $this;
    }

    /**
     * Add a link element.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function link(array $attributes)
    {
        $element = new Element('link', $attributes, null, false);
        $this->head->content($element);
        return $this;
    }

    /**
     * Add a meta element.
     *
     * @param array $attributes
     *
     * @return $this
     */
    public function meta(array $attributes)
    {
        $element = new Element('meta', $attributes, null, false);
        $this->head->content($element);
        return $this;
    }

    /**
     * Add script element in head element.
     *
     * @param string $content
     *
     * @param bool   $withinHead
     *
     * @return $this
     */
    public function script(string $content, bool $withinHead = false)
    {
        $element = new Element('script', $content);
        if ($withinHead) {
            $this->head->content($element);
        } else {
            $this->body->content($element);
        }
        return $this;
    }

    /**
     * Add style element in head element.
     *
     * @param string $content
     *
     * @return $this
     */
    public function style(string $content)
    {
        $element = new Element('style', $content);
        $this->head->content($element);
        return $this;
    }

    /**
     * @param string $url
     *
     * @param bool   $withinHead
     *
     * @return $this
     */
    public function js(string $url, bool $withinHead = false)
    {
        $element = new Element('script', ['src' => $url]);
        if ($withinHead) {
            $this->head->content($element);
        } else {
            $this->body->content($element);
        }
        return $this;
    }

    /**
     * Add content to the body element.
     *
     * @param string|array|Buildable|Closure ...$contents
     *
     * @return $this
     */
    public function content(...$contents)
    {
        $this->body->content(...$contents);
        return $this;
    }

    /**
     * Add content to the beginning of the body.
     *
     * @param string|array|Buildable|Closure ...$contents
     *
     * @return $this
     */
    public function prependContent(...$contents)
    {
        $this->body->prependContent(...$contents);
        return $this;
    }

    /**
     * Initialize the page content.
     */
    protected function initPage()
    {
        $this->content = new Content();

        $this->html = new Element('html', ['lang' => 'en']);
        $this->html->content->glue();
        $this->html->linebreak();

        $this->head = new Element('head');
        $this->head->linebreak();
        $this->head->content->glue();

        $this->body = new Element('body');
        $this->body->linebreak();
        $this->body->content->glue();
    }

    /**
     * Build the page content.
     */
    protected function buildPage()
    {
        $this->content->add('<!DOCTYPE html>');

        $this->head->prependContent(
            new Element('meta', ['charset' => $this->charset], null, false),
            new Element('title', $this->title)
        );

        $this->html->content($this->head, $this->body);
        $this->content->add($this->html);

        $this->content->glue();
    }

    /**
     * @inheritDoc
     */
    public function build()
    {
        $this->buildPage();
        return $this->content->build();
    }
}
