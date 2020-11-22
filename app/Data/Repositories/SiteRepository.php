<?php

namespace App\Data\Repositories;

use Kazmi\Data\Contracts\RepositoryContract;
use Kazmi\Data\Repositories\AbstractRepository;
use App\Data\Models\Site;
use App\Traits\AbstractMethods;

class SiteRepository extends AbstractRepository implements RepositoryContract
{
    use AbstractMethods;
    /**
     *
     * These will hold the instance of Site Class.
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
     * Example: Site-1
     *
     * @var string
     * @access protected
     *
     **/

    protected $_cacheKey = 'Site';
    protected $_cacheTotalKey = 'total-Site';

    public function __construct(Site $model)
    {
        $this->model = $model;
        $this->builder = $model;

    }
}
