<?php

namespace BatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ChefchantierType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom' , 'text' , array('label' => 'Nom'))
            ->add('prenom', 'text'  , array('label' => 'Prénom'))
            ->add('datenaiss', 'date' , array('label' => 'Date de naissance (jj/mm/aaaa) ', 'format' => 'dd-MM-yyyy', 'years' => range(1950, 2000)))
            ->add('lieunaiss' , 'text' , array('label' => 'Lieu de naissance'))
            ->add('telephone' , 'text' , array('label' => 'Téléphone'))
            ->add('adresse' , 'text' , array('label' => 'Adresse'))
            ->add('cp' , 'text' , array('label' => 'Code Postal'))
            ->add('ville' , 'text' , array('label' => 'Ville')) 
            ->add('valider' , 'submit',  array('attr' => array('class' => "btn btn-inverse")));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatiBundle\Entity\Chefchantier'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'batibundle_chefchantier';
    }
}
