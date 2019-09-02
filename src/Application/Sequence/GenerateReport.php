<?php

namespace App\Application\Sequence;


use App\Domain\Elevator\Model\Elevator;
use App\Domain\Floor\Model\Floor;
use App\Domain\Report\Model\Report;

class GenerateReport
{

    public function __construct(
    ) {
    }


    /**
     * @param Elevator $elevator
     * @return mixed
     */
    public function start(Elevator $elevator)
    {
        $sequence = $elevator->getSequence();
        $lastTime = $sequence->getBegin();
        $beginTime = gmdate('H:i', $sequence->getBegin());
        for ($i = $sequence->getBegin(); $i <= $sequence->getEnd(); $i+=$sequence->getInterval()) {
            /**
             * Debe volver a bajar al origen por lo tanto se le añade al contador
             */
            if($elevator->getCurrentFloor()->getId() !== $sequence->getOriginFloor()->getId()){
                foreach (range($elevator->getCurrentFloor()->getId(), $sequence->getOriginFloor()->getId()) as $floor) {
                    if($floor !== $elevator->getCurrentFloor()->getId()) {
                        $elevator->setCurrentFloor(new Floor($floor));
                        $elevator->addCounter(1);
                    }
                }
            }
            foreach (range($sequence->getOriginFloor()->getId(), $sequence->getDestinyFloor()->getId()) as $floor) {
                if($floor !== $sequence->getOriginFloor()->getId()){
                   $elevator->setCurrentFloor(new Floor($floor));
                    $elevator->addCounter(1);
                }
           }

            $lastTime = $i;
        }
        $endTime = gmdate('H:i', $lastTime );
        return array($elevator->getSequence()->getId(), $beginTime, $endTime, $elevator->getId(), $elevator->getCurrentFloor()->getId(), $elevator->getCounter());
    }
}
