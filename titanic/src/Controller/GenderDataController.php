<?php

namespace App\Controller;

use App\Entity\Passenger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PassengerRepository;

class GenderDataController extends AbstractController
{

    #[Route('/gender-data', name: 'fetch_gender_data', methods:['GET'])]
    public function index(PassengerRepository $passengerRepository): Response
    {

        $genderData = $passengerRepository->fetchGenderData();

        return $this->json($genderData);
    }
}