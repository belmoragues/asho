<?php

namespace App\Controller;

use App\Entity\Passenger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PassengerRepository;

class SurvivorsGenderController extends AbstractController
{
    #[Route('/survivors-gender', name: 'fetch_survivors_gender_data', methods:['GET'])]
    public function passengers(PassengerRepository $passengerRepository): Response
    {

        $survivors = $passengerRepository->fetchSurvivorsByGender();

        return $this->json($survivors);
    }
}