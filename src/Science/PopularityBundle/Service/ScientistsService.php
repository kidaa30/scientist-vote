<?php

namespace Science\PopularityBundle\Service;
use Science\PopularityBundle\Util\Exception\StorageException;
use Science\PopularityBundle\Service\Exception\ServiceException;
use Science\PopularityBundle\Util\Storage;
use Science\PopularityBundle\Model\Scientist;

/**
 *
 *
 * @author Chris Geisel <cgeisel@ea.com>
 */
class ScientistsService 
{
    protected $storageService;

    public function __construct(Storage $storage)
    {
        $this->storageService = $storage;
    }

    public function get($id)
    {
        try {
            return $this->storageService->get($id);
        }
        catch (StorageException $e) {
            throw new ServiceException($e->getMessage());
        }
    }

    public function getAll()
    {
        $scientists = [];
        try {
            foreach ($this->storageService->keys() as $key) {
                if (is_numeric($key)) {
                    $scientists[] = $this->storageService->get($key);
                }
            }
        }
        catch (StorageException $e) {
            throw new ServiceException($e->getMessage());
        }

        return json_encode($scientists);
    }

    public function set($id, Scientist $scientist)
    {
        try {
            return $this->storageService->set($id, json_encode($scientist));
        }
        catch (StorageException $e) {
            throw new ServiceException($e->getMessage());
        }
    }

}