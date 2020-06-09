<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-05-31 17:19:08
 */

namespace CodeSinging\LaravelAdminView\Foundation;

use Illuminate\Support\Str;

class Component extends Element
{
    /**
     * @var string The component tag's prefix.
     */
    protected $tagPrefix = 'el-';

    /**
     * @var string The component's base tag.
     */
    protected $baseTag = '';

    /**
     * Component constructor.
     *
     * @param array|null $attributes
     * @param null       $content
     * @param bool       $closing
     * @param bool       $linebreak
     */
    public function __construct(array $attributes = null, $content = null, bool $closing = true, bool $linebreak = false)
    {
        parent::__construct($this->fullTag(), $attributes, $content, $closing, $linebreak);
    }

    /**
     * Get he component's base tag.
     *
     * @return string
     */
    public function baseTag()
    {
        return $this->baseTag ?: Str::kebab(class_basename($this));
    }

    /**
     * Get the component's full tag.
     *
     * @return string
     */
    public function fullTag()
    {
        return $this->tagPrefix . $this->baseTag();
    }

    /**
     * The methods to set attributes.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return $this
     */
    public function __call($name, $parameters)
    {
        $name = Str::kebab($name);
        $this->set($name, $parameters[0] ?? true, $parameters[1] ?? null);
        return $this;
    }
}