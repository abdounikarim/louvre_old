<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class CheckDate extends Constraint
{
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}