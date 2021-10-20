<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjetController extends AbstractController
{
    

     /**
     * @Route("/liste", name="contact_list")
     */
    public function index(ContactRepository $repo) :response
    {

        $contacts = $repo->findAll();

        return $this->render('projet/liste.html.twig', [
            'contacts' => $contacts
        ]);
    }


    /**
     * Permet d'afficher une seule annonce
     *
     * @Route("/contact/{id}",name="contact_exact")
     * 
     * 
     */
    public function show (Contact $contact){
        // //je récupère l'annonce qui correspond au slug !
        // $ad = $repo ->findOneBySlug($slug);

        return $this->render('projet/show.html.twig',[
            'contact'=> $contact
        ]);
    }

    
    /**
     * 
     * @Route("/contact/liste", name="contact_create")
     */
    public function create(Request $request, EntityManagerInterface $manager){   
        $contact = new Contact();


        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){

            $manager->persist($contact);
            $manager->flush();

        
        }

        return $this-> render ('projet/liste.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
