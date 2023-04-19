<?php

namespace App\Http\Controllers\Dashbord\Guardian;

use App\Http\Controllers\Controller;
use App\Models\Guardian;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GuardianProfileController extends Controller
{
    public function index()
    {
        $guardian = Guardian::findOrFail(Auth::user()->id);
        return view('dashboard.guardians.Dashboard.editprofile', compact('guardian'));
    }

    public function update(Request $request, string $id)
    {
        try {

            $guardian = Guardian::findOrFail($id);
            $guardian->name = [
                'ar' => $request->name_ar,
                'en' => $request->name_en,
            ];
            $guardian->email = $request->email;
            if ($request->password) {
                $guardian->password = bcrypt($request->password);
            }
            $guardian->save();

            toastr()->success(__('messages.update'));
            return redirect('guardian/dashboard/profile');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
