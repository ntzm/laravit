<?php

namespace App\Laravit;

interface SortableInterface
{
    public function scopeHot($query);

    public function scopeNew($query);

    public function scopeOld($query);

    public function scopeTop($query);
}
