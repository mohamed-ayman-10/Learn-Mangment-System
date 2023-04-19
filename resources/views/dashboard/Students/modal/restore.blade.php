<!-- Restore -->
<div class="modal" id="restore{{ $promotion->id }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">@lang('students.restore')</h6><button aria-label="Close" class="close" data-dismiss="modal"
                    type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('promotions.destroy', 'promotion') }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $promotion->id }}">
                    @if ($promotion->student()->count() > 0)
                        <p>@lang('students.con_restore') {{ $promotion->student->name }}</p>
                    @endif
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
