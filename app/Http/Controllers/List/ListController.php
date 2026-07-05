<?php

namespace App\Http\Controllers\List;

use App\Http\Controllers\Controller;
use App\Models\ListModel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListController extends Controller
{
    public function index(): array
    {
        return [
            'lists' => ListModel::orderBy('order')->get(),
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:32',
        ]);

        $validated['order'] = ListModel::max('order') + 1;

        ListModel::create($validated);

        return Inertia::location(url()->previous());
    }
}
