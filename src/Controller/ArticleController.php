<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 22/11/18
 * Time: 21:44
 */

namespace App\Controller;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class ArticleController extends AbstractController
{
    /**
     * @Route("/articlenew", name="articlenew")
     */
    public function add(Request $request)
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($data);
            $em->flush();
        }
        return $this->render('article/articlenew.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
