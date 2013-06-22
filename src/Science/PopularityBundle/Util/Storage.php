<?php

namespace Science\PopularityBundle\Util;

/**
 *
 *
 * @author Chris Geisel <cgeisel@ea.com>
 */
abstract class Storage
{
    protected $dataStore;

    public function __construct($dataStore)
    {
        $this->dataStore = $dataStore;
    }

    abstract public function get($key);
    abstract public function set($key, $value);
}