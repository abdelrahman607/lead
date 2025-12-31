<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    
  public function index(Request $request)
{
    $query = Lead::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
    }

    $leads = $query->latest()->paginate(10);

    return view('leads.index', compact('leads'));
}



    public function create()
{
    return view('leads.create');
}


    public function store(Request $request)
{
    $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => 'required|email|unique:leads,email',
        'phone'  => 'nullable|integer',
        'status' => 'required|in:new,contacted,closed'
    ]);

    Lead::create($request->all());

    return redirect()->route('leads.index')
        ->with('success', 'Lead added successfully');
}



    public function show(Lead $lead)
    {

    }

    public function edit(Lead $lead)
{
    return view('leads.edit', compact('lead'));
}



   public function update(Request $request, Lead $lead)
{
    $request->validate([
        'name'   => 'required|string|max:255',
        'email'  => 'required|email|unique:leads,email,' . $lead->id,
        'phone'  => 'nullable|integer',
        'status' => 'required|in:new,contacted,closed'
    ]);

    $lead->update($request->all());

    return redirect()->route('leads.index')
        ->with('success', 'Lead updated successfully');
}


public function destroy(Lead $lead)
{
    $lead->delete();

    return redirect()->route('leads.index')
        ->with('success', 'Lead deleted successfully');
}

public function archived()
{
    $leads = Lead::onlyTrashed()->paginate(10);
    return view('leads.archived', compact('leads'));
}
public function restore($id)
{
    Lead::withTrashed()->findOrFail($id)->restore();
    return back()->with('success','Lead restored');
}


}
