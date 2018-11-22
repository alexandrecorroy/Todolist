<?php

namespace AppBundle\Form;

use AppBundle\Form\Interfaces\UserRegistrationTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class UserRegistrationType.
 */
final class UserRegistrationType extends AbstractType implements UserRegistrationTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, ['label' => "Nom d'utilisateur"])
            ->add('email', EmailType::class, ['label' => 'Adresse email'])
            ->add('isAdmin', CheckboxType::class, [
                'required' => false,
                'label' => "Cette utilisateur aura t-il le status administrateur ?"
            ])
        ;
    }
}
