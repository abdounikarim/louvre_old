<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CheckDateValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof \DateTime) {
            $this->context->buildViolation("La date n'est pas valide")
                ->addViolation();
        }
        $dayFormat = $value->format('D');
        $dayAndMonthFormat = $value->format('d/m');

        // Musée fermé le mardi
        if($dayFormat === 'Tue'){
            $this->context->buildViolation("Le musée est fermé le mardi")
                ->addViolation();
        }

        // Musée fermé le 1er mai
        else if($dayAndMonthFormat === '01/05'){
            $this->context->buildViolation("Le musée est fermé le 1er mai")
                ->addViolation();
        }

        // Musée fermé le 1er novembre
        else if($dayAndMonthFormat === '01/11'){
            $this->context->buildViolation("Le musée est fermé le 1er novembre")
                ->addViolation();
        }

        // Musée fermé le 25 décembre
        else if($dayAndMonthFormat === '25/12'){
            $this->context->buildViolation("Le musée est fermé le 25 décembre")
                ->addViolation();
        }

        //Quand plus de 1000 billets ont été vendus
    }

}