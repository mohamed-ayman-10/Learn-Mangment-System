<div class="col-12">
    @if ($show_table)
        @include('livewire.show_table')
    @else
        <button wire:click="showTable" class="btn btn-primary mb-3">{{ __('guardians.guardians_list') }}</button>
        <form>
            <div class="row">
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.name_ar') }}</label>
                    <input type="text" wire:model="name_ar" class="form-control required">
                    @error('name_ar')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.name_en') }}</label>
                    <input type="text" wire:model="name_en" class="form-control required">
                    @error('name_en')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.email') }}</label>
                    <input type="email" wire:model="email" class="form-control required">
                    @error('email')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.phone') }}</label>
                    <input type="number" wire:model="phone" class="form-control required">
                    @error('phone')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="control-group col-md-6 form-group mb-0">
                    <label class="form-label">{{ __('guardians.address_ar') }}</label>
                    <input type="text" wire:model="address_ar" class="form-control required">
                    @error('address_ar')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="control-group col-md-6 form-group mb-0">
                    <label class="form-label">{{ __('guardians.address_en') }}</label>
                    <input type="text" wire:model="address_en" class="form-control required">
                    @error('address_en')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.job_ar') }}</label>
                    <input type="text" wire:model="job_ar" class="form-control required">
                    @error('job_ar')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.job_en') }}</label>
                    <input type="text" wire:model="job_en" class="form-control required">
                    @error('job_en')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="control-group col-md-6 form-group">
                    <label class="form-label">{{ __('guardians.password') }}</label>
                    <input type="password" wire:model="password" class="form-control required">
                    @error('password')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="control-group col-md-3 form-group">
                    <label class="form-label">{{ __('guardians.passport') }}</label>
                    <input type="number" wire:model="passport" class="form-control required">
                    @error('passport')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="control-group col-md-3 form-group">
                    <label class="form-label">{{ __('guardians.national') }}</label>
                    <input type="number" wire:model="national" class="form-control required">
                    @error('national')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row m-0">
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <p class="mg-b-10">{{ __('guardians.nationalitie') }}</p>
                    <select class="form-control select2" wire:model="nationalitie">
                        <option label="">
                        </option>
                        @foreach ($nationalities as $nationalitie)
                            <option value="{{ $nationalitie->id }}">
                                {{ $nationalitie->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('nationalitie')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <p class="mg-b-10">{{ __('guardians.blood') }}</p>
                    <select class="form-control" wire:model="blood">
                        <option label="">
                        </option>
                        @foreach ($bloods as $blood)
                            <option value="{{ $blood->id }}">
                                {{ $blood->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('blood')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-lg-4 mg-t-20 mg-lg-t-0">
                    <p class="mg-b-10">{{ __('guardians.religion') }}</p>
                    <select class="form-control" wire:model="religion">
                        <option label="">
                        </option>
                        @foreach ($religions as $religion)
                            <option value="{{ $religion->id }}">
                                {{ $religion->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('religion')
                        <p class="alert alert-danger py-1" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-4 w-25">
                <input type="file" wire:model="images" accept="image/*" multiple class="form-control">
            </div>
            @if ($updateMode)
                <input class="btn btn-primary my-4" wire:click.prevent="update" type="submit"
                    value="{{ __('tables.update') }}">
            @else
                <input class="btn btn-primary my-4" wire:click.prevent="saveContact" type="submit"
                    value="{{ __('tables.save') }}">
            @endif

        </form>
    @endif
</div>
