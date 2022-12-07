<?php

namespace App\Controller;

use App\Entity\Passenger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PassengerRepository;

class SurvivorsController extends AbstractController
{
    #[Route('/survivors', name: 'fetch_survivors_data', methods:['GET'])]
    public function passengers(PassengerRepository $passengerRepository): Response
    {

        $survivorsCount = $passengerRepository->fetchSurvivors();

        return $this->json($survivorsCount);
    }
}