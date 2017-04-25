<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GestionnaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GestionnaireRepository extends EntityRepository
{
    
    public function connexionGestionnaire($login, $mdp){
        $qb = $this->createQueryBuilder('g') ;
        $qb->where('g.loging = :login')->setParameter('login', $login)
                ->andWhere('g.mdpg = :mdp')->setParameter('mdp', $mdp) ;
        
        $gestionnaires = $qb->getQuery()->getResult() ;
        
        $result = null ;
        
        foreach($gestionnaires as $gestionnaire){
            $result = $gestionnaire ;
        }
        
        if($result != null){
           return $result ; 
        } else {
            return false ; 
        }
        
    }
}