<?php

namespace App\Form;

use App\Entity\Former;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('username')
            ->add('email')
            ->add('password')
            ->add('retypePassword')
//            ->add('createdAt')
//            ->add('updatedAt')
//            ->add('roles')++
            ->add('address')
            ->add('phone')
            ->add('cne')
            ->add('city')
            ->add('matricule')
            ->add('typeContrat')
            ->add('grade')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Former::class,
        ]);
    }
}
