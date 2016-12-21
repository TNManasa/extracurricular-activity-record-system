<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ECAM</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Home<span class="sr-only">(current)</span></a></li>
                {{--Logged in as Student--}}
                @if(App\User::getUserRole(Auth::id()) == 1)
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logged in as Student<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="{{ route('students.dashboard', [Student::findById(Auth::User()->id)])->index_no }}">Student Dashboard</a></li>--}}
                        <li><a href="{{ route('activities.new-activity') }}">Add New Activity</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('students.dashboard') }}">Student Dashboard</a></li>
                    </ul>
                </li>
                    {{--Logged in as Supervisor--}}
                @elseif(App\User::getUserRole(Auth::id()) == 2)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logged in as Supervisor<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {{--<li><a href="{{ route('students.dashboard', [Student::findById(Auth::User()->id)])->index_no }}">Student Dashboard</a></li>--}}
                            <li><a href="{{ route('admin.index') }}">Supervisor Controls</a></li>
                            <li role="separator" class="divider"></li>
                        </ul>
                    </li>
                    {{--Logged in as Admin--}}
                @elseif(App\User::getUserRole(Auth::id()) == 3)
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logged in as Admin<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {{--<li><a href="{{ route('students.dashboard', [Student::findById(Auth::User()->id)])->index_no }}">Student Dashboard</a></li>--}}
                            <li><a href="{{ route('admin.index') }}">Admin Dashboard</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('admin.all-students') }}">All Students</a></li>
                            <li><a href="{{ route('admin.all-organizations') }}">All Organizations</a></li>

                        </ul>
                    </li>
                    {{--Not logged in--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign In<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            {{--<li><a href="{{ route('students.dashboard', [Student::findById(Auth::User()->id)])->index_no }}">Student Dashboard</a></li>--}}
                            <li><a href="{{ route('admin.index') }}">Admin Controls</a></li>
                            <li role="separator" class="divider"></li>
                        </ul>
                    </li>
                @endif
            </ul>
            {{--<form class="navbar-form navbar-left">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" class="form-control" placeholder="Search">--}}
                {{--</div>--}}
                {{--<button type="submit" class="btn btn-default">Submit</button>--}}
            {{--</form>--}}
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('welcome') }}">Go back to Welcome Page</a></li>
                <li class="dropdown">
                    @if(Auth::check())
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logout <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                            <li><a href="{{ route('logout') }}">Logout</a></li>
                            <li role="separator" class="divider"></li>
                    @else
                            <li><a href="{{ route('user.login') }}">Sign In</a></li>
                            <li><a href="{{ route('students.register') }}">Register as Student</a></li>
                    </ul>
                    @endif
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>