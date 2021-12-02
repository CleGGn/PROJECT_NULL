<?php

namespace App\Form;

use App\Entity\Summoner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SummFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('query', TextType::class, [
                'label' => "Nom d'invocateur",
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez un mot-clé',
                    'value' => 'ElPoivrot'

                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Summoner::class,
        ]);
    }
}
