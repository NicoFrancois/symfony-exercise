<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 29/10/18
 * Time: 15:54
 */
// src/Controller/BlogController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/{page}", requirements={"page"="\d+"}, name="blog_list")
     */
    public function list($page)
    {
        return $this->render('blog/index.html.twig', ['page' => $page]);
    }

    /**
     * @Route("/blog/{slug}", requirements={"slug"="[a-z0-9 \-]+"}, methods={"GET"}, name="blog_slug")
     */
    public function show($slug = "Article Sans Titre")
    {
        $slug = str_replace('-', ' ', ucwords($slug));
        $slug = ucwords($slug);
        return $this->render('slug/show.html.twig', [
            'slug' => $slug,
        ]);

    }
}
