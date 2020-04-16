 <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('assets/logo.png')}}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>dashboard</span></a>
                                <ul class="collapse">
                                    <li class="@if(Request::is('leads'))active @endif"><a href="{{route('lead')}}">All Leads</a></li>
                                    <li class="@if(Request::is('import'))active @endif"><a href="{{route('import')}}">Upload Leads</a></li>
                                   
                                </ul>
                            </li>
                     
                     
                        </ul>
                    </nav>
                </div>
            </div>
        </div>