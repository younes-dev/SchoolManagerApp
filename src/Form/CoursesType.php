<?php

namespace App\Form;

use App\Entity\Classe;
use App\Entity\Courses;
use App\Entity\Former;
use App\Entity\Matiere;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('courseAt', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])

            ->add('finishedAt', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
            ])

            ->add('former')
            ->add('classe',EntityType::class,[
                'class' => Classe::class,
                'choice_label' => 'name',
            ])
            ->add('matiere',EntityType::class,[
                'class' => Matiere::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Courses::class,
        ]);
    }
}
