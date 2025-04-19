<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NavItem;

class NavItemController extends Controller
{
    public function index()
    {
        $navItems = NavItem::orderBy('order')->get();
        return view('admin.navitems.index', compact('navItems'));
    }

    public function create()
    {
        return view('admin.navitems.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'visible' => 'nullable|in:on',
        ]);

        NavItem::create([
            'label' => $request->label,
            'url' => $request->url,
            'order' => $request->order ?? 0,
            'visible' => $request->has('visible'),
        ]);

        return redirect()->route('admin.navitems.index')->with('success', 'Lien ajouté à la navbar.');
    }

    public function edit(NavItem $navitem)
    {
        return view('admin.navitems.edit', compact('navitem'));
    }

    public function update(Request $request, NavItem $navitem)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'visible' => 'nullable|in:on',
        ]);

        $navitem->update([
            'label' => $request->label,
            'url' => $request->url,
            'order' => $request->order ?? 0,
            'visible' => $request->has('visible'),
        ]);

        return redirect()->route('admin.navitems.index')->with('success', 'Lien mis à jour.');
    }

    public function destroy(NavItem $navitem)
    {
        $navitem->delete();

        return redirect()->route('admin.navitems.index')->with('success', 'Lien supprimé.');
    }

    public function order()
    {
        $navitems = NavItem::orderBy('order')->get();
        return view('admin.navitems.order', compact('navitems'));
    }


    public function updateOrder(Request $request)
    {
        $order = $request->input('order');

        foreach ($order as $index => $item) {
            $navItem = NavItem::find($item['id']);
            if ($navItem) {
                $navItem->order = $item['order'];
                $navItem->save();
            }
        }

        return response()->json(['status' => 'success']);
    }
}
