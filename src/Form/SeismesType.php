<?php

namespace App\Form;

use App\Entity\Seismes;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SeismesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('instant')
            ->add('lat')
            ->add('lon')
            ->add('pays')
            ->add('mag')
            ->add('profondeur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Seismes::class,
        ]);
    }
}
