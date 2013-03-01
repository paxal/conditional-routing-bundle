<?php

namespace Example\ConditionalRoutingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SecondController extends Controller
{
  /**
   * @Route("/example/conditional_routing/second/")
   * @Template()
   */
  public function indexAction()
  {
    return $this->render('ExampleConditionalRoutingBundle:Default:index.html.twig');
  }
}
