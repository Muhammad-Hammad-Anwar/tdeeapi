<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
	<link
		rel="icon"
		type="image/x-icon"
		href="{{ asset(settings('page_title_icon')) }}"/>
        <!-- CSS file -->



    <link
    	rel 		  = "stylesheet"
    	href 		  = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
    	rel 		  = "stylesheet"
    	href 		  = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css"
    	integrity 	  = "sha512-cHxvm20nkjOUySu7jdwiUxgGy11vuVPE9YeK89geLMLMMEOcKFyS2i+8wo0FOwyQO/bL8Bvq1KMsqK4bbOsPnA=="
    	crossorigin   = "anonymous"
    	referrerpolicy= "no-referrer"/>
    <link
    	rel 		  = "stylesheet"
    	href 		  = "{{ asset('public/css/style.css') }}"/>
        

    @yield('head')
</head>
<body>

	@yield('content')

    <script src     = "{{ asset('public/js/jquery.min.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  
	<script
		src 		= "https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity 	= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin = "anonymous">
	</script>
	<script
		src 		= "https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
		integrity   = "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin = "anonymous">
	</script>
    <script src     = "{{ asset('public/js/script.js') }}"></script>


    {!! settings('google_search_console_code') !!}

    {!! settings('google_analytics_code') !!}

    {!! settings('clarity_code') !!}

    @yield('tool_scripts')

    @yield('scripts')
</body>
</html>
