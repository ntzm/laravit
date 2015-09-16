<?php

namespace App\Laravit;

use DB;

trait SortableTrait
{
    /**
     * Query hot resources.
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

    /**
     * Query new resources.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeNew($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Query old resources.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOld($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    /**
     * Query top resources.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTop($query)
    {
        return $query->orderBy('score', 'desc');
    }
}
