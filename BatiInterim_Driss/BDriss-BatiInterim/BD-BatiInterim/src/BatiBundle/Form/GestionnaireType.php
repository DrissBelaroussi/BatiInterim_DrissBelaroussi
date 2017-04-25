<?php

namespace BatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GestionnaireType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('loging', 'text' , array('label' => 'Login'))
            ->add('mdpg', 'password' , array('label' => 'Mot de passe'))
            ->add('Valider' , 'submit', array('attr' => array('class' => "btn btn-inverse")))
            ->add('Annuler' , 'reset',  array('attr' => array('class' => "btn btn-inverse")))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatiBundle\Entity\Gestionnaire'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'batibundle_gestionnaire';
    }
}
