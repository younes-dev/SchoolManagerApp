<?php

namespace App\Form;

use App\Entity\Evaluation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('note')
            ->add('duration',ChoiceType::class,[
                'placeholder' => 'Choose an option',
                'choices'  => [
                    '30 min' => '30 min',
                    '45 min' => '45 min',
                    '1 h ' => '1 h',
                    '1h30min' => '1h30min',
                    '2h' => '2h',
                    '2h30min' => '2h30min',
                    '3h' => '3h',
                    '3h30min' => '3h30min',
                    '4h' => '4h',
                    '4h30min' => '4h30min',
                    '5h' => '5h',
                    '5h30min' => '5h30min',

                ],
            ])
            ->add('evaluationAt')
            ->add('matiere')
            ->add('former')
            ->add('student')
            ->add('evaluationCategory')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evaluation::class,
        ]);
    }
}
