<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('birthdate', 'date', array(
            'widget' => 'single_text',
        ));
        $builder->add('civility', ChoiceType::class, array(
            'choices'  => array(
                0 => 'M',
                1 => 'Mme',
            ),
        ));
        $builder->add('phone_number');
        $builder->add('token_zinc');
        $builder->add('roles', 'collection', array(
                   'type' => 'choice',
                   'options' => array(
                       'label' => 'rôle', /* Ajoutez cette ligne */
                       'choices' => array(
                           'ROLE_ADMIN' => 'Admin'
                       )
                   )
               )
           );
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

}