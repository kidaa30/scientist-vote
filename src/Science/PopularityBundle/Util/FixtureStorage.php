<?php

namespace Science\PopularityBundle\Util;

use Science\PopularityBundle\Util\Storage;
use Science\PopularityBundle\Util\Exception\StorageException;

/**
 *
 *
 * @author Chris Geisel <cgeisel@ea.com>
 */
class FixtureStorage extends Storage
{

    /*
     * Fragile as hell, we'd use a real storage solution IRL
     */
    public function get($key)
    {
        if (file_exists($this->dataStore . '/' . $key)) {
            return file_get_contents($this->dataStore . '/' . $key);
        }
        throw new StorageException('Key ' . $key . ' does not exist in Storage');
    }

    public function set($key, $value)
    {
            $put = file_put_contents($this->dataStore . '/' . $key, $value, LOCK_EX);
            if (!$put) {
                throw new StorageException('Could not write to Storage for ' . $key);
            }
    }

    public function keys()
    {
        return scandir($this->dataStore);
    }
}