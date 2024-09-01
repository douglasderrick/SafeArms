<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Rank;

class PersonnelController extends Controller
{
    public function index()
    {

        $personnels = Personnel::where("deleted", 0)->OrderBy('created_at', 'desc')->paginate(10);

        return view('app.personnel.index')->with('personnels', $personnels);
    }

    public function create()
    {
        //ranks
        $rankValues = array_map(fn($rank) => $rank->value, Rank::cases());

        return view('app.personnel.create')->with('ranks', $rankValues);
    }

    // service_no, rank, fullname, img_path, is_active
    public function store(Request $request)
    {
        $rankValues = array_map(fn($rank) => $rank->value, Rank::cases());

        $request->validate([
            'service_no' => 'required|unique:personnels|numeric',
            'rank' => ['required', 'string', 'in:' . implode(',', $rankValues)],
            'fullname' => 'required',
            'img_path' => 'nullable|image'
        ]);

        $personnel = new Personnel();
        $personnel->service_no = $request->service_no;
        $personnel->rank = Rank::from($request->rank);
        $personnel->fullname = $request->fullname;

        if ($request->hasFile('img_path')) {
            $personnel->img_path = $request->file('img_path')->store('personnel');
        }

        $personnel->save();

        return redirect(route('personnel.index'))->with('success', 'Personnel created successfully');
    }

    public function edit(Personnel $personnel)
    {
        $rankValues = array_map(fn($rank) => $rank->value, Rank::cases());

        return view('app.personnel.edit')->with('personnel', $personnel)->with('ranks', $rankValues);
    }

    public function update(Request $request, $personnelId)
    {

        $personnel = Personnel::find($personnelId);
        if (!$personnel) {
            return redirect(route('personnel.index'))->with('error', 'Personnel not found');
        }
        $rankValues = array_map(fn($rank) => $rank->value, Rank::cases());

        $request->validate([
            'service_no' => 'required|numeric|unique:personnels,service_no,' . $personnel->id,
            'rank' => ['required', 'string', 'in:' . implode(',', $rankValues)],
            'fullname' => 'required',
            'img_path' => 'nullable|image'
        ]);

        $personnel->service_no = $request->service_no;
        $personnel->rank = Rank::from($request->rank);
        $personnel->fullname = $request->fullname;

        if ($request->hasFile('img_path')) {
            $personnel->img_path = $request->file('img_path')->store('personnel');
        }

        $personnel->save();

        return redirect(route('personnel.index'))->with('success', 'Personnel updated successfully');
    }

    public function destroy(Personnel $personnel)
    {
        $personnel->deleted =   1;
        $personnel->save();

        return redirect(route('personnel.index'))->with('success', 'Personnel deleted successfully');
    }

    public function show(Personnel $personnel)
    {
        return view('app.personnel.show')->with('personnel', $personnel);
    }


}