<?php

namespace App\Console;

use App\Entity\Passenger;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use League\Csv\Reader;
use Doctrine\Persistence\ManagerRegistry;

#[AsCommand(name:'load_titanic_data', description: 'Load titanic data')]
class LoadTitanicDataConsole extends Command
{
    public function __construct(private ManagerRegistry $registry) {
        parent::__construct();
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Downloading data titanic</info>');

        $entityManager = $this->registry->getManager();

        $csv = Reader::createFromPath(__DIR__ . '/Data/titanic.csv', 'r');
        $csv->setHeaderOffset(0);

        foreach($csv->getRecords() as $record){
            $survived = $record['Survived'];
            $classLevel = intval($record['Pclass']);
            $name = $record['Name'];
            $sex = $record['Sex'];
            $age = intval($record['Age']);
            $sibps = intval($record['SibSp']);
            $parch = intval($record['Parch']);
            $ticket = $record['Ticket'];
            $fare = floatval($record['Fare']);
            $cabin = $record['Cabin'];
            $embarked = $record['Embarked'];
            $passenger = new Passenger();
            $passenger->create($survived, $classLevel, $name, $sex, $age, $sibps, $parch, $ticket, $fare, $cabin, $embarked);
            $entityManager->persist($passenger);
            $entityManager->flush();
        }
        $output->writeln('<info>Process completed</info>');
        

        return Command::SUCCESS;

    }
}