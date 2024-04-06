<?php

namespace App\Observers;

use App\Models\Electricity;
use App\Models\Notification;

class ElectricityObserver
{
    /**
     * Handle the Electricity "created" event.
     */
    public function created(Electricity $electricity): void
    {
        //
    }

    public function creating(Electricity $electricity): void
    {
        if (!$electricity->is_paid) {
            $notification = Notification::create([
                'user_id' => $electricity->user_id,
                'message' => "Electricity bill for " . $electricity->payment_date . " is unpaid.",
                'type' => 'electricity_unpaid',
                'notifiable_id' => $electricity->id,
                'notifiable_type' => 'App\Models\Electricity',
            ]);

            $electricity->notifications()->save($notification);
        }
    }
    /**
     * Handle the Electricity "updated" event.
     */
    public function updated(Electricity $electricity): void
    {
        //
    }

    public function updating(Electricity $electricity)
    {
        if ($electricity->is_paid) {
            $electricity->notifications()->where('user_id', $electricity->user_id)
                ->where('type', 'electricity_unpaid')
                ->delete();
        }
    }

    /**
     * Handle the Electricity "deleted" event.
     */
    public function deleted(Electricity $electricity): void
    {
        //
    }

    /**
     * Handle the Electricity "restored" event.
     */
    public function restored(Electricity $electricity): void
    {
        //
    }

    /**
     * Handle the Electricity "force deleted" event.
     */
    public function forceDeleted(Electricity $electricity): void
    {
        //
    }
}
