<!DOCTYPE html>
<html>
<head>
  <title>
    @yield('title', 'Shipment Tracking')
  </title>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>

<ul class="nav">
  <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
  <li><a class="{{ request()->routeIs('shipments.create') ? 'active' : '' }}" href="{{ route('shipments.create') }}">Create a Shipment</a></li>
</ul>

@includeWhen($errors->any(), '_errors')

@if (session('success'))
  <div class="flash-success">
      {{ session('success') }}
  </div>
@endif

<div class="main">
	@yield('content')
</div>

</body>
</html>
