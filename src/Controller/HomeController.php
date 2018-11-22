<?php
/**
 * Created by PhpStorm.
 * User: wilder15
 * Date: 29/10/18
 * Time: 11:44
 */

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home",name="homepage")
     */

    public function index()
    {

        return $this->render('home/home.html.twig');
    }
}



