<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>
        CoDoc Academy
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

    @include('layouts.sidebar')

    <div style="margin-left:280px;">

        <div class="container-fluid p-4">

            @include('layouts.topbar')

            @yield('content')

        </div>

    </div>

</body>

</html>
