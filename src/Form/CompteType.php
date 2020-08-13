<?php

namespace App\Form;

use App\Entity\Compte;
use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CompteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numagence',TextType::class,array('label'=>'Numero Agence','attr'=>array('class'=>'form-control')))
            ->add('numcompte',TextType::class,array('label'=>'Numero Compte','attr'=>array('class'=>'form-control')))
            ->add('clerib',TextType::class,array('label'=>'Cle Rib','attr'=>array('class'=>'form-control')))
            ->add('typecompte',TextType::class,array('label'=>'Type de Compte','attr'=>array('class'=>'form-control')))
            ->add('idclient',EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom',
            ])
            //->add('valider', SubmitType::class) 
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Compte::class,
        ]);
    }
}
