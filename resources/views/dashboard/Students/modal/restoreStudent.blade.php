<!-- Restore -->
<div class="modal" id="restore{{ $student->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('students.restore')</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('graduates.restore') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <p>@lang('students.con_restore') {{ $student->name }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">@lang('students.restore')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Restore -->
<!-- Delete -->
<div class="modal" id="delete{{ $student->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('students.delete')</h6><button aria-label="Close" class="close"
                    data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('graduates.delete') }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $student->id }}">
                    <p>@lang('tables.delete_q') {{ $student->name }}</p>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-danger" type="submit">@lang('tables.delete')</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Delete -->
