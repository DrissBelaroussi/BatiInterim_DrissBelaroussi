<?php

namespace BatiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MissionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $date = new \DateTime('now');
        $dateSQL = $date->format('Y-m-d') ;
        $years = substr($dateSQL ,0,4) ;
        $months = substr($dateSQL ,5,2) ;
        $days = substr($dateSQL ,8,2) ;
        
        $builder
            ->add('intitule' , 'text' , array('label' => "Intitulé"))
            ->add('nbartisans' , 'integer', array('label' => "Nombre d'artisans" ))
            ->add('prixjournalier' , 'integer' , array('label' => "Prix journalier" , ))
            ->add('datedebut' , 'date' , array('label' => "Date de début" ,'years' => range($years, $years + 5 ) , 
               'data' => $date ))
            ->add('datefin' , 'date' , array('label' => "Date de fin"))                          
            ->add('idcorpsmetier', 'entity', array('class' => 'BatiBundle:Corpsmetier', 'property' => "libelle", 'label' => 'Corps métier'))
            ->add('valider' , 'submit',  array('attr' => array('class' => "btn btn-inverse")))
            
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BatiBundle\Entity\Mission'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'batibundle_mission';
    }
}
