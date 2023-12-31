<?php

namespace App\Presenters;

use Illuminate\Database\Eloquent\Model;

class UserPresenter
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function name()
    {
        if ($this->model->id === auth()->id()) {
            return '';
        }
        return $this->model->name;
    }

    public function __get($property)
    {
        if (method_exists($this, $property)) {
            return $this->{$property}();
        }
        return null;
    }

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->model->email) . '?s=80&d=mm';
    }

}