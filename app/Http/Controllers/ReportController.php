<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('welcome');
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

        $filepath = empty($validatedRequest['photo']) ? null : $validatedRequest['photo']->store('uploads');

        $report = new Report([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'message' => $validatedRequest['message'],
            'filename' => $filepath
        ]);

        $report->save();

        return back()->with('status','Report has been saved and our support will contact you in following 24h');
    }
}
