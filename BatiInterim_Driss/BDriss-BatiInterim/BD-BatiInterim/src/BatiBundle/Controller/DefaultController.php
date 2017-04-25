<?php

namespace BatiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \BatiBundle\Entity\Gestionnaire;
use BatiBundle\Entity\Artisan;
use BatiBundle\Form\GestionnaireType;
use BatiBundle\Form\EntrepreneurType;
use BatiBundle\Entity\GestionnaireRepository;
use BatiBundle\Form\ArtisanType;
use BatiBundle\Form\ChantierType;
use Symfony\Component\HttpFoundation\Response;
use DateTime;

class DefaultController extends Controller {

    public function indexAction() {
        return $this->render('BatiBundle:Default:index.html.twig');
    }

    public function deconnexionAction() {

        $session = $this->getRequest()->getSession();

        if ($session->has("Gestionnaire") || $session->has("Artisan") || $session->has("Entrepreneur")) {

            $session->clear();
        }

        return $this->redirectToRoute('Connexion');
    }

    public function changeMdpAAction() {
        $session = $this->getRequest()->getSession();
        $id = $session->get('Artisan');
        $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Artisan");
        $artisan = $em->find($id);

        $formg = $this->createFormBuilder()
                ->add('mdp', 'password', array('label' => 'Mot de passe'))
                ->add('mdp2', 'password', array('label' => 'Confirmation Mot de passe '))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm();

        $request = $this->container->get('request');
        $formg->handleRequest($request);

        if ($formg->isValid()) {

            if ($formg['mdp']->getData() == $formg['mdp2']->getData()) {

                $pwd = md5($formg['mdp']->getData());

                $artisan->setMdp($pwd);
                $ema = $this->getDoctrine()->getManager();
                $ema->persist($artisan);
                $ema->flush();


                return $this->render('BatiBundle:Artisan:EspaceA.html.twig', array('message' => 'Mot de passe modifié avec succès.', 'Artisan' => $artisan));
            }
        } else {
            return $this->render('BatiBundle:Default:ChangeMdp.html.twig', array('formg' => $formg->createView()));
        }
    }

    public function changeMdpEAction() {

        $session = $this->getRequest()->getSession();
        $id = $session->get('Entrepreneur');
        $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Entrepreneur");
        $entrepreneur = $em->find($id);

        $formg = $this->createFormBuilder()
                ->add('mdp', 'password', array('label' => 'Mot de passe'))
                ->add('mdp2', 'password', array('label' => 'Confirmation Mot de passe '))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm();

        $request = $this->container->get('request');
        $formg->handleRequest($request);

        if ($formg->isValid()) {

            if ($formg['mdp']->getData() == $formg['mdp2']->getData()) {

                $pwd = md5($formg['mdp']->getData());

                $entrepreneur->setMdp($pwd);
                $ema = $this->getDoctrine()->getManager();
                $ema->persist($entrepreneur);
                $ema->flush();


                return $this->render('BatiBundle:Entrepreneur:EspaceE.html.twig', array('message' => 'Mot de passe modifié avec succès.', 'Entrepreneur' => $entrepreneur));
            }
        } else {
            return $this->render('BatiBundle:Default:ChangeMdp.html.twig', array('formg' => $formg->createView()));
        }
    }

    public function changeMdpGAction() {

        $session = $this->getRequest()->getSession();
        $id = $session->get('Gestionnaire');
        $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Gestionnaire");
        $gestionnaire = $em->find($id);

        $formg = $this->createFormBuilder()
                ->add('mdp', 'password', array('label' => 'Mot de passe'))
                ->add('mdp2', 'password', array('label' => 'Confirmation Mot de passe '))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm();

        $request = $this->container->get('request');
        $formg->handleRequest($request);

        if ($formg->isValid()) {

            if ($formg['mdp']->getData() == $formg['mdp2']->getData()) {

                $pwd = md5($formg['mdp']->getData());

                $gestionnaire->setMdpg($pwd);
                $ema = $this->getDoctrine()->getManager();
                $ema->persist($gestionnaire);
                $ema->flush();


                return $this->render('BatiBundle:Gestionnaire:EspaceG.html.twig', array('message' => 'Mot de passe modifié avec succès.', 'Gestionnaire' => $gestionnaire));
            }
        } else {
            return $this->render('BatiBundle:Default:ChangeMdp.html.twig', array('formg' => $formg->createView()));
        }
    }

    public function connexionAction() {

        $session = $this->getRequest()->getSession();




        $form = $this->createFormBuilder()
                ->add('loging', 'text', array('label' => 'Login'))
                ->add('mdpg', 'password', array('label' => 'Mot de passe'))
                ->add('profil', 'choice', array('choices' => array(
                        "g" => "Gestionnaire",
                        "a" => "Artisan",
                        "e" => "Entrepreneur"), 'attr' => array('class' => "btn btn-inverse")
                ))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm()
        ;

        $request = $this->container->get('request');
        $form->handleRequest($request);


        if ($form->isValid()) {

            $profil = $form['profil']->getData();
            $login = $form['loging']->getData();
            $mdpnc = $form['mdpg']->getData();
            $mdp = md5($mdpnc);
            // $mdp = $mdpnc ;

            switch ($profil) {
                case "g" :

                    $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Gestionnaire");
                    $gestionnaire = $em->connexionGestionnaire($login, $mdp);




                    if ($gestionnaire) {
                        $session->clear();

                        $session->set("Gestionnaire", $gestionnaire);

                        // return $this->redirectToRoute('ChangeMdpG');

                        if ($mdp == md5('')) {

                            return $this->redirectToRoute('ChangeMdpG');
                        }
                    } else {
                        return $this->render('BatiBundle:Default:index.html.twig', array('form' => $form->createView(), 'message' => 'Authentification échouée - veuillez réessayer.'));
                    }


                    break;



                case "a" :


                    $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Artisan");
                    $artisan = $em->connexionArtisan($login, $mdp);

                    if ($artisan) {
                        $session->clear();
                        $session->set("Artisan", $artisan);

                        if ($mdp == md5('azerty')) {

                            return $this->redirectToRoute('ChangeMdpA');
                        }
                    } else {
                        return $this->render('BatiBundle:Default:index.html.twig', array('form' => $form->createView(), 'message' => 'Authentification échouée - veuillez réessayer.'));
                    }


                    break;
                case "e" :


                    $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Entrepreneur");
                    $entrepreneur = $em->connexionEntrepreneur($login, $mdp);

                    if ($entrepreneur) {
                        $session->clear();
                        $session->set("Entrepreneur", $entrepreneur);
                        if ($mdp == md5('azerty')) {

                            return $this->redirectToRoute('ChangeMdpE');
                        }
                    } else {
                        return $this->render('BatiBundle:Default:index.html.twig', array('form' => $form->createView(), 'message' => 'Authentification échouée - veuillez réessayer.'));
                    }

                    break;
                default :
                    break;
            }
        }

        if ($session->has("Gestionnaire")) {

            return $this->render('BatiBundle:Gestionnaire:EspaceG.html.twig');
        } else if ($session->has("Artisan")) {

            return $this->render('BatiBundle:Artisan:EspaceA.html.twig');
        } else if ($session->has("Entrepreneur")) {

            return $this->render('BatiBundle:Entrepreneur:EspaceE.html.twig');
        }

        return $this->render('BatiBundle:Default:index.html.twig', array('form' => $form->createView()));
    }

    public function gestionAAction() {

        $em = $this->getDoctrine()->getManager()->getRepository("BatiBundle:Artisan");




        return $this->render('BatiBundle:Gestionnaire:GestionA.html.twig');
    }

    public function creerArtisanAction() {

        $artisan = new Artisan();
        $form = $this->createForm(new ArtisanType(), $artisan);
        $form->add('idcorpsmetier', 'entity', array('class' => 'BatiBundle:Corpsmetier', 'property' => "libelle"))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")));

        $request = $this->container->get('request');
        $form->handleRequest($request);


        if ($form->isValid()) {

            $login = strtolower(substr(substr($form->get('prenom')->getData(), 0, 1) . $form->get('nom')->getData(), 0, 10));

            $artisan->setLogin($login);
            $artisan->setMdp(md5('azerty'));
            $artisan->setIdcorpsmetier($form->get('idcorpsmetier')->getData());

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($artisan);
            $ema->flush();

            return $this->render('BatiBundle:Gestionnaire:EspaceG.html.twig', array('artisan' => $artisan));
        }

        return $this->render('BatiBundle:Gestionnaire:CreerArtisan.html.twig', array('formCreerA' => $form->createView()));
    }

    public function afficherArtisansAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $lesArtisans = $em->findAll();

        $form = $this->createFormBuilder()
                ->add('corpsmetier', 'entity', array('class' => 'BatiBundle:Corpsmetier', 'property' => "libelle", 'label' => 'Corps de métier'))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm()
        ;

        $request = $this->container->get('request');
        $form->handleRequest($request);

        if ($form->isValid()) {
//            $emCm = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Corpsmetier');
//            $corpsmetier = $emCm->find()
            $lesArtisans = $em->findBy(array('idcorpsmetier' => $form['corpsmetier']->getData()->getId()));
        }





        return $this->render('BatiBundle:Gestionnaire:AfficherArtisans.html.twig', array('form' => $form->createView(), 'lesArtisans' => $lesArtisans));
    }

    public function supprimerArtisanAction() {

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        $id = $req->query->get('idArtisan');

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
        $emConges = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');

//        $emConges->supprimerConges($id);
//        
//        $emAffect->supprimerAffectArtisan($id); 

        $r = $emArtisan->supprimerArtisan($id);

        //return $this->render('BatiBundle:Gestionnaire:ResultatSuppression.html.twig', array('id' => $id));

        return $this->redirectToRoute('AfficherArtisans');
    }

    public function modifierArtisanAction() {

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        $id = $req->query->get('idArtisan');

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');

        $artisan = $emArtisan->find($id);
        $form = $this->createForm(new ArtisanType(), $artisan);
        $form->add('idcorpsmetier', 'entity', array('class' => 'BatiBundle:Corpsmetier', 'property' => "libelle"))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")));

        $request = $this->container->get('request');
        $form->handleRequest($request);

        if ($form->isValid()) {

            $artisan->setIdcorpsmetier($form->get('idcorpsmetier')->getData());

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($artisan);
            $ema->flush();

            return $this->render('BatiBundle:Gestionnaire:EspaceG.html.twig', array('artisan' => $artisan));
        }

        return $this->render('BatiBundle:Gestionnaire:CreerArtisan.html.twig', array('formCreerA' => $form->createView()));
    }

    public function afficherEntrepreneursAction() {
        $em = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Entrepreneur');
        $lesEntrepreneurs = $em->findAll();

        return $this->render('BatiBundle:Gestionnaire:AfficherEntrepreneurs.html.twig', array('lesEntrepreneurs' => $lesEntrepreneurs));
    }

    public function modifierEntrepreneurAction() {

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        $id = $req->query->get('idEntrepreneur');

        $emEntrepreneur = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Entrepreneur');

        $entrepreneur = $emEntrepreneur->find($id);

        $form = $this->createForm(new EntrepreneurType(), $entrepreneur);
        $form->add('idsecteur', 'entity', array('class' => 'BatiBundle:Secteur', 'property' => "libelle", 'label' => 'Secteur'))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")));

        $request = $this->container->get('request');
        $form->handleRequest($request);


        if ($form->isValid()) {

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($entrepreneur);
            $ema->flush();

            return $this->render('BatiBundle:Gestionnaire:EspaceG.html.twig', array('entrepreneur' => $entrepreneur));
        }

        return $this->render('BatiBundle:Gestionnaire:CreerEntrepreneur.html.twig', array('formCreerE' => $form->createView()));
    }

    public function supprimerEntrepreneurAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        $id = $req->query->get('idEntrepreneur');

        $emEntrepreneur = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Entrepreneur');

        $r = $emEntrepreneur->supprimerEntrepreneur($id);

        //return $this->render('BatiBundle:Gestionnaire:ResultatSuppression.html.twig', array('id' => $id));
        return $this->redirectToRoute('AfficherEntrepreneurs');
    }

    public function creerEntrepreneurAction() {


        $entrepreneur = new \BatiBundle\Entity\Entrepreneur();
        $form = $this->createForm(new EntrepreneurType(), $entrepreneur);
        $form->add('idsecteur', 'entity', array('class' => 'BatiBundle:Secteur', 'property' => "libelle", 'label' => 'Secteur'))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")));

        $request = $this->container->get('request');
        $form->handleRequest($request);


        if ($form->isValid()) {

            $login = strtolower(substr(substr($form->get('prenomchef')->getData(), 0, 1) . $form->get('nomchef')->getData(), 0, 10));

            $entrepreneur->setLogin($login);
            $entrepreneur->setMdp(md5('azerty'));

            $ema = $this->getDoctrine()->getManager();
            $ema->persist($entrepreneur);
            $ema->flush();

            return $this->render('BatiBundle:Gestionnaire:EspaceG.html.twig', array('entrepreneur' => $entrepreneur));
        }

        return $this->render('BatiBundle:Gestionnaire:CreerEntrepreneur.html.twig', array('formCreerE' => $form->createView()));
    }

    public function gererArtisansAction() {

        $form = $this->createFormBuilder()
                ->add('corpsmetier', 'entity', array('class' => 'BatiBundle:Corpsmetier', 'property' => "libelle", 'label' => 'Corps métier'))
                ->add('date', 'date', array('required' => false, 'format' => 'yyyy-MM-dd'))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm()
        ;

        $request = $this->container->get('request');
        $form->handleRequest($request);


        if ($form->isValid()) {

            if ($form['date']->getData() == null) {
                $em = $this->getDoctrine()->getRepository('BatiBundle:Artisan');
                $lesArtisans = $em->findBy(array('idcorpsmetier' => $form->get('corpsmetier')->getData()));

                return $this->render('BatiBundle:Entrepreneur:GererArtisans.html.twig', array('formCorpsmetier' => $form->createView(), 'lesArtisans' => $lesArtisans));
            } else {

                $date = $form['date']->getData();

                $dateSQL = $date->format('Y-m-d');

                $idCm = $form['corpsmetier']->getData()->getId();

                //return new Response($dateSQL);

                $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
                $conges = $emConge->getCongeDate(new DateTime($dateSQL), $idCm);

                $emMission = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Mission');
                $missions = $emMission->getMissionDate(new DateTime($dateSQL), $idCm);

                $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
                $artisans = $emArtisan->findBy(array('idcorpsmetier' => $idCm));

                $i = 0;
                $artisansAbs = array();
                if ($conges) {


                    foreach ($conges as $unConge) {
                        $artisansAbs[$i] = $unConge->getIdartisan();
                        $i++;
                    }
                }

                if ($missions) {

                    foreach ($missions as $uneMission) {

                        if ($uneMission->getIdcorpsmetier()->getId() == $idCm) {
                            $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
                            $affect = $emAffect->findBy(array('idmission' => $uneMission));

                            foreach ($affect as $uneAffect) {
                                $artisansAbs[$i] = $uneAffect->getIdartisan();
                                $i++;
                            }
                        }
                    }
                }

                //$artisansDispo = array();
                $artisanArray = $artisans;
                $i = 0;
                foreach ($artisans as $unArtisan) {
                    foreach ($artisansAbs as $unArtisanAbs) {
                        if ($unArtisan->getId() == $unArtisanAbs->getId()) {
                            unset($artisanArray[$i]);
                        } else {
                            
                        }
                    }
                    $i++;
                }

                if ($conges || $missions) {
                    return $this->render('BatiBundle:Entrepreneur:ConsulterArtisansDate.html.twig', array('formCorpsmetier' => $form->createView(), 'artisansAbs' => $artisansAbs,
                                'artisansDispo' => $artisanArray));
                } else {

                    return $this->render('BatiBundle:Entrepreneur:ConsulterArtisansDate.html.twig', array('formCorpsmetier' => $form->createView(), 'artisansDispo' => $artisanArray));
                }
            }
        }
        return $this->render('BatiBundle:Entrepreneur:GererArtisans.html.twig', array('formCorpsmetier' => $form->createView()));
    }

    public function consulterCongesAction() {

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $session = $this->getRequest()->getSession();

        $id = $req->query->get('idArtisan');

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $artisan = $emArtisan->find($id);

        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
        $congesAcc = $emConge->findBy(array('idartisan' => $artisan, 'etatconge' => 'A'));
        $congesAtt = $emConge->findBy(array('idartisan' => $artisan, 'etatconge' => 'E'));

        if ($session->has('Gestionnaire')) {
            return $this->render('BatiBundle:Entrepreneur:ConsulterConges.html.twig', array('congesAcc' => $congesAcc, 'congesAtt' => $congesAtt, 'gestionnaire' => 'ok'));
        }


        return $this->render('BatiBundle:Entrepreneur:ConsulterConges.html.twig', array('congesAcc' => $congesAcc, 'congesAtt' => $congesAtt));
    }

    public function gererChantiersAction() {

        return $this->render('BatiBundle:Entrepreneur:GererChantiers.html.twig');
    }

    public function consulterAffectationsAction() {

        $form = $this->createFormBuilder()
                ->add('chantier', 'entity', array('class' => 'BatiBundle:Chantier', 'property' => "libelle", 'label' => 'Chantier', 'required' => false, 'allow_extra_fields' => true))
                ->add('artisan', 'entity', array('class' => 'BatiBundle:Artisan', 'property' => "nom", 'label' => 'Artisan', 'required' => false, 'allow_extra_fields' => true))
                ->add('date', 'date', array('format' => 'yyyy-MM-dd', 'required' => false, 'allow_extra_fields' => true))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->getForm()
        ;
        $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');

        $request = $this->container->get('request');
        $form->handleRequest($request);
//        $forma->handleRequest($request);
//        $formd->handleRequest($request);

        if ($form->isValid()) {
            if ($form['chantier']->getData()) {
                $chantier = $form['chantier']->getData();
                $affectChantier = $emAffect->getAffectChantier($chantier->getId());


                if ($affectChantier) {
                    return $this->render('BatiBundle:Entrepreneur:ConsulterAffectations.html.twig', array(
                                'form' => $form->createView(), 'affect' => $affectChantier));
                }
            } else if ($form['artisan']->getData()) {
                $artisan = $form['artisan']->getData();
                $affectArtisan = $emAffect->findBy(array('idartisan' => $artisan));
                if ($affectArtisan) {
                    return $this->render('BatiBundle:Entrepreneur:ConsulterAffectations.html.twig', array(
                                'form' => $form->createView(), 'affect' => $affectArtisan));
                }
            } else if ($form['date']->getData()) {

                $date = $form['date']->getData();
                $affectDate = $emAffect->getAffectDate($date);
                if ($affectDate) {
                    return $this->render('BatiBundle:Entrepreneur:ConsulterAffectations.html.twig', array(
                                'form' => $form->createView(), 'affect' => $affectDate));
                }
            }
        }

        return $this->render('BatiBundle:Entrepreneur:ConsulterAffectations.html.twig', array('form' => $form->createView()));
    }

    public function creerMissionAction() {

        $session = $this->getRequest()->getSession();

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $id = $req->query->get('idChantier');

        if ($id != null) {

            $session->set("idChantier", $id);
        }


        $id = $session->get('idChantier');

        $message = false;



        $emChantier = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Chantier');
        $chantier = $emChantier->find($id);


        $idEtp = $session->get("Entrepreneur");

        $emEtp = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Entrepreneur');
        $etp = $emEtp->find($idEtp->getId());

        $mission = new \BatiBundle\Entity\Mission();
        $form = $this->createForm(new \BatiBundle\Form\MissionType(), $mission);



        $request = $this->container->get('request');
        $form->handleRequest($request);

        if ($form->isValid()) {

            $dateDebutc = $chantier->getDatedebut();
            $dateFinc = $chantier->getDateFin();
            $intervallec = date_diff($dateDebutc, $dateFinc);

            $dateDebutm = $form->getData()->getDatedebut();
            $dateFinm = $form->getData()->getDatefin();
            $intervallem = date_diff($dateDebutm, $dateFinm);

            //return new Response($intervallec . '-' . $intervallem) ; 
            if ($dateFinc >= $dateDebutm && $dateDebutm >= $dateDebutc && $dateFinc >= $dateFinm && $dateFinc >= $dateDebutc && $dateFinm > $dateDebutm) {

                $mission->setIdchantier($chantier);

                $em = $this->getDoctrine()->getManager();
                $em->persist($chantier);
                $em->persist($mission);
                $em->flush();
            } else {
                $message = 'La date renseignée ne coïncide pas avec la date du chantier ! ';
            }
        }

        $emChef = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Chefchantier');
        $chefs = $emChef->findBy(array('identrepreneur' => $idEtp));

        $emChefAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecterchef');
        $chefsAffect = $emChefAffect->findBy(array('idchantier' => $chantier));

        $emMission = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Mission');
        $missions = $emMission->findBy(array('idchantier' => $chantier));

        $i = 0;
        foreach ($chefs as $unChef) {
            foreach ($chefsAffect as $unChefAffect)
                if ($unChefAffect->getIdchef()->getId() == $unChef->getId()) {
                    unset($chefs[$i]);
                }
            $i++;
        }


        if ($missions && $chefs && $chefsAffect) {
            return $this->render('BatiBundle:Entrepreneur:CreerMission.html.twig', array('form' => $form->createView(), 'missions' => $missions,
                        'chefs' => $chefs, 'chefsAffect' => $chefsAffect, 'idChantier' => $id, 'message' => $message));
        }

        if ($missions && $chefs) {
            return $this->render('BatiBundle:Entrepreneur:CreerMission.html.twig', array('form' => $form->createView(), 'missions' => $missions,
                        'chefs' => $chefs, 'idChantier' => $id, 'message' => $message));
        }

        if ($chefs && $chefsAffect) {
            return $this->render('BatiBundle:Entrepreneur:CreerMission.html.twig', array('form' => $form->createView(),
                        'chefs' => $chefs, 'chefsAffect' => $chefsAffect, 'idChantier' => $id, 'message' => $message));
        }
        if ($chefs) {
            return $this->render('BatiBundle:Entrepreneur:CreerMission.html.twig', array('form' => $form->createView(),
                        'chefs' => $chefs, 'idChantier' => $id, 'message' => $message));
        }


        if ($missions) {
            return $this->render('BatiBundle:Entrepreneur:CreerMission.html.twig', array('form' => $form->createView(), 'missions' => $missions,
                        'idChantier' => $id, 'message' => $message));
        }

        return $this->render('BatiBundle:Entrepreneur:CreerMission.html.twig', array('form' => $form->createView(), 'idChantier' => $id, 'message' => $message));
    }

    public function creerChantierAction() {

        $session = $this->getRequest()->getSession();
        $message = false;

        $idEtp = $session->get("Entrepreneur");

        $chantier = new \BatiBundle\Entity\Chantier();
        $form = $this->createForm(new ChantierType(), $chantier);

        $request = $this->container->get('request');
        $form->handleRequest($request);


        if ($form->isValid()) {

            $aujd = new DateTime('now');

            $dateDebutc = $form->getData()->getDatedebut();
            $dateFinc = $form->getData()->getDatefin();

            if ($dateFinc >= $dateDebutc && $dateFinc > $dateDebutc && $dateDebutc > $aujd) {

                $emEtp = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Entrepreneur');
                $etp = $emEtp->find($idEtp->getId());
                $chantier->setIdentrepreneur($etp);

                $em = $this->getDoctrine()->getManager();
                $em->persist($chantier);

                $em->flush();
            } else {
                $message = 'Date invalide';
            }
        }

        $emChantier = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Chantier');
        $chantiers = $emChantier->findBy(array('identrepreneur' => $idEtp));

        if ($chantiers) {

            return $this->render('BatiBundle:Entrepreneur:CreerChantier.html.twig', array('form' => $form->createView(),
                        'chantiers' => $chantiers, 'message' => $message));
        }


        return $this->render('BatiBundle:Entrepreneur:CreerChantier.html.twig', array('form' => $form->createView(), 'message' => $message));
    }

    public function affecterArtisansAction() {

        $session = $this->getRequest()->getSession();

        $idEtp = $session->get("Entrepreneur");

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        if ($req->request->has('idMission')) {
            $idMission = $req->request->get('idMission');
            $session->set('idMission', $idMission);
        } else  if ($req->query->has('idMission')) {
            $idMission = $req->query->get('idMission');
            $session->set('idMission', $idMission);
        } else if ( $session->has('idMission')) {
            $idMission = $session->get('idMission') ;
        } else {
            return $this->redirectToRoute('CreerChantier');
        }

        $emMission = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Mission');
        $mission = $emMission->find($idMission);

        $cm = $mission->getIdcorpsmetier();
        $dateDebut = $mission->getdatedebut();
        $dateFin = $mission->getdatefin();

        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
        $conges = $emConge->getCongeDateCM($dateDebut->format('Y-m-d'), $dateFin->format('Y-m-d'), $cm->getId());

        //$emMission = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Mission');
        $missions = $emMission->getMissionDateCM($dateDebut->format('Y-m-d'), $dateFin->format('Y-m-d'), $cm->getId());

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $artisans = $emArtisan->findBy(array('idcorpsmetier' => $cm));

        if ($artisans) {

            if ($req->request->has('idArtisan') && $req->request->has('idMission')) {

                $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
                $artisan = $emArtisan->find($req->request->get('idArtisan'));

                //$artisan = $emArtisan->find($_POST['idArtisan']);

                $emMission = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Mission');
                $mission = $emMission->find($req->request->get('idMission'));

                $affecter = new \BatiBundle\Entity\Affecter();

                $affecter->setIdartisan($artisan);
                $affecter->setIdmission($mission);
                $affecter->setEtataffectation('E');

                $em = $this->getDoctrine()->getManager();

                $em->persist($affecter);

                $em->flush();
            }

            $i = 0;
            $string = "CONGES - ";
            $artisansAbs = array();
            if ($conges) {

                foreach ($conges as $unConge) {
                    $artisansAbs[$i] = $unConge->getIdartisan();
                    $string = $string . $unConge->getIdartisan()->getId();
                    $i++;
                }
            }

            if ($missions) {

                $string = $string . " - MISSIONS - ";
                foreach ($missions as $uneMission) {

                    $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
                    $affect = $emAffect->findBy(array('idmission' => $uneMission));

                    foreach ($affect as $uneAffect) {
                        $artisansAbs[$i] = $uneAffect->getIdartisan();
                        $string = $string . $uneAffect->getIdartisan()->getId();
                        $i++;
                    }
                }

                //return  new Response($string ) ; 
                foreach ($missions as $uneMission) {
                    if ($uneMission->getIdcorpsmetier()->getId() == $cm->getId()) {
                        $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
                        $affect = $emAffect->findBy(array('idmission' => $uneMission));

                        foreach ($affect as $uneAffect) {
                            $artisansAbs[$i] = $uneAffect->getIdartisan();

                            $i++;
                        }
                    }
                }
            }



            // $artisansDispo = array();
            $artisanArray = $artisans;
            $i = 0;
            foreach ($artisans as $unArtisan) {
                foreach ($artisansAbs as $unArtisanAbs) {
                    if ($unArtisan->getId() == $unArtisanAbs->getId()) {
                        unset($artisanArray[$i]);
                    } else {
                        
                    }
                }
                $i++;
            }







            $emAffecter = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
            $artisansAffect = $emAffecter->findBy(array('idmission' => $mission));

            if ($artisansAffect) {
                return $this->render('BatiBundle:Entrepreneur:AffecterArtisans.html.twig', array('artisans' => $artisanArray,
                            'idMission' => $idMission, 'artisansAffect' => $artisansAffect));
            }



            return $this->render('BatiBundle:Entrepreneur:AffecterArtisans.html.twig', array('artisans' => $artisanArray,
                        'idMission' => $idMission));
        }

        return $this->render('BatiBundle:Entrepreneur:AffecterArtisans.html.twig');
    }

    public function affectationAction() {
         $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $session = $session = $this->getRequest()->getSession();       
        
        if ($req->request->has('idArtisan')) {
            $session->set('artisan', $req->request->get('idArtisan'));
        }
        
        $session = $this->getRequest()->getSession();
        
        if ($session->has('idMission') && $session->has('artisan')) {

            $artisan = $session->get('artisan');
            $idMission = $session->get('idMission');
        

            $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
            $artisan = $emArtisan->find($artisan);

            //$artisan = $emArtisan->find($_POST['idArtisan']);

            $emMission = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Mission');
            $mission = $emMission->find($idMission);

            $affecter = new \BatiBundle\Entity\Affecter();

            $affecter->setIdartisan($artisan);
            $affecter->setIdmission($mission);
            $affecter->setEtataffectation('E');

            $em = $this->getDoctrine()->getManager();

            $em->persist($affecter);

            $em->flush();
        }


        //return $this->render('BatiBundle:Entrepreneur:AffecterArtisans.html.twig');

        return $this->redirectToRoute('AffecterArtisans');
    }

    public function consulterMesCongesAction() {


        $session = $this->getRequest()->getSession();
        $id = $session->get('Artisan');

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $artisan = $emArtisan->find($id);
        $conge = new \BatiBundle\Entity\Conge();

        $form = $this->createForm(new \BatiBundle\Form\CongeType(), $conge);

        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
        $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');

        $request = $this->container->get('request');
        $form->handleRequest($request);

        $congesAcc = $emConge->findBy(array('idartisan' => $artisan, 'etatconge' => 'A'));
        $congesAtt = $emConge->findBy(array('idartisan' => $artisan, 'etatconge' => 'E'));

        if ($form->isValid()) {

            $debut = $conge->getDatedebut();
            $fin = $conge->getDatefin();
            $interval = date_diff($debut, $fin);
            $int = $interval->format('%R%a');
            $exist = $emConge->isCongeExists($debut->format('Y-m-d'), $fin->format('Y-m-d'), $id);
            //$isMission = $emAffect->isMission($debut->format('Y-m-d'), $fin->format('Y-m-d'), $id);

            if ($int > 0 && $exist == false) {
                // if ($exist == false) {

                $conge->setEtatconge('E');
                $conge->setIdartisan($artisan);
                $em = $this->getDoctrine()->getManager();

                $em->persist($conge);

                $em->flush();
            } else {
                return $this->render('BatiBundle:Artisan:ConsulterMesConges.html.twig', array('form' => $form->createView(), 'congesAcc' => $congesAcc, 'congesAtt' => $congesAtt, 'message' => 'Date non valide'));
            }
        }

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        if ($req->request->has('idConge')) {
            $idConge = $req->request->get('idConge');

//            $conge->setEtatconge('R');
//                $conge->setIdartisan($artisan);
//                $em = $this->getDoctrine()->getManager();
//
//                $em->persist($conge);
//
//                $em->flush();
            $this->supprimerConge($idConge);
        }

        $congesAcc = $emConge->findBy(array('idartisan' => $artisan, 'etatconge' => 'A'));
        $congesAtt = $emConge->findBy(array('idartisan' => $artisan, 'etatconge' => 'E'));

        return $this->render('BatiBundle:Artisan:ConsulterMesConges.html.twig', array('form' => $form->createView(), 'congesAcc' => $congesAcc, 'congesAtt' => $congesAtt));
    }

    public function supprimerConge($idConge) {
        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
        $emConge->supprimerConge($idConge);


        return $this->redirectToRoute('ConsulterMesConges');
    }

    public function isCongeExists($dateDebut, $dateFin) {
        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
    }

    public function consulterMissionsAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

        $session = $this->getRequest()->getSession();
        $id = $session->get('Artisan');

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $artisan = $emArtisan->find($id);

        $emAffect = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');

        if ($req->request->has('idAffectAcc')) {
            $idAffect = $req->request->get('idAffectAcc');
            $affect = $emAffect->find($idAffect);
            $affect->setEtataffectation('A');

            $em = $this->getDoctrine()->getManager();
            $em->persist($affect);
            $em->flush();
        } else if ($req->request->has('idAffectRef')) {

            $idAffect = $req->request->get('idAffectRef');
            $affect = $emAffect->find($idAffect);
            $affect->setEtataffectation('R');

            $em = $this->getDoctrine()->getManager();
            $em->persist($affect);
            $em->flush();
        }

        $emAffecter = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
        $affectAcc = $emAffecter->findBy(array('idartisan' => $artisan, 'etataffectation' => 'A'));
        $affectAtt = $emAffecter->findBy(array('idartisan' => $artisan, 'etataffectation' => 'E'));



        if ($affectAtt && $affectAcc) {
            return $this->render('BatiBundle:Artisan:ConsulterMissions.html.twig', array('affectAcc' => $affectAcc, 'affectAtt' => $affectAtt));
        } else if ($affectAcc) {
            return $this->render('BatiBundle:Artisan:ConsulterMissions.html.twig', array('affectAcc' => $affectAcc));
        } else if ($affectAtt) {
            return $this->render('BatiBundle:Artisan:ConsulterMissions.html.twig', array('affectAtt' => $affectAtt));
        }

        return $this->render('BatiBundle:Artisan:ConsulterMissions.html.twig');
    }

    public function modifierCoordonneesAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $session = $this->getRequest()->getSession();
        $id = $session->get('Artisan');

        $emArtisan = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Artisan');
        $artisan = $emArtisan->find($id);

        $form = $this->createForm(new ArtisanType(), $artisan);
        $form
                ->add('login', 'text')
                ->add('mdp', 'password')
                ->add('idcorpsmetier', 'entity', array('class' => 'BatiBundle:Corpsmetier', 'property' => "libelle"))
                ->add('Valider', 'submit', array('attr' => array('class' => "btn btn-inverse")))
                ->add('Annuler', 'reset', array('attr' => array('class' => "btn btn-inverse")));

        $request = $this->container->get('request');
        $form->handleRequest($request);

        if ($form->isValid()) {

            $password = $form->getData()->getMdp() . '';
            // Génération d'un salt
            $crypte = md5($password);

            // return new Response($crypte) ; 


            $artisan->setMdp($crypte);

            $em = $this->getDoctrine()->getManager();
            $em->persist($artisan);
            $em->flush();

            return $this->render('BatiBundle:Artisan:ModifierCoordonnees.html.twig', array('form' => $form->createView(), 'message' => 'Modification effectuée avec succès.'));
        }



        return $this->render('BatiBundle:Artisan:ModifierCoordonnees.html.twig', array('form' => $form->createView()));
    }

    public function accepterCongeAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $idConge = $req->request->get('idConge');

        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
        $conge = $emConge->find($idConge);

        if ($conge) {
            $conge->setEtatconge('A');
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush();
        }

        $congesAcc = $emConge->findBy(array('idartisan' => $conge->getIdArtisan(), 'etatconge' => 'A'));
        $congesAtt = $emConge->findBy(array('idartisan' => $conge->getIdArtisan(), 'etatconge' => 'E'));


        return $this->render('BatiBundle:Entrepreneur:ConsulterConges.html.twig', array('congesAcc' => $congesAcc, 'congesAtt' => $congesAtt, 'gestionnaire' => 'ok'));
    }

    public function refuserCongeAction() {

        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $idConge = $req->request->get('idConge');
        $idArtisan = $req->request->get('idArtisan');

        $emConge = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Conge');
        $conge = $emConge->find($idConge);

        if ($conge) {
            $conge->setEtatconge('R');
            $em = $this->getDoctrine()->getManager();
            $em->persist($conge);
            $em->flush();
        }


        $congesAcc = $emConge->findBy(array('idartisan' => $idArtisan, 'etatconge' => 'A'));
        $congesAtt = $emConge->findBy(array('idartisan' => $idArtisan, 'etatconge' => 'E'));


        return $this->render('BatiBundle:Entrepreneur:ConsulterConges.html.twig', array('congesAcc' => $congesAcc, 'congesAtt' => $congesAtt, 'gestionnaire' => 'ok'));
    }

    public function creerChefChantierAction() {
        $session = $this->getRequest()->getSession();
        $id = $session->get('Entrepreneur');

        $emEtp = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Entrepreneur');
        $entrepreneur = $emEtp->find($id);


        $chef = new \BatiBundle\Entity\Chefchantier();

        $form = $this->createForm(new \BatiBundle\Form\ChefchantierType(), $chef);

        $request = $this->container->get('request');
        $form->handleRequest($request);

        if ($form->isValid()) {

            $chef->setIdentrepreneur($entrepreneur);
            $em = $this->getDoctrine()->getManager();
            $em->persist($chef);
            $em->flush();
        }
        $emChef = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Chefchantier');
        $chefs = $emChef->findBy(array('identrepreneur' => $entrepreneur->getId()));

        if ($chefs) {
            return $this->render('BatiBundle:Entrepreneur:CreerChef.html.twig', array('form' => $form->createView(), 'chefs' => $chefs));
        }



        return $this->render('BatiBundle:Entrepreneur:CreerChef.html.twig', array('form' => $form->createView()));
    }

    public function affecterChefAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $idChantier = $req->request->get('idChantier');
        $idChef = $req->request->get('idChef');

        $chantier = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Chantier')->find($idChantier);
        $chef = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Chefchantier')->find($idChef);

        $affectChef = new \BatiBundle\Entity\Affecterchef();
        $affectChef->setIdchef($chef);
        $affectChef->setIdchantier($chantier);

        $em = $this->getDoctrine()->getManager();
        $em->persist($affectChef);
        $em->flush();


        return $this->redirectToRoute('CreerMission');
    }

    public function radierChefAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $idAffect = $req->request->get('idAffect');

        $em = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecterchef');
        $em->supprimer($idAffect);


        return $this->redirectToRoute('CreerMission');
    }

    public function ecarterArtisanAction() {
        $req = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
        $session = $session = $this->getRequest()->getSession();       
        
        if ($req->request->has('idArtisan')) {
            $session->set('artisan', $req->request->get('idArtisan'));
        }
        
        $session = $this->getRequest()->getSession();
        if ($session->has('idMission') && $session->has('artisan')) {

            $artisan = $session->get('artisan');
            $idMission = $session->get('idMission');
        }
        
        
        if ($req->request->has('idAffect')) {
            
            $em = $this->getDoctrine()->getManager()->getRepository('BatiBundle:Affecter');
            $em->supprimerAffect($req->request->get('idAffect'));
        }


        return $this->redirectToRoute('AffecterArtisans');



       // return $this->redirectToRoute('');
    }

    public function consulterChantiersAction() {

        return $this->render('BatiBundle:Entrepreneur:ConsulterChantiers.html.twig');
    }

    public function gestionEAction() {

        return $this->render('BatiBundle:Gestionnaire:GestionE.html.twig');
    }

    public function connexionAAction() {
        return $this->render('BatiBundle:Artisan:ConnexionA.html.twig');
    }

    public function connexionEAction() {
        return $this->render('BatiBundle:Entrepreneur:ConnexionE.html.twig');
    }

}
