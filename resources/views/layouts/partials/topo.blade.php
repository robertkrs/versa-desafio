<div class="topo">
    <nav class="navbar navbar-expand-lg bg-body-tertiary"> 
        <div class="container-fluid">
            <a href="{{route('painel.home')}}"><img src="{{ asset('img/logo.png') }}"></a>
            @if(!empty($_SESSION))
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-dropdown" aria-controls="nav-dropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="nav-dropdown">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('painel.home')}}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('agenda.index')}}"><i class="fa fa-address-book-o" aria-hidden="true"></i> Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('painel.minha-area')}}"><i class="fa fa-user-o" aria-hidden="true"></i> Minha área</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('painel.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
</div>
