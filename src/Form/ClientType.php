<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,array('label'=>'Nom','attr'=>array('class'=>'form-control')))
            ->add('prenom',TextType::class,array('label'=>'Prenom','attr'=>array('class'=>'form-control')))
            ->add('email',TextType::class,array('label'=>'Email','attr'=>array('class'=>'form-control')))
            ->add('telephone',TextType::class,array('label'=>'Telephone','attr'=>array('class'=>'form-control')))
           /* ->add('valider', SubmitType::class,array('attr'=>array('class'=>'btn btn-success form-group')))
           ->add('Annuler', SubmitType::class,array('attr'=>array('class'=>'btn btn-danger form-group')))   */
           
           
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
