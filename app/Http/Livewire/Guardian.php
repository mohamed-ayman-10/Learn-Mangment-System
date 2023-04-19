<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\Guardian as ModelsGuardian;
use App\Models\GuardianAttachment;
use App\Models\Nationalitie;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Guardian extends Component
{

    use WithFileUploads;

    public
        $Guardian_id,
        $show_table = true,
        $updateMode = false,
        $name_ar, $name_en, $email,
        $password, $phone,
        $job_ar, $job_en, $passport,
        $address_ar, $address_en, $blood, $nationalitie,
        $religion, $national, $images = [];

    public function v()
    {
        return [
            'name_ar' => 'required|string|min:3',
            'name_en' => 'required|string|min:3',
            'address_ar' => 'required|string|min:3',
            'address_en' => 'required|string|min:3',
            'email' => 'required|email|unique:guardians,email,' . $this->Guardian_id,
            'national' => 'unique:guardians,national_id,' . $this->Guardian_id,
            'phone' => 'required|min:11|max:11',
            'password' => 'required|min:6|max:15|string',
            'nationalitie' => 'required',
            'religion' => 'required',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->v());
    }

    public function saveContact()
    {
        $this->validate($this->v());

        try {

            ModelsGuardian::create([
                'name' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'address' => [
                    'ar' => $this->address_ar,
                    'en' => $this->address_en,
                ],
                'job' => [
                    'ar' => $this->job_ar,
                    'en' => $this->job_en,
                ],
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => bcrypt($this->password),
                'passport_id' => $this->passport,
                'national_id' => $this->national,
                'nationalitie_id' => $this->nationalitie,
                'blood_id' => $this->blood,
                'religion_id' => $this->religion,
            ]);

            if ($this->images) {
                foreach ($this->images as $image) {
                    $image->storeAs($this->national, $image->getClientOriginalName(), $disk = 'guardian_attachments');
                    GuardianAttachment::create([
                        'file_name' => $image->getClientOriginalName(),
                        'guardian_id' => ModelsGuardian::latest()->first()->id,
                    ]);
                }
            }

            $this->clearForm();
            toastr()->success(__('messages.success'));
        } catch (\Exception $e) {
            return redirect('guardian/create')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('livewire.guardian', [
            'nationalities' => Nationalitie::all(),
            'bloods' => Blood::all(),
            'religions' => Religion::all(),
            'guardians' => ModelsGuardian::all(),
        ]);
    }

    public function showForm()
    {
        $this->show_table = false;
    }

    public function showTable()
    {
        $this->show_table = true;
    }

    public function clearForm()
    {
        $this->Guardian_id = "";
        $this->name_ar = "";
        $this->name_en = "";
        $this->email = "";
        $this->passport = "";
        $this->phone = "";
        $this->password = "";
        $this->job_ar = "";
        $this->job_en = "";
        $this->national = "";
        $this->nationalitie = "";
        $this->blood = "";
        $this->religion = "";
        $this->address_ar = "";
        $this->address_en = "";
        $this->images = [];
    }

    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $guardian = ModelsGuardian::where('id', $id)->first();

        $this->Guardian_id = $id;
        $this->name_ar = $guardian->getTranslation('name', 'ar');
        $this->name_en = $guardian->getTranslation('name', 'en');
        $this->email = $guardian->email;
        $this->passport = $guardian->passport_id;
        $this->phone = $guardian->phone;
        $this->job_ar = $guardian->getTranslation('job', 'ar');
        $this->job_en = $guardian->getTranslation('job', 'en');
        $this->national = $guardian->national_id;
        $this->nationalitie = $guardian->nationalitie_id;
        $this->blood = $guardian->blood_id;
        $this->religion = $guardian->religion_id;
        $this->address_ar = $guardian->getTranslation('address', 'ar');
        $this->address_en = $guardian->getTranslation('address', 'en');
    }

    public function update()
    {
        if ($this->Guardian_id) {
            $guardian = ModelsGuardian::find($this->Guardian_id);

            if ($this->password) {
                $guardian->update([
                    'password' => bcrypt($this->password)
                ]);
            }

            $guardian->update([
                'name' => [
                    'ar' => $this->name_ar,
                    'en' => $this->name_en,
                ],
                'address' => [
                    'ar' => $this->address_ar,
                    'en' => $this->address_en,
                ],
                'job' => [
                    'ar' => $this->job_ar,
                    'en' => $this->job_en,
                ],
                'email' => $this->email,
                'phone' => $this->phone,
                'passport_id' => $this->passport,
                'national_id' => $this->national,
                'nationalitie_id' => $this->nationalitie,
                'blood_id' => $this->blood,
                'religion_id' => $this->religion,
            ]);

            toastr()->success(__('messages.update'));
            $this->show_table = true;
            $this->updateMode = false;
        }
    }

    public function delete($id)
    {
        ModelsGuardian::destroy($id);
        toastr()->success(__('messages.delete'));
    }
}
