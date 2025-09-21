<?php

namespace App\Observers;

use App\Models\City\City;

class CityObserver
{
    /**
     * Handle the City "created" event.
     */
    public function created(City $city): void
    {
    }

    /**
     * Handle the City "updated" event.
     */
    public function updated(City $city): void
    {
        //
    }

    /**
     * Handle the City "deleted" event.
     */
    public function deleted(City $city): void
    {
        //
    }

    /**
     * Handle the City "restored" event.
     */
    public function restored(City $city): void
    {
        //
    }

    /**
     * Handle the City "force deleted" event.
     */
    public function forceDeleted(City $city): void
    {
        //
    }
}
