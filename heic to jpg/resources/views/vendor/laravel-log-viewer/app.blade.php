<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="noindex, nofollow">
        <title>Error Log Viewer</title>
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/log.css') }}">

        <script>
            function initTheme() {
                const darkThemeSelected = localStorage.getItem('darkSwitch') !== null && localStorage.getItem('darkSwitch') === 'dark';
                darkSwitch.checked = darkThemeSelected;
                darkThemeSelected ? document.body.setAttribute('data-theme', 'dark') : document.body.removeAttribute('data-theme');
            }
            function resetTheme() {
                if (darkSwitch.checked) {
                    document.body.setAttribute('data-theme', 'dark');
                    localStorage.setItem('darkSwitch', 'dark');
                } else {
                    document.body.removeAttribute('data-theme');
                    localStorage.removeItem('darkSwitch');
                }
            }
        </script>
    </head>
    <body>
        @yield('content')
        <!-- jQuery for Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
        <!-- FontAwesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <!-- Datatables -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
        <script>
            // dark mode by https://github.com/coliff/dark-mode-switch
            const darkSwitch = document.getElementById('darkSwitch');
            // this is here so we can get the body dark mode before the page displays
            // otherwise the page will be white for a second... 
            initTheme();
            window.addEventListener('load', () => {
                if (darkSwitch) {
                    initTheme();
                    darkSwitch.addEventListener('change', () => {
                        resetTheme();
                    });
                }
            });
            // end darkmode js
            $(document).ready(function () {
                $('.table-container tr').on('click', function () {
                    $('#' + $(this).data('display')).toggle();
                });
                $('#table-log').DataTable({
                    "order": [$('#table-log').data('orderingIndex'), 'desc'],
                    "stateSave": true,
                    "stateSaveCallback": function (settings, data) {
                        window.localStorage.setItem("datatable", JSON.stringify(data));
                    },
                    "stateLoadCallback": function (settings) {
                        var data = JSON.parse(window.localStorage.getItem("datatable"));
                        if (data) data.start = 0;
                        return data;
                    }
                });
                $('#delete-log, #clean-log, #delete-all-log').click(function () {
                    return confirm('Are you sure?');
                });
            });
        </script>
    </body>
</html>