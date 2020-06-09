<?php
/**
 * Author:  CodeSinging (The code is singing)
 * Email:   codesinging@gmail.com
 * Github:  https://github.com/codesinging
 * Time:    2020-06-01 08:27:10
 */

namespace CodeSinging\LaravelAdminView\Components;

use CodeSinging\LaravelAdminView\Foundation\Component;
use Illuminate\Support\Str;

/**
 * Class Button
 *
 * @method $this size(string $size, string $default = null)
 * @method $this type(string $type, string $default = null)
 * @method $this plain(bool $plain = true, bool $default = null)
 * @method $this round(bool $round = true, bool $default = null)
 * @method $this circle(bool $circle = true, bool $default = null)
 * @method $this loading(bool $loading = true, bool $default = null)
 * @method $this disabled(bool $disabled = true, bool $default = null)
 * @method $this icon(string $icon, string $default = null)
 * @method $this autofocus(bool $autofocus = true, bool $default = null)
 * @method $this nativeType(string $nativeType, string $default = null)
 *
 * @method $this sizeAsDefault(string $default = null)
 * @method $this sizeAsMedium(string $default = null)
 * @method $this sizeAsSmall(string $default = null)
 * @method $this sizeAsMini(string $default = null)
 *
 * @method $this typeAsDefault(string $default = null)
 * @method $this typeAsPrimary(string $default = null)
 * @method $this typeAsSuccess(string $default = null)
 * @method $this typeAsWarning(string $default = null)
 * @method $this typeAsDanger(string $default = null)
 * @method $this typeAsInfo(string $default = null)
 * @method $this typeAsText(string $default = null)
 *
 * @package CodeSinging\LaravelAdminView\Components
 */
class Button extends Component
{
    // Button sizes.
    const SIZE_MEDIUM = 'medium';
    const SIZE_SMALL = 'small';
    const SIZE_MINI = 'mini';

    // Button types.
    const TYPE_PRIMARY = 'primary';
    const TYPE_SUCCESS = 'success';
    const TYPE_WARNING = 'warning';
    const TYPE_DANGER = 'danger';
    const TYPE_INFO = 'info';
    const TYPE_TEXT = 'text';

    public function __construct($text = null, string $type = null, array $attributes = null)
    {
        if (is_array($text)) {
            parent::__construct($text);
        } else {
            parent::__construct($attributes);
            $text and $this->content($text);
            $type and $this->set('type', $type);
        }
    }

    public function __call($name, $parameters)
    {
        // handle size shortcut
        if (Str::startsWith($name, 'sizeAs')) {
            $size = strtolower(Str::after($name, 'sizeAs'));
            return $this->set('size', $size, $parameters[0] ?? null);
        }

        // handle type shortcut
        if (Str::startsWith($name, 'typeAs')) {
            $type = strtolower(Str::after($name, 'typeAs'));
            return $this->set('type', $type, $parameters[0] ?? null);
        }

        return parent::__call($name, $parameters);
    }
}