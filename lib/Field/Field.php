<?php

namespace Tacone\Bees\Field;

use Tacone\Bees\Attribute\Attribute;
use Tacone\Bees\Attribute\ErrorsAttribute;
use Tacone\Bees\Attribute\JoinedArrayAttribute;
use Tacone\Bees\Base\CopiableTrait;
use Tacone\Bees\Base\Exposeable;

abstract class Field
{
    use CopiableTrait;

    /**
     * @var Attribute
     */
    public $name;

    /**
     * @var
     */
    public $value;
    public $rules;
    public $errors;

    public function __construct($name, $label = null)
    {
        // Look! Every property is an object in itself. We do that
        // to make things more robust, reuse logic and move it outside
        // of this class

        $this->errors = new ErrorsAttribute();
        $this->name = new Attribute($name);
        $this->rules = new JoinedArrayAttribute(null, '|');
        $this->value = new Attribute();
    }

    /**
     * Implements a jQuery-like interface.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return $this
     */
    public function __call($method, $parameters)
    {
        return Exposeable::handleExposeables($this, $method, $parameters);
    }
}
