<?php

namespace App\Http\Controllers;

use App\TrainingResource;
use Illuminate\View\View;

class TrainingController extends Controller
{
    public function index(): View
    {
        $dynamicTrainingResources = TrainingResource::active()->ordered()->get();

        return view('static.training.index', compact('dynamicTrainingResources'));
    }

    public function show(string $slug): View
    {
        $trainingResource = TrainingResource::active()->where('slug', $slug)->firstOrFail();

        return view('training.show', compact('trainingResource'));
    }
}
