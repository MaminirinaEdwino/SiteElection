<?php

namespace App\Form;

use App\Entity\Candidats;
use App\Entity\Electeurs;
use App\Entity\Elections;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CandidatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('motif')
            ->add('photo')
            ->add('pourcentage')
            ->add('identifiant', EntityType::class, [
                'class' => Electeurs::class,
'choice_label' => 'id',
            ])
            ->add('election', EntityType::class, [
                'class' => Elections::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Candidats::class,
        ]);
    }
}
