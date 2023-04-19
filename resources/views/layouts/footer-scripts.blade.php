<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Ionicons js -->
<script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js') }}"></script>
<!-- Moment js -->
<script src="{{ URL::asset('assets/plugins/moment/moment.js') }}"></script>

<!-- Rating js-->
<script src="{{ URL::asset('assets/plugins/rating/jquery.rating-stars.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/rating/jquery.barrating.js') }}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{ URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/perfect-scrollbar/p-scroll.js') }}"></script>
<!--Internal Sparkline js -->
<script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{ URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<!-- right-sidebar js -->
<script src="{{ URL::asset('assets/plugins/sidebar/sidebar-rtl.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/sidebar/sidebar-custom.js') }}"></script>
<!-- Eva-icons js -->
<script src="{{ URL::asset('assets/js/eva-icons.min.js') }}"></script>
@yield('js')
<!-- Sticky js -->
<script src="{{ URL::asset('assets/js/sticky.js') }}"></script>
<!-- custom js -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script><!-- Left-menu js-->
<script src="{{ URL::asset('assets/plugins/side-menu/sidemenu.js') }}"></script>
<script>
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }
</script>
{{-- Get Classroom --}}
<script>
    $(document).ready(function() {
        $('select[name="grade"]').on('change', function() {
            var grade = $(this).val();
            if (grade) {
                $.ajax({
                    url: "{{ url('students/get_classroom') }}/" + grade,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classroom"]').empty();
                        $('select[name="classroom"]').append(
                            '<option selected disabled >{{ __('students.classroom') }}...</option>'
                        );
                        $.each(data, function(key, value) {

                            $('select[name="classroom"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>')
                        })
                    }
                })
            } else {
                console.log('Ajax Load did not work');
            }
        })
    })
</script>
{{-- Get Section --}}
<script>
    $(document).ready(function() {
        $('select[name="classroom"]').on('change', function() {
            var classRoom = $(this).val();
            if (classRoom) {
                $.ajax({
                    url: "{{ url('students/get_section') }}/" + classRoom,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="section"]').empty();
                        $('select[name="section"]').append(
                            '<option selected disabled >{{ __('students.section') }}...</option>'
                        );
                        $.each(data, function(key, value) {
                            $('select[name="section"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>')
                        })
                    }
                })
            } else {
                console.log('Ajax Load did not work');
            }
        })
    })
</script>
</script>
{{-- Get New Classroom --}}
<script>
    $(document).ready(function() {
        $('select[name="new_grade"]').on('change', function() {
            var grade = $(this).val();
            if (grade) {
                $.ajax({
                    url: "{{ url('students/get_classroom') }}/" + grade,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="new_classroom"]').empty();
                        $('select[name="new_classroom"]').append(
                            '<option selected disabled >{{ __('students.classroom') }}...</option>'
                        );
                        $.each(data, function(key, value) {

                            $('select[name="new_classroom"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>')
                        })
                    }
                })
            } else {
                console.log('Ajax Load did not work');
            }
        })
    })
</script>
{{-- Get New Section --}}
<script>
    $(document).ready(function() {
        $('select[name="new_classroom"]').on('change', function() {
            var classRoom = $(this).val();
            if (classRoom) {
                $.ajax({
                    url: "{{ url('students/get_section') }}/" + classRoom,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="new_section"]').empty();
                        $('select[name="new_section"]').append(
                            '<option selected disabled >{{ __('students.section') }}...</option>'
                        );
                        $.each(data, function(key, value) {
                            $('select[name="new_section"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>')
                        })
                    }
                })
            } else {
                console.log('Ajax Load did not work');
            }
        })
    })
</script>
