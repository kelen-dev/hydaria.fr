<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string',
            'color_primary' => 'nullable|string|max:7', // Par exemple, #ffffff
            'color_secondary' => 'nullable|string|max:7',
        ]);

        $setting = Setting::first();
        if ($setting) {
            $setting->update([
                'color_primary' => $request->color_primary,
                'color_secondary' => $request->color_secondary,
            ]);
        } else {
            Setting::create([
                'color_primary' => $request->color_primary,
                'color_secondary' => $request->color_secondary,
            ]);
        }

        $setting = Setting::first() ?? new Setting();
        $setting->fill($request->all())->save();

        return redirect()->back()->with('success', 'Paramètres mis à jour avec succès.');
    }
}
