<?php

namespace Science\PopularityBundle\Controller;

use Science\PopularityBundle\Util\FixtureStorage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Science\PopularityBundle\Service\Exception\ServiceException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SciencePopularityBundle:Default:index.html.twig');
    }

    public function getScientistsAction($id)
    {
        try {
            $scientistsService = $this->get('science_popularity.scientists');
            if ($id) {
                $json = $scientistsService->get($id);
            }
            else {
                $json = $scientistsService->getAll();
            }
        }
        catch (ServiceException $e) {
            return $this->jsonError($e);
        }
        return new Response($json, 200);

    }

    public function getAllScientistsAction()
    {
        try {
            $scientistsService = $this->get('science_popularity.scientists');
            $json = $scientistsService->getAll();
        }
        catch (ServiceException $e) {
            return $this->jsonError($e);
        }
        return new Response($json, 200);
    }

    public function putScientistsAction()
    {
        try {
            $json = $this->getRequest()->getContent();
            $factory = $this->get('science_popularity.scientist.factory');
            $scientist = $factory->create($json);

            $scientistsService = $this->get('science_popularity.scientists');
            $scientistsService->set($scientist);
        }
        catch (ServiceException $e) {
            return $this->jsonError($e);
        }
        return new JsonResponse('', 204);
    }

    private function jsonError(ServiceException $e)
    {
        return new JsonResponse(json_encode(['Service Error' => $e->getMessage()]), 500);
    }
}
