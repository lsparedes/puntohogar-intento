    <div class="main-header">
            <div class="ml-4">
                <img src="{{asset('assets/images/logo.png')}}" alt="" width="100px">
            </div>

            <!-- <div class="menu-toggle">
                <div></div>
                        <div></div>
                <div></div>
            </div> -->

            <div class="d-flex align-items-center">

            </div>

            <div style="margin: auto"></div>

            <div class="header-part-right">


  @if(Auth::check())
                <!-- User avatar dropdown -->
                <div class="dropdown">
                    <div  class="user col align-self-end">
                        <img src="{{asset('assets/images/faces/1.jpg')}}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-header">
                                <i class="i-Lock-User mr-1"></i> {{ auth()->user()->name }}
                            </div>
                            <!-- <a class="dropdown-item">Account settings</a>
                            <a class="dropdown-item">Billing history</a> -->

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </div>
                    </div>
                </div>
                @else

          

                @endif

            </div>

        </div>

        <!-- header top menu end -->
