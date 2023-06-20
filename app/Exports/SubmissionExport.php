<?php

namespace App\Exports;

use App\Models\Submission;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SubmissionExport implements FromView
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('admin.submissions.export', [
            'submission' => Submission::select(['post_id', 'name', 'email', 'additional', 'created_at'])->where('id', $this->id)->with('post')->first(),

        ]);
    }
}
