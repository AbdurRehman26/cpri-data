<?php
namespace App\Traits;

use Carbon\Carbon;

trait AbstractMethods
{

    public function getItemKey($id)
    {
        $data = parent::findById($id);

        return $data ? $data->name : '';
    }

    public function findOrCreate($criteria)
    {
        $data = $this->findByCriteria($criteria);
        dd($data);
        if(!$data){

            $data = $this->create($criteria);

        }

        return $data;
    }

    public function findByCriteria($criteria, $refresh = false, $notCriteria = false, $encode = true, $whereIn = false, $count = false)
    {

    $details = false;


    $model = $this->model->newInstance()
        ->where($criteria);
    if (!empty($notCriteria)) {
        $model  = $model->where(function ($query) use ($notCriteria) {
            foreach ($notCriteria as $key => $where) {
                $query->where($key, '!=', $where);
            }
        });
    }

    if ($whereIn) {
        $model = $model->whereIn(key($whereIn), $whereIn[key($whereIn)]);

    }

    if ($count) {
        return $model->count();
    }

    $model = $model->first(['id']);

    if ($model != null) {
        $model = $this->findById($model->id, $refresh, $details, $encode);
    }
    return $model;
    }

}
