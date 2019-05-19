<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<body>
<nav class="nav-extended">
    <div class="nav-wrapper">
        <a href="#" class="brand-logo">Timeli</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="active"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li><a href="badges.html">Invoicing</a></li>
    <li><a href="collapsible.html">Account</a></li>
        </ul>
    </div>
    <div class="nav-content">
            @section('navExtention')
            @show
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    <li class="active"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
    <li><a href="badges.html">Invoicing</a></li>
    <li><a href="collapsible.html">Account</a></li>
</ul>
@section('mainContent')
@show
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options = null);
    });
</script>
