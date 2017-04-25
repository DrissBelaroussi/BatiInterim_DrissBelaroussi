<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ArtisanRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArtisanRepository extends EntityRepository
{
    
    public function supprimerArtisan($idArtisan){
        $query = $this->_em->createQuery('delete from BatiBundle:Artisan a where a.id =:idArtisan')
                ->setParameter('idArtisan', $idArtisan);
        
        $result = $query->execute();
        return $result;
    }
    
    
    public function connexionArtisan($login, $mdp){
        $qb = $this->createQueryBuilder('a') ;
        $qb->where('a.login = :login')->setParameter('login', $login)
                ->andWhere('a.mdp = :mdp')->setParameter('mdp', $mdp) ;
        
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
