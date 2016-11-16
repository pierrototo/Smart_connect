<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ButtonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        var_dump($options);

        $builder->add('button_product');
        $builder->add('button_price');
        $builder->add('alert', ChoiceType::class, array(
            'choices'  => array(
                0 => 'Non',
                1 => 'Oui',
            ),
        ));
        
        
    }
}