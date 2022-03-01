<script>
    @if(session()->has('success'))
        $(function() {
            Swal({
                type  : 'success',
                title : 'Success',
                text  : "{{ session()->get('success') }}",
                timer : 2000
            });
        });
    @endif

    @if($errors->any())
        $(function() {
            @foreach($errors->getMessages() as $key => $error)
                @foreach($error as $err)
                    _input = $('#{{ $key }}');
                    _input.addClass('is-invalid');
                    _input.after('<div class="invalid-feedback"><strong> {{ $err }} </strong></div>')
                @endforeach
            @endforeach
        });

        $(function() {
            Swal({
                type  : 'error',
                title : 'Woops!',
                text  : "{{ $errors->first() }}",
                timer : 2000
            });
        });
    @endif
</script>
