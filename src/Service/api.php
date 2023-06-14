<?php

// namespace App\Service;

// use Symfony\Component\HttpFoundation\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Routing\Annotation\Route;


// use App\Entity\Seismes;
// use App\Form\SeismesType;
// use Doctrine\ORM\EntityManagerInterface;

// /**
//  * @Service
//  */


// class Api
// {
//     /**
//      * @Route("/api/seismes", name="api_seismes")
//      */

//     public function getSeismes(Request $request, EntityManagerInterface $entityManager)
//     {
//         // Code pour récupérer les séismes depuis la base de données
//         $pays = $request->get('pays');
//         $intensite = $request->get('intensite');


//         $queryBuilder = $entityManager->createQueryBuilder();
//         $queryBuilder->select('s')
//             ->from(Seismes::class, 's')
//             ->setMaxResults(50);


//         if($pays != 'tous'){
//             $queryBuilder->where('s.pays = :pays')
//                 ->setParameter('pays',$pays);
//         }
//         if($intensite != 'tous'){
//             if($pays != 'tous'){
//                 $queryBuilder->andWhere('s.mag <= :intensite')
//                     ->setParameter('intensite',$intensite);
//             }else{
//                 $queryBuilder->where('s.mag <= :intensite')
//                     ->setParameter('intensite',$intensite);
//             }
//         }



//         $query = $queryBuilder->getQuery();
//         $seismes =$query->execute();
         
//         // Retourne les séismes sous forme de réponse JSON
//         return new Response(json_encode($seismes));
//     }
// }

?>