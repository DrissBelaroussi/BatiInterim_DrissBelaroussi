<?php

namespace BatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AffecterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder          
            ->add('idartisan' ,'entity', array('class' => 'BatiBundle:Artisan', 'property' => "nom", 'label' => 'Artisan'))
           
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatiBundle\Entity\Affecter'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'batibundle_affecter';
    }
}
