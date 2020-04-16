   <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.html">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <!-- <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar"> -->
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{Sentinel::getUser()->full_name}} <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <form class="dropdown-item" action="{{route('logout')}}" method="post">@csrf <button class="btn btn-primary" type="submit">Log Out </button> </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>