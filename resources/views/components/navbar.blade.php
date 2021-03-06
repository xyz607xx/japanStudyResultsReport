{{--  {{dd($dropMenu)}}  --}}
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{{url('/')}}" class="brand navbar-brand" style="font-size:16px;font-weight: 900;color: dodgerblue;font-family: arial;">106金手獎赴日技職研習成果網站</a>
        </div>
        <div class="collapse navbar-collapse" id="topMenu">

            <ul class="nav navbar-nav navbar-right">
                @foreach ($dropMenu as $menu)
                <li class="dropdown">
                    <a class="btn btn-sm" href="#" data-toggle="dropdown">
                            {{$menu['title']}}
                    </a>
                    <ul class="dropdown-menu">
                        @include('components.dropMenu',$menu)
                    </ul>
                </li>
                @endforeach

            </ul>
            <ul class="nav navbar-nav navbar-@yield('navbarAlign','right')">
                @foreach ($navMenu as $menu)
                <li><a class="btn btn-sm" href="{{$menu['url']}}">{{$menu['title']}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
        $(".dropdown>.dropdown-menu>.dropdown>a[href='#']").click(function(){
            $(this).parent().toggleClass('active').find('ul').css('background','wheat');
            $(".dropdown>.dropdown-menu>.dropdown>.dropdown-menu").slideUp(150);
            if($(this).parent().hasClass('active')){
                $(".dropdown>.dropdown-menu>.dropdown").removeClass('active');
                $(this).parent().addClass('active');
                $(this).parent().find(".dropdown-menu").slideDown(150);
            }
            return false;
        });

        $("a[data-toggle=dropdown]").click(function(){
            var display = $(this).attr('aria-expanded')?'':'none';
            $(".dropdown>.dropdown-menu>.dropdown>.dropdown-menu").css('display',display);
            $(".dropdown>.dropdown-menu>.dropdown").removeClass('active');
        });
    </script>
    <style>
        .dropdown.active>ul{
            background: wheat;
            box-sizing:border-box;
        }
        .dropdown>.dropdown-menu>.dropdown>.dropdown-menu li{
            position: relative;
            padding-right:10px;
        }
        .dropdown>.dropdown-menu>.dropdown>.dropdown-menu li>.badge{
            position: absolute;
            right:0;
            top:10%;
        }
    </style>
</nav>
