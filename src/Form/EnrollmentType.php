<?php

namespace App\Form;

use App\Entity\Course;
use App\Entity\Enrollment;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EnrollmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('studentName', null, [
                'label' => 'Alumno/a',
            ])
            ->add('studentEmail', null, [
                'label' => 'Email',
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Estado',
                'choices' => [
                    'Pendiente' => 'Pendiente',
                    'Confirmada' => 'Confirmada',
                    'Cancelada' => 'Cancelada',
                ]
            ])
            ->add('course', EntityType::class, [
                'label' => 'Curso',
                'class' => Course::class,
                'choice_label' => 'title',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Enrollment::class,
        ]);
    }
}
