<?php

namespace App\Exports;

use App\Models\Subscription;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SubscribersExport implements FromView
{
    protected $subscribers;

    public function __construct($subscribers)
    {
        $this->subscribers = $subscribers;

    }

    public function view(): View
    {
        return view('admin.subscribers.export', [
            'subscribers' => Subscription::select(['email', 'name', 'surname'])->get(),

        ]);
    }
}
