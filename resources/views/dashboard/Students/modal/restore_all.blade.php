    <!-- Restore All -->
    <div class="modal" id="restoreall">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">@lang('students.restoreall')</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('promotions.destroy', 'promotion') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" name="id" value="all">
                        <p>@lang('students.con_restoreall')</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-danger" type="submit">@lang('students.restoreall')</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Restore All -->
