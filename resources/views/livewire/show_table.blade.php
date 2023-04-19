<div class="col-xl-12">
    <div class="card">
        <div class="card-header pb-0">
            <button wire:click="showForm" class="btn btn-primary">{{ __('guardians.create') }}</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-md-nowrap" id="example1">
                    <thead>
                        <tr>
                            <th class="wd-15p border-bottom-0">#</th>
                            <th class="wd-15p border-bottom-0">{{ __('tables.name') }}</th>
                            <th class="wd-20p border-bottom-0">{{ __('guardians.email') }}</th>
                            <th class="wd-15p border-bottom-0">{{ __('guardians.passport') }}</th>
                            <th class="wd-10p border-bottom-0">{{ __('guardians.national') }}</th>
                            <th class="wd-10p border-bottom-0">{{ __('guardians.phone') }}</th>
                            <th class="wd-25p border-bottom-0">{{ __('guardians.job') }}</th>
                            <th class="wd-25p border-bottom-0">{{ __('tables.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($guardians) }} --}}
                        @foreach ($guardians as $guardian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $guardian->name }}</td>
                                <td>{{ $guardian->email }}</td>
                                <td>{{ $guardian->passport_id }}</td>
                                <td>{{ $guardian->national_id }}</td>
                                <td>{{ $guardian->phone }}</td>
                                <td>{{ $guardian->job }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button wire:click="edit({{ $guardian->id }})"
                                            class="btn btn-success ml-2">{{ __('tables.update') }}</button>
                                        <button wire:click="delete({{ $guardian->id }})"
                                            class="btn btn-danger ml-2">{{ __('tables.delete') }}</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
