<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapon;
use App\WeaponType;
use App\Caliber;
class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weapons = Weapon::where("deleted", 0)->OrderBy('created_at', 'desc')->paginate(10);
        return view('app.weapon.index')->with('weapons', $weapons);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weaponTypes = array_map(fn($type) => $type->value, WeaponType::cases());
        $calibers = array_map(fn($caliber) => $caliber->value, Caliber::cases());

        return view('app.weapon.create')->with([
            'weaponTypes' => $weaponTypes,
            'calibers' => $calibers
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // name, type, caliber, serial_no, img_path, is_serviceable, total_stock, issued_stock, available_stock

        $weaponTypes = array_map(fn($type) => $type->value, WeaponType::cases());
        $calibers = array_map(fn($caliber) => $caliber->value, Caliber::cases());

        $request->validate([
            'name' => 'required',
            'type' => ['required', 'string', 'in:' . implode(',', $weaponTypes)],
            'caliber' => ['required', 'string', 'in:' . implode(',', $calibers)],
            'serial_no' => 'required|unique:weapons|string',
            'img_path' => 'nullable|image',
            'total_stock' => 'required|numeric',
            'issued_stock' => 'required|numeric',
            'available_stock' => 'required|numeric',
        ]);

        //write validation for stock
        if ($request->total_stock != $request->issued_stock + $request->available_stock) {
            return redirect(route('weapon.create'))->with('error', 'Total stock must be greater than or equal to issued stock + available stock');
        }

        $weapon = new Weapon();
        $weapon->name = $request->name;
        $weapon->type = WeaponType::from($request->type);
        $weapon->caliber = Caliber::from($request->caliber);
        $weapon->serial_no = $request->serial_no;
        $weapon->total_stock = $request->total_stock;
        $weapon->issued_stock = $request->issued_stock;
        $weapon->available_stock = $request->available_stock;
        $weapon->is_serviceable = $request->is_serviceable ?? true;
        $weapon->save();

        return redirect(route('weapon.index'))->with('success', 'Weapon created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $weapon = Weapon::find($id);
        if (!$weapon) {
            return redirect(route('weapon.index'))->with('error', 'Weapon not found');
        }
        
        $weaponTypes = array_map(fn($type) => $type->value, WeaponType::cases());
        $calibers = array_map(fn($caliber) => $caliber->value, Caliber::cases());





        return view('app.weapon.edit')->with([
            'weapon' => $weapon,
            'weaponTypes' => $weaponTypes,
            'calibers' => $calibers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $weapon = Weapon::find($id);
        if (!$weapon) {
            return redirect(route('weapon.index'))->with('error', 'Weapon not found');
        }

        $weaponTypes = array_map(fn($type) => $type->value, WeaponType::cases());
        $calibers = array_map(fn($caliber) => $caliber->value, Caliber::cases());

        $request->validate([
            'name' => 'required',
            'type' => ['required', 'string', 'in:' . implode(',', $weaponTypes)],
            'caliber' => ['required', 'string', 'in:' . implode(',', $calibers)],
            'serial_no' => 'required|unique:weapons,serial_no,' . $weapon->id,
            'img_path' => 'nullable|image',
            'total_stock' => 'required|numeric',
        ]);

        //validate stock using $weapon
        if ($request->total_stock != $weapon->issued_stock + $weapon->available_stock) {
            return redirect(route('weapon.edit', $weapon->id))->with('error', 'Total stock must be greater than or equal to issued stock + available stock');
        }



        $weapon->name = $request->name;
        $weapon->type = WeaponType::from($request->type);
        $weapon->caliber = Caliber::from($request->caliber);
        $weapon->serial_no = $request->serial_no;
        $weapon->total_stock = $request->total_stock;
        $weapon->is_serviceable = $request->is_serviceable ?? true;
        $weapon->save();

        return redirect(route('weapon.index'))->with('success', 'Weapon updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $weapon = Weapon::find($id);
        if (!$weapon) {
            return redirect(route('weapon.index'))->with('error', 'Weapon not found');
        }

        $weapon->deleted = 1;
        $weapon->save();

        return redirect(route('weapon.index'))->with('success', 'Weapon deleted successfully');
    }
}
