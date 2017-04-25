<?php

namespace BatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChantierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle' , 'text' , array('label' => 'Libellé'))
            ->add('datedebut' , 'date' , array('label' => 'Date de début'))
            ->add('datefin' , 'date' , array('label' => 'Date de fin'))
            ->add('lieu' , 'textarea' , array('label' => 'Lieu'))
            ->add('Valider', 'submit',  array('attr' => array('class' => "btn btn-inverse")))
            
             
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatiBundle\Entity\Chantier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'batibundle_chantier';
    }
}
