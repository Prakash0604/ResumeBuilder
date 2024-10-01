<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- MultiSelect CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/css/bootstrap-multiselect.css"
        rel="stylesheet" />
    <style>
 .scrollable {
            position: fixed;
            height: 100vh;
            /* Full height of the viewport */
            overflow-y: auto;
            /* Enable vertical scrolling */
        }
    </style>
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="scrollable">
            <div class="p-4 pt-5">
                <a href="#" class="img logo rounded-circle mb-5"
                    style="background-image: url(https://imgs.search.brave.com/XKUD749tjOvSP2maFZkPmTckY7mAfnglBg7J6YgWEgg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/aXN0b2NrcGhvdG8u/Y29tL3Jlc291cmNl/cy9pbWFnZXMvSG9t/ZVBhZ2UvRm91clBh/Y2svQzItUGhvdG9z/LWlTdG9jay0xMzU2/MTk3Njk1LmpwZw);"></a>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="#">Personal Detail</a>
                    </li>
                    <li>
                        <a href="#">Education</a>
                    </li>
                    <li>
                        <a href="#">Experience</a>
                    </li>
                    <li>
                        <a href="#">Additional Fields</a>
                    </li>
                    <li>
                        <a href="#">Generate Portfolio</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- jQuery (required for Select2 and MultiSelect) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Select2 JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
        <!-- MultiSelect JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.15/js/bootstrap-multiselect.min.js">
        </script>


        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 mt-4">
            @yield('content')
        </div>
    </div>

    {{-- <script src="{{ asset('asset/js/jquery.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('asset/js/popper.js') }}"></script> --}}
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ asset('asset/js/main.js') }}"></script> --}}
</body>

</html>
