<?php

namespace App\Form;

use App\Entity\Booking;
use App\Validator\Constraints\CheckDate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('visitDay',DateType::class,[
                'label' => 'Jour de la visite',
                'html5' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'model_timezone' => 'Europe/Paris',
                'attr' => ['class' => 'datepicker', 'readonly' => 'readonly'],
                'invalid_message' => "La date saisie est invalide",
                'constraints' => [
                    new NotBlank(array('message' => "Merci de saisir une date valide")),
                    new GreaterThanOrEqual(array('value' => 'today', 'message' => 'La date est incorrecte')),
                    new CheckDate()
                ]

            ])
            ->add('ticketNumber', IntegerType::class, [
                'label' => 'Nombre de tickets'
            ])
            ->add('ticketType', ChoiceType::class, [
                'label' => 'Type de ticket',
                'choices' => [
                    'Demi-Journée' => 'D',
                    'Journée' => 'J'
                ]
            ])
            ->add('mail', EmailType::class, [
                'label' => 'Adresse mail'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Booking::class,
        ]);
    }
}
