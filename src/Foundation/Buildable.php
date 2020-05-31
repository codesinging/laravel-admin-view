<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-05-31 16:53:00
 */

namespace CodeSinging\LaravelAdminView\Foundation;

abstract class Buildable
{
    /**
     * Build content as a string of the object.
     *
     * @return string
     */
    abstract public function build();

    /**
     * Get the content as a string of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->build();
    }
}