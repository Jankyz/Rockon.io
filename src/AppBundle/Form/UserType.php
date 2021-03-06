<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("name", TextType::class, ['label' => "Imię"])
            ->add("surname", TextType::class, ['label' => "Nazwisko"])
            ->add("birthdate", BirthdayType::class, ['label' => "Data urodzenia"])
            ->add("position", TextType::class, ['label' => "Stanowisko"])
            ->add("email", EmailType::class, ['label' => "Email"])
            ->add("username", TextType::class, ['label' => "Login"])
            ->add("plainPassword",  RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Hasło'),
                'second_options' => array('label' => 'Powtórz hasło'),
            ))
            ->add("submit", SubmitType::class, ['label' => "Zarejestruj!"]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            ["data_class" => User::class]
        );
    }
}