@section('navigation')
  <li>{{ link_to('contactus', 'CONTACT US') }}</li>
  
  @if (Auth::check() and Auth::user()->status == 'admin')
    <li>{{ link_to('admin', 'ADMIN') }}</li>
  @endif
  
  @if (Auth::check())
	<li>{{ link_to('auth/home', 'HOME') }}</li>
    <li>{{ link_to('auth/logout', 'LOG OUT') }}</li>
  @else
    <li>{{ link_to('guest/login', 'LOG IN') }}</li>
  @endif

@stop


