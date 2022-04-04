<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Mail\ReportMail;
use App\Models\Report;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReportRequest $request
     * @return RedirectResponse
     */
    public function store(ReportRequest $request): RedirectResponse
    {
        $validatedRequest = $request->validated();
        $validatedRequest['filename'] = empty($validatedRequest['image']) ? null : $validatedRequest['image']->store('uploads');
        $report = Report::create($validatedRequest);
        Mail::send(new ReportMail($report));
        return back()->with('status', 'Report has been saved and our support will contact you in following 24h');
    }
}
