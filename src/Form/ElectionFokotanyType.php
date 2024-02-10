<?php

namespace App\Form;

use App\Entity\Candidats;
use App\Entity\Elections;
use App\Entity\Motif;
use App\Entity\NiveauElection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElectionFokotanyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('debut')
            ->add('fin')
            ->add('candidat')
            ->add('electeur')
            ->add('participation')
            ->add('pourcentage')
            ->add('localisation')
            ->add('elu', EntityType::class, [
                'class' => Candidats::class,
'choice_label' => 'id',
            ])
            ->add('niveau', EntityType::class, [
                'class' => NiveauElection::class,
'choice_label' => 'id',
            ])
            ->add('motif', EntityType::class, [
                'class' => Motif::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Elections::class,
        ]);
    }
}
