<?php

namespace AppBundle\Form;

use AppBundle\Entity\Car;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("description", TextType::class)
            ->add('importer', EntityType::class, array(
                'label' => 'Dealer',
                'placeholder' => 'Choose Dealer',
                'class' => 'AppBundle:Importer',
                'choice_label' => 'importer',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                "data_class" => Car::class
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_search_type';
    }
}
