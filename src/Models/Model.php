<?php

namespace Bitporch\Forum\Models;

class Model extends Model
{
    public static function boot()
    {
        parent::boot();

        static::deleting(function ($resource) {
            if (config('forum.softDeletes')) {
                $resource->delete();
            } else {
                $resource->forceDelete();
            }
        });
    }
}
