<?php

namespace App\Form;

use App\Entity\Electeurs;
use App\Entity\Elections;
use App\Entity\Fokotany;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ElecteursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('CIN')
            ->add('Age')
            ->add('adresse')
            ->add('telephone')
            ->add('mdp')
            ->add('identifiant')
            ->add('fokotany', EntityType::class, [
                'class' => Fokotany::class,
            'choice_label' => 'nom',
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
            'data_class' => Electeurs::class,
        ]);
    }
}
