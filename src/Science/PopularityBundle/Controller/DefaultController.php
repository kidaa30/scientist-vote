<?php

namespace Science\PopularityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SciencePopularityBundle:Default:index.html.twig', array('name' => 'foo'));
    }

    public function getScientistsAction($id=null)
    {
        if ($id) {
            return $this->render('SciencePopularityBundle:Default:json.html.twig', array('id' => $id));
        }
        else {
            return $this->render('SciencePopularityBundle:Default:json.html.twig', array('id' => $id));
        }
    }
}
