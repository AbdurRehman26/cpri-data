<?php

namespace App\Data\Repositories;

use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;
use App\Data\Models\SubRegion;
use App\Traits\AbstractMethods;

class SubRegionRepository extends AbstractRepository implements RepositoryContract
{
    use AbstractMethods;
    /**
     *
     * These will hold the instance of SubRegion Class.
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
     * Example: SubRegion-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'SubRegion';
    protected $_cacheTotalKey = 'total-SubRegion';

    public function __construct(SubRegion $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
