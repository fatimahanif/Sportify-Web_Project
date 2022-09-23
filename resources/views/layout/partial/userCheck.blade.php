@if ($userId != Session('userId'))
    <script>
        window.location = "/";
    </script>
@endif
