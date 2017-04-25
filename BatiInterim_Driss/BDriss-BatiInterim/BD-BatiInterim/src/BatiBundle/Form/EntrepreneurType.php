<?php

namespace BatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntrepreneurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder            
            ->add('nomsociete', 'text' , array('label' => 'Nom de la societé'))
            ->add('nomchef',  'text' , array('label' => 'Nom du Responsable'))
            ->add('prenomchef', 'text' , array('label' => 'Prénom du Responsable'))
            ->add('telephonesociete', 'text' , array('label' => 'Téléphone'))
            ->add('adressesociete' , 'text' , array('label' => 'Adresse') )
            ->add('cpsociete' , 'text' , array('label' => 'Code postal'))
            ->add('ville' , 'text' , array('label' => 'Ville') ) 
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatiBundle\Entity\Entrepreneur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'batibundle_entrepreneur';
    }
}
