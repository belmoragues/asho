<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PassengerRepository;

class SurvivorsByClassController extends AbstractController
{
    #[Route('/survivors-class', name: 'fetch_survivor_class', methods:['GET'])]
    public function passengers(PassengerRepository $passengerRepository): Response
    {

        $survivorsCount = $passengerRepository->fetchSurvivorsByClass();

        return $this->json($survivorsCount);
    }
}