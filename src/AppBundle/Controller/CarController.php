<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Context\Context;

use JMS\Serializer\SerializerContext;
use JMS\Serializer\SerializationContext;

class CarController extends FOSRestController
{

    /**
     * @Rest\Get("/cars")
     * @Route("/cars", name="car_brands_list")
     *
     * @api {get} /cars Get all the brands of cars
     */
    public function getCarBrandsAction(Request $request)
    {
        if ('GET' === $request->getMethod()) {

            $dm = $this->get('doctrine_mongodb')->getManager();

            if (true === $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

                $carsArray = $dm->getRepository('AppBundle:Car')->findAll();

                if (!empty($carsArray)) {
                    $cars = array();
                    foreach ($carsArray as $carArray) {
                        if(!in_array($carArray->getBrand(), $cars))
                            $cars[] = $carArray->getBrand();
                    }

                    sort($cars);

                    $data['error'] = "No error";
                    $data['cars'] = $cars;
                } else {
                    $data['error'] = "No cars found";
                }
            } else {
                $data['error'] = "Not authenticated";
            }

        } else {
            $data['error'] = "Request not GET";
        }

        $context = new Context();
        $context->addGroup('mini');

        $view = $this->view($data);
        $view->setContext($context);

        return $this->handleView($view);
    }

    /**
     * @Rest\Get("/cars/{brandName}")
     * @Route("/cars/{brandName}", name="brand_cars_list")
     *
     * @api {get} /cars Get all the brands of cars
     */
    public function getBrandCarsAction(Request $request, $brandName)
    {
        if ('GET' === $request->getMethod()) {

            $dm = $this->get('doctrine_mongodb')->getManager();

            if (true === $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {

                $carsArray = $dm->getRepository('AppBundle:Car')->findBy(array(
                    'brand' => $brandName
                ));

                if (!empty($carsArray)) {
                    $cars = array();
                    foreach ($carsArray as $carArray) {
                        $cars[] = array(
                            'brand' => $carArray->getBrand(),
                            'model' => $carArray->getModel(),
                            'year' => $carArray->getYear(),
                            "horsePower" => $carArray->getHorsePower(),
                            "price" => $carArray->getPrice(),
                            "color" => $carArray->getColor(),
                            "nbDoors" => $carArray->getNbDoors(),
                            "km" => $carArray->getKm(),
                        );
                    }

                    $data['error'] = "No error";
                    $data['cars'] = $cars;
                } else {
                    $data['error'] = "No cars found";
                }
            } else {
                $data['error'] = "Not authenticated";
            }

        } else {
            $data['error'] = "Request not GET";
        }

        $context = new Context();
        $context->addGroup('mini');

        $view = $this->view($data);
        $view->setContext($context);

        return $this->handleView($view);
    }
}
