<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
	</head>

	<body>

            <div class="container">

                <ul class="nav nav-pills">
                    <li>{{ link_to_route('s_q_orgs.index', 'Organizations') }}</li>
                    <li>{{ link_to_route('s_q_depts.index', 'Departments') }}</li>
                    <li>{{ link_to_route('s_q_services.index', 'Services') }}</li>
                    <li>{{ link_to_route('s_q_operplaces.index', 'OperPlaces') }}</li>
                    
                    <li class="pull-right">{{ link_to_route('auth.logout',  'Logout') }}</li>
                    <!-- Technical information - SessionID-->
                    <li class="pull-right">{{Session::getId()}}</li>
                    <li class="pull-right">{{Sentry::getUser()->username;}}</li>
                    <li class="pull-right">{{ link_to_route('getaccounts', 'Accounts') }}</li>
                    <li class="pull-right">{{ link_to_route('groups.index', 'Groups') }}</li>
                </ul>

                @if (Session::has('message'))
                    <div class="flash alert">
                        <p>{{ Session::get('message') }}</p>
                    </div>
                @endif

                @yield('main')
            </div>

	</body>

</html>
