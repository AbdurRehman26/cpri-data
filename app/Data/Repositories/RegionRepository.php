<?php

namespace App\Data\Repositories;

use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;
use App\Data\Models\Region;
use App\Traits\AbstractMethods;

class RegionRepository extends AbstractRepository implements RepositoryContract
{
    use AbstractMethods;
    /**
     *
     * These will hold the instance of Region Class.
     *
     * @var object
     * @access public
     *
     **/
    public $model;

    /**
     *
     * This is the prefix of the cache key to which the
     * App\Data\Repositories data will be stored
     * App\Data\Repositories Auto incremented Id will be append to it
     *
     * Example: Region-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Region';
    protected $_cacheTotalKey = 'total-Region';

    public function __construct(Region $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
