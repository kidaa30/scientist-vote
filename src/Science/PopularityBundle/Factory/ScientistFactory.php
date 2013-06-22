<?php

namespace Science\PopularityBundle\Factory;

use Science\PopularityBundle\Model\Scientist;

/**
 *
 *
 * @author Chris Geisel <cgeisel@ea.com>
 */
class ScientistFactory 
{
    public function create($json)
    {
        $stdClass = json_decode($json);
        $scientist = new Scientist();
        $scientist->id = (int)$stdClass->id;
        $scientist->name = $stdClass->name;
        $scientist->votes = (int)$stdClass->votes;
        return $scientist;
    }

}