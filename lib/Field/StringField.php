<?php

namespace Tacone\Bees\Field;

class StringField extends Field
{

    public function cast()
    {
        return (string)$this->value();
    }
}
