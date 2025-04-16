<script>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif

    @if ($message = Session::get('error'))
        toastr.error("{{ $message }}");
    @endif

    <!-- Show success message -->
    @if ($message = Session::get('success'))
        toastr.success("{{ $message }}");
    @endif

</script>
