<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BlogController extends Controller
{
    /** @var EntityManagerInterface */
    private $entityManager;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $authorRepository;

    /** @var \Doctrine\Common\Persistence\ObjectRepository */
    private $blogPostRepository;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->blogPostRepository = $entityManager->getRepository('AppBundle:BlogPost');
        $this->authorRepository = $entityManager->getRepository('AppBundle:Author');
    }

    /**
     * @Route("/", name="homepage")
     * @Route("/entries", name="entries")
     */
    public function entriesAction()
    {
        return $this->render('AppBundle:Blog:entries.html.twig', [
            'blogPosts' => $this->blogPostRepository->findAll()
        ]);
    }

    /**
     * @Route("/entry{slug}")
     */
    public function entryAction($slug)
    {
        return $this->render('AppBundle:Blog:entry.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/author/{name}")
     */
    public function authorAction($name)
    {
        return $this->render('AppBundle:Blog:author.html.twig', array(
            // ...
        ));
    }

}
