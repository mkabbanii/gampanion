<?php

namespace App\Observers;

use App\Models\Withdraw;
use App\Notifications\DataChangeEmailNotification;
use Illuminate\Support\Facades\Notification;

class WithdrawActionObserver
{
    public function created(Withdraw $model)
    {
        $data  = ['action' => 'created', 'model_name' => 'Withdraw'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function updated(Withdraw $model)
    {
        $data  = ['action' => 'updated', 'model_name' => 'Withdraw'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }

    public function deleting(Withdraw $model)
    {
        $data  = ['action' => 'deleted', 'model_name' => 'Withdraw'];
        $users = \App\Models\User::whereHas('roles', function ($q) {
            return $q->where('title', 'Admin');
        })->get();
        Notification::send($users, new DataChangeEmailNotification($data));
    }
}
