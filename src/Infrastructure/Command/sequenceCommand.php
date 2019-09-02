<?php

namespace App\Infrastructure\Command;

use App\Application\Sequence\GenerateReport;
use App\Domain\Elevator\Model\Elevator;
use App\Domain\Floor\Model\Floor;
use App\Domain\Sequence\Model\Sequence;
use JMS\Serializer\Serializer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpFoundation\JsonResponse;

class sequenceCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'app:generate-sequence';

    protected function configure(){
        $this
            ->setName('app:generate-sequence')
            ->setDescription(
                'GenerateSequence.'
            )
            ->setHelp('Generate sequence')
            ->addArgument('first-sequence', InputArgument::REQUIRED, 'First sequence')
            ->addArgument('second-sequence', InputArgument::REQUIRED, 'Second sequence')
            ->addArgument('third-sequence', InputArgument::REQUIRED, 'Third sequence')
            ->addArgument('fourth-sequence', InputArgument::REQUIRED, 'Fourth sequence');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $generateReport = new GenerateReport();

        $elevator1 = new Elevator(1, $this->generateSequence($input->getArgument('first-sequence')));
        $report1 = $generateReport->start($elevator1);

        $elevator2 = new Elevator(2, $this->generateSequence($input->getArgument('second-sequence')));
        $report2 = $generateReport->start($elevator2);

        $elevator3 = new Elevator(3, $this->generateSequence($input->getArgument('third-sequence')));
        $report3 = $generateReport->start($elevator3);

        $elevator4 = new Elevator(4, $this->generateSequence($input->getArgument('fourth-sequence')));
        $report4 = $generateReport->start($elevator4);

        $io->text("Genereate report sequence 1");
        $io->table( ['Sequence ID', 'Begin hour', 'End Hour','Elevator ID', 'Current floor', 'Floors Travelled'],[$report1, $report2, $report3, $report4]);


        $output->writeln('------------------------------------------');
    }


    private function generateSequence($idSequence):? Sequence{
        switch ($idSequence){
            case 1:
                $sequence = new Sequence(1, new Floor(0), new Floor(2), 32400, 39600, 300 );
                break;
            case 2:
                $sequence = new Sequence(2, new Floor(0), new Floor(1), 32400, 36000, 600 );
                break;
            case 3:
                $sequence = new Sequence(3, new Floor(3), new Floor(0), 50400, 54000, 240 );
                break;
            default:
                $sequence = new Sequence(4, new Floor(3), new Floor(0), 54000, 57600, 420);
                break;
        }
        return $sequence;
    }
}