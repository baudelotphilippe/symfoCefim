<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ContactType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder        
        ->add('nom', TextType::class)
        ->add('email', EmailType::class)
        ->add('message', TextareaType::class)
        ->add('envoyer', SubmitType::class);
    }
}