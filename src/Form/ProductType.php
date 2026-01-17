<?php

namespace App\Form;

use App\Entity\Prduct;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', TextType::class, [
                'label' => 'Nom du produit',
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix (€)'
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Quantité'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer le produit'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prduct::class,
        ]);
    }
}