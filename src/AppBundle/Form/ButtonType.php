<?php
// src/AppBundle/Form/RegistrationType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ButtonType extends AbstractType
{
    private $list_of_items;

    public function __construct($list_of_items = null)
    {
        $this->list_of_items = $list_of_items;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $list_of_items = $this->list_of_items;
        $choice = array();

        if(sizeof($list_of_items)>0){
            for($i= 0; $i < sizeof($list_of_items); $i++){
                $choice[$list_of_items[$i]->ASIN] = $list_of_items[$i]->ItemAttributes->Title;
            }
        }

        $builder->add('search', 'text', array(
                "mapped" => false,
                'required' => false,
                'label' => "Produit à rechercher",
            ));
        $builder->add('category', ChoiceType::class, array(
                "mapped" => false,
                'label' => "Catégorie",
                'choices' => array(
                    '0' => 'DVD',
                    '1' => 'Music',
                    ),
            ));
        if($list_of_items == null){
            $builder->add('product', ChoiceType::class, array(
                "mapped" => false,
                'label' => "Choisir le produit",
                'choices' => array(
                    'Y0L0' => "-- Faites une recherche pour l'activer --",
                    ),
                'attr' => array('class' => 'a_cacher', 'style' => 'margin-left:20px'),
            ));
        }
        else {
            $builder->add('product', ChoiceType::class, array(
                "mapped" => false,
                'label' => "Choisir le produit",
                'choices'  => $choice,
                'placeholder' => '-- Choisir --',
                'attr' => array('class' => 'a_peter', 'style' => 'margin-left:20px'),
            ));
        }
        $builder->add('alert', ChoiceType::class, array(
            'choices'  => array(
                0 => 'Non',
                1 => 'Oui',
            ),
            'attr' => array('style' => 'margin-left:113px'),
        ));
        $builder->add('button_price','text', array(
                'attr' => array('style' => 'margin-left:57px'),
            ));
        $builder->add('button_product', HiddenType::class,array());
        $builder->add('asin', HiddenType::class,array());
    }

    public function setDefaultOptions(\Symfony\Component\OptionsResolver\OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'validation_groups' => false,
        ));
    }
}