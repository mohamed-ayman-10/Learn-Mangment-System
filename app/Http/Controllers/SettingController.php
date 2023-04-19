<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $collection = Setting::all();
        $setting = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('dashboard.Setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        try {
            $info = $request->except('_token', '_method', 'logo');

            foreach ($info as $key => $value) {
                DB::table('settings')->where('key', $key)->update(['value' => $value]);
            }

            if ($request->hasfile('logo')) {
                $old_logo = Setting::where('key', 'logo')->pluck('value')[0];
                Storage::disk('upload_attachments')->delete('attachments/setting/' . $old_logo);
                $logo = $request->file('logo');
                $name = $logo->getClientOriginalName();
                $logo->storeAs('attachments/setting/', $logo->getClientOriginalName(), 'upload_attachments');
                Setting::where('key', 'logo')->update(['value' => $name]);
            }

            toastr()->success(__('messages.update'));
            return back();
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
