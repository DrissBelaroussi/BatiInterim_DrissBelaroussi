<?php

namespace BatiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * AffecterchefRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AffecterchefRepository extends EntityRepository
{
//   public function getChefsNonAffect(){
//   $chefs = $this->createQueryBuilder('a')
//                ->innerJoin('c.idchef', 'c')
//                ->where('a.idchantier <= :datedebut')->setParameter('datedebut', $date)                
//                ->setParameter('datefin', $date)
//                ->setParameter('datedebut', $date)
//                ->setParameter('cm', $idCM)
//                ->getQuery()
//                ->getResult();
//   
//    }
    
     public function supprimer($id){  
         
        $query = $this->_em->createQuery('delete from BatiBundle:Affecterchef a where a.id =:id')
                ->setParameter('id', $id);
        
        $result = $query->execute();
        return $result;
    }
}
