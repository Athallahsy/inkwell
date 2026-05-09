<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class ConfigController extends Controller
{
    public function index()
    {
        return view('back.config.index', [
            'config' => Config::paginate(6),
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'value' => 'nullable|min:3',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $config = Config::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($config->value) {
                $oldLogoPath = public_path('uploads/' . $config->value);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            // Simpan logo baru
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);

            $config->value = $filename;
        } else {
            $config->value = $request->value;
        }

        $config->save();

        return back()->with('success', 'Settings updated successfully');
    }
}
