<?php

namespace App\Traits;

/**
 * Add guid generate to mongodb model
 * @example $author->id = Author::getID();
 */
trait Guidable
{
    /**
     * Increment the counter and get the next sequence
     * 
     * @param $collection
     * @return mixed
     */
    private static function getID() {
        return app('guid')->generate();
    }

    /**
     * Boot the AutoIncrementID trait for the model.
     *
     * @return void
     */
    public static function bootGuidable() {
        static::creating(function ($model) {
            $model->incrementing = false;
            $model->{$model->getKeyName()} = self::getID();
        });
    }

    /**
     * Get the casts array.
     *
     * @return array
     */
    public function getCasts() {
        return $this->casts;
    }
}