<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use AppBundle\Form\CarType;
use AppBundle\Form\SearchType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CarController extends Controller
{
    /**
     * @Route("/car/add", name="add_car_form")
     * @Method("GET")
     * @return Response
     */
    public function addCar()
    {
        $form = $this->createForm(CarType::class);
        return $this->render("car/add.html.twig",
            [
                "carForm" => $form->createView()
            ]
        );
    }

    /**
     * @Route("/car/add", name="add_car_process")
     * @Method("POST")
     *
     * @param Request $request
     * @return Response
     */
    public function addCarProcess(Request $request)
    {
        $car = new Car();
        $form = $this->createForm(
            CarType::class,
            $car
        );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($car);
            $entityManager->flush();

            $this->addFlash("info", "Car was added successfully");

            return $this->redirectToRoute("all_cars");

        } else {
            return $this->render("car/add.html.twig",
                [
                    "carForm" => $form->createView()
                ]
            );
        }
    }

    /**
     * @Route("/", name="all_cars")
     *
     * @param Request $request
     * @return Response
     */
    public function viewAll(Request $request)
    {

        $cars = $this->getDoctrine()
            ->getManager()
            ->getRepository(Car::class)
            ->findAll();


        return $this->render("car/all.html.twig",
            [
                "cars" => $cars
            ]
        );
    }

    /**
     * @Route("/car/search", name="search_car_form")
     * @Method("GET")
     * @return Response
     */
    public function searchForm()
    {
        $form = $this->createForm(SearchType::class);

        return $this->render("car/search.html.twig",
            [
                "searchForm" => $form->createView()
            ]
        );
    }


    /**
     * @Route("/car/search", name="search_car_process")
     * @Method("POST")
     *
     * @param Request $request
     * @return Response
     */
    public function searchProcess(Request $request)
    {
        $form = $this->createForm(SearchType::class);

        $importer = $request->request->get("app_bundle_search_type")['importer'];
        $description = $request->request->get("app_bundle_search_type")["description"];

        if ($importer == "" || $description == "") {
            $this->addFlash("alert", "Fill all the fields");
            return $this->render("car/search.html.twig",
                [
                    "searchForm" => $form->createView()
                ]
            );

        } else if (strlen($description) < 3 || strlen($description) > 20) {
            $this->addFlash("alert", "Description must be between 3 and 20 symbols");
            return $this->render("car/search.html.twig",
                [
                    "searchForm" => $form->createView()
                ]
            );
        } else {

            $em = $this->getDoctrine()->getManager();


            $cars = $em->createQueryBuilder('c')
                ->select('c')
                ->from("AppBundle:Car", "c")
                ->andWhere('c.importer = :importer')
                ->andWhere('c.description LIKE :description')
                ->setParameter('importer', $importer)
                ->setParameter('description', "%$description%")
                ->orderBy('c.year', 'ASC')
                ->getQuery()
                ->getResult();

            if (!$cars) {
                $this->addFlash("info", "Sorry, no results matched your search");
            }

            return $this->render("car/all.html.twig",
                [
                    "cars" => $cars,
                    "importer" => $importer,
                    "description" => $description
                ]
            );
        }
    }
}
