<?php

/**
 * Class PremiumMember
 *
 * Simple class representing a premium member on my dating site
 *
 * This class is a child class of the Member class (found in this same directory).
 * This class inherits all of the data, accessors, and modifiers of the Member class and adds more data on to it.
 *
 * @author Andrew Harrington
 * @version 1.0
 */
class PremiumMember extends Member
{
    const INDOOR = array('tv'=>'TV',
        'mov'=>'Movies',
        'cook'=>'Cooking',
        'board'=>'Board Games',
        'puzz'=>'Puzzles',
        'read'=>'Reading',
        'card'=>'Card Games',
        'video'=>'Video Games');

    const OUTDOOR = array('hike'=>'Hiking',
        'bike'=>'Biking',
        'swim'=>'Swimming',
        'collect'=>'Collecting',
        'walk'=>'Walking',
        'climb'=>'Climbing');

    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * @return mixed
     */
    public function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param mixed $inDoorInterests
     */
    public function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return mixed
     */
    public function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param mixed $outDoorInterests
     */
    public function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }

    public function interestsToString(){

        $indoor = $this->_inDoorInterests;
        $outdoor = $this->_outDoorInterests;

        if($indoor == null && $outdoor == null){
            return "No interests chosen";
        }
        else if($indoor == null){
            return stringifyOneArray($outdoor, self::OUTDOOR);
        }
        else if($outdoor == null){
            return stringifyOneArray($indoor, self::INDOOR);
        }
        else{
            return stringifyTwoArrays($indoor, $outdoor, self::INDOOR, self::OUTDOOR);
        }
    }

}