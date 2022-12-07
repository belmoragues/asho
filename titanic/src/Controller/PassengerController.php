<?php

namespace App\Controller;

use App\Entity\Passenger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PassengerRepository;

class PassengerController extends AbstractController
{
    #[Route('/passengers', name: 'fetch_passenger_data', methods:['GET'])]
    public function passengers(PassengerRepository $passengerRepository): Response
    {

        $passengersCount = $passengerRepository->fetchPassengers();

        return $this->json($passengersCount);
    }
}