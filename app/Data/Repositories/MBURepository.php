<?php

namespace App\Data\Repositories;

use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;
use App\Data\Models\MBU;
use App\Traits\AbstractMethods;

class MBURepository extends AbstractRepository implements RepositoryContract
{
    use AbstractMethods;
    /**
     *
     * These will hold the instance of MBU Class.
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
     * Example: MBU-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'MBU';
    protected $_cacheTotalKey = 'total-MBU';

    public function __construct(MBU $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
