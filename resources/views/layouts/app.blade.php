<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Task Management System')</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-slate-950 text-slate-100 font-sans antialiased min-h-screen">

        @include('frontend.includes.header')

        <main>
            @yield('content')
        </main>

        @include('frontend.includes.footer')

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(function () {
                // Mobile menu toggle
                $('#mobile-menu-btn').on('click', function () {
                    $('#mobile-menu').toggleClass('hidden');
                });

                // User dropdown toggle
                $('#user-menu-btn').on('click', function (e) {
                    e.stopPropagation();
                    const $dropdown = $('#user-dropdown');
                    const $chevron  = $('#user-chevron');
                    const isOpen    = !$dropdown.hasClass('hidden');

                    $dropdown.toggleClass('hidden', isOpen);
                    $chevron.css('transform', isOpen ? '' : 'rotate(180deg)');
                });

                // Close dropdown on outside click
                $(document).on('click', function (e) {
                    if ($('#user-menu-wrapper').length && !$('#user-menu-wrapper').is(e.target) && $('#user-menu-wrapper').has(e.target).length === 0) {
                        $('#user-dropdown').addClass('hidden');
                        $('#user-chevron').css('transform', '');
                    }
                });

            });
        </script>

    </body>
</html>
