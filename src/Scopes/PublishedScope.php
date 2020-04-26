<?php

namespace Torralbodavid\DuckFunkCore\Scopes;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PublishedScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('published_at', '<=', Carbon::now());
    }
}
