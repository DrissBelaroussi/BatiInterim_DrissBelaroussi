<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * EntrepreneurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EntrepreneurRepository extends EntityRepository
{
    
    public function supprimerEntrepreneur($idEntrepreneur){
        $query = $this->_em->createQuery('delete from BatiBundle:Entrepreneur e where e.id =:idEntrepreneur')
                ->setParameter('idEntrepreneur', $idEntrepreneur);
        
        $result = $query->execute();
        return $result;
    }
    
    public function connexionEntrepreneur($login, $mdp){
        $qb = $this->createQueryBuilder('e') ;
        $qb->where('e.login = :login')->setParameter('login', $login)
                ->andWhere('e.mdp = :mdp')->setParameter('mdp', $mdp) ;
        
        $artisans = $qb->getQuery()->getResult() ;
        
        $result = null ;
        
        foreach($artisans as $artisan){
            $result = $artisan ;
        }
        
        if($result != null){
           return $result ; 
        } else {
            return false ; 
        }
        
    }
}
