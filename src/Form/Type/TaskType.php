<?php

// src/Form/Type/TaskType.php
namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;


class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('first_name', TextType::class, ['label' => 'First Name', 'label_attr' => ['class' => 'p']])
            ->add('last_name', TextType::class, ['label' => 'Last Name', 'label_attr' => ['class' => 'p']])
            ->add('date_of_birth', DateType::class, [
                'widget' => 'single_text', 'html5' => false, 'label_attr' => ['class' => 'p'], 'format' => 'dd/MM/yyyy'])
            ->add('email_address', EmailType::class, ['label' => 'Email', 'label_attr' => ['class' => 'p']])
            ->add('submit', SubmitType::class)
        ;
    }

    // public function configureOptions(OptionsResolver $resolver): void
    // {
    //     $resolver->setDefaults([
    //         'data_class' => Task::class,
    //     ]);
    // }
}

?>