<?php

namespace App\Form;

use App\Entity\Materiel;
use App\Entity\MaterielSoiree;
use App\Entity\Soiree;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaterielSoireeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('soiree', EntityType::class, [
                'class' => Soiree::class,
                'choice_label' => 'nom',
            ])
            ->add('materiel', EntityType::class, [
                'class' => Materiel::class,
                'choice_label' => 'nom',
            ])
            ->add('quantite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => MaterielSoiree::class,
        ]);
    }
}
