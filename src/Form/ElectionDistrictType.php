<?php

namespace App\Form;

use App\Entity\Candidats;
use App\Entity\District;
use App\Entity\Elections;
use App\Entity\Motif;
use App\Entity\NiveauElection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElectionDistrictType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('debut')
            ->add('fin')
            ->add('district', EntityType::class,
            ['class'=>District::class,
            'choice_label'=>'nom'])
            ->add('niveau', EntityType::class, [
                'class' => NiveauElection::class,
'choice_label' => 'niveau',
            ])
            ->add('motif', EntityType::class, [
                'class' => Motif::class,
'choice_label' => 'motif',
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
