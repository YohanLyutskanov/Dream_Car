<?php

namespace AppBundle\Form;

use AppBundle\Entity\Car;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("brand", TextType::class)
            ->add('year', TextType::class)
            ->add('power', TextType::class)
            ->add('importer', EntityType::class, array(
                'label' => 'Dealer',
                'placeholder' => 'Choose Dealer',
                'class' => 'AppBundle:Importer',
                'choice_label' => 'importer',
            ))
            ->add('description', TextareaType::class);
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
        return 'app_bundle_car_type';
    }
}
