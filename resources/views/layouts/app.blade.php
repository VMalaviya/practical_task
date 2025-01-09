<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title', 'Companies')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    @hasSection('content')
        @yield('content')
    @else
        <h2>No content Found!</h2>
    @endif

</body>
</html>