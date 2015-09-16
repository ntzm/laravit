<?php

namespace App;

use DB;

trait SortableTrait
{
    /**
     * Hot resources.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeHot($query)
    {
        // Source: http://thisinterestsme.com/creating-whats-hot-algorithm-php-mysql
        return $query->orderBy(DB::raw(
            'log10(abs(score) + 1 ) * sign(score) + (unix_timestamp(created_at) / 300000)'
        ), 'desc');
    }
}
