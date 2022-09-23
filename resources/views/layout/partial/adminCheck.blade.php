@if (Session('loggedInAs') === 'customer')
    <script>
        window.location = "/admin/login";
    </script>
@endif
