@php
    $nav_links = [
        [
            'name'=>'Inicio',
            'route'=>'/',
            'active'=> request()->routeIs('dashboard')
        ],
        [
            'name'=>'Información General',
            'route'=>'/#informacion',
            'active'=> false
        ],
        [
            'name'=>'Marco Legal',
            'route'=>'/#marcolegal',
            'active'=> false
        ],
        [
            'name'=>'Preguntas Frecuentes',
            'route'=>'/#preguntasfrecuentes',
            'active'=> false
        ],
        [
            'name'=>'Ayuda',
            'route'=>'/#ayuda',
            'active'=> false
        ],
        [
            'name'=>'Contáctanos',
            'route'=>'/#contactanos',
            'active'=> false
        ],
    ]
@endphp

@php
  /*Preparando el nav_links para cuando este autenticado y el role es USUARIO en el proyecto */
    $nav_links_usuario = [
        [
            'name'=>'Inicio',
            'route'=>'/',
            'active'=> request()->routeIs('dashboard')
        ],
        [
            'name'=>'Información General',
            'route'=>'/#informacion',
            'active'=> false
        ],
        [
            'name'=>'Marco Legal',
            'route'=>'/#marcolegal',
            'active'=> false
        ],
        [
            'name'=>'Preguntas Frecuentes',
            'route'=>'/#preguntasfrecuentes',
            'active'=> false
        ],
        [
            'name'=>'Ayuda',
            'route'=>'/#ayuda',
            'active'=> false
        ],
        [
            'name'=>'Contáctanos',
            'route'=>'/#contactanos',
            'active'=> false
        ],
        [
            'name'=>'Documentos Contractuales',
            'route'=>'/#contractuales',
            'active'=> false
        ],
    ]
@endphp


@php
  /*Preparando el nav_links para cuando este autenticado y el role es ASPIRANTE en el proyecto */
    $nav_links_aspirante = [
        [
            'name'=>'Inicio',
            'route'=>'/',
            'target'=>'_self',
            'active'=> request()->routeIs('dashboard')
        ],
        [
            'name'=>'Información General',
            'route'=>'/#informacion',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Preguntas Frecuentes',
            'route'=>'/#preguntasfrecuentes',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Ayuda',
            'route'=>'/#ayuda',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Contáctanos',
            'route'=>'/#contactanos',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Documentos Contractuales',
            'route'=>'/#contractuales',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Autoridad Registro',
            'route'=>'http://ra.isp.cupet.cu/ ',
            'target'=>'_blank',
            'active'=> false
        ],
    ]
@endphp


@php
  /*Preparando el nav_links para cuando este autenticado y el role es TITULAR en el proyecto */
    $nav_links_titular = [
        [
            'name'=>'Inicio',
            'route'=>'/',
            'active'=> request()->routeIs('dashboard')
        ],
        [
            'name'=>'Información General',
            'route'=>'/#informacion',
            'active'=> false
        ],
        [
            'name'=>'Preguntas Frecuentes',
            'route'=>'/#preguntasfrecuentes',
            'active'=> false
        ],
        [
            'name'=>'Ayuda',
            'route'=>'/#ayuda',
            'active'=> false
        ],
        [
            'name'=>'Contáctanos',
            'route'=>'/#contactanos',
            'active'=> false
        ],
        [
            'name'=>'Documentos Contractuales',
            'route'=>'/#contractuales',
            'active'=> false
        ],
        [
            'name'=>'Autoridad Registro',
            'route'=>'http://ra.isp.cupet.cu/ ',
            'target'=>'_blank',
            'active'=> false
        ],
    ]
@endphp



@php
  /*Preparando el nav_links para cuando este autenticado y el role es REPRESENTANTE en el proyecto */
    $nav_links_representante = [
        [
            'name'=>'Inicio',
            'route'=>'/',
            'target'=>'_self',
            'active'=> request()->routeIs('dashboard')
        ],
        [
            'name'=>'Información General',
            'route'=>'/#informacion',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Preguntas Frecuentes',
            'route'=>'/#preguntasfrecuentes',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Ayuda',
            'route'=>'/#ayuda',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Contáctanos',
            'route'=>'/#contactanos',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Documentos Contractuales',
            'route'=>'/#contractuales',
            'target'=>'_self',
            'active'=> false
        ],
        [
            'name'=>'Autoridad Registro',
            'route'=>'http://ra.isp.cupet.cu/ ',
            'target'=>'_blank',
            'active'=> false
        ],
    ]
@endphp

@php
    $nav_links_administrador = [
        [
            'name'=>'Inicio',
            'route'=>'/',
            'active'=> request()->routeIs('dashboard')
        ],
        [
            'name'=>'Información General',
            'route'=>'/#informacion',
            'active'=> false
        ],
        [
            'name'=>'Marco Legal',
            'route'=>'/#marcolegal',
            'active'=> false
        ],
        [
            'name'=>'Preguntas Frecuentes',
            'route'=>'/#preguntasfrecuentes',
            'active'=> false
        ],
        [
            'name'=>'Ayuda',
            'route'=>'/#ayuda',
            'active'=> false
        ],
        [
            'name'=>'Documentos Contractuales',
            'route'=>'/#contractuales',
            'target'=>'_self',
            'active'=> false
        ],
    ]
@endphp


<nav x-data="{ open: false }" class="bg-white border-b shadow border-black-100 text-black-50">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo Lo comente porque el banner tiene el logo de TM-->
                <div class="flex items-center flex-shrink-0">
                    {{--<a href="{{ route('home') }}">
                        <x-jet-application-mark class="block w-auto h-9" />
                    </a>--}}
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @auth
                        @role('Admin|SuperAdmin')
                            @foreach($nav_links_administrador as $nav_link)
                                <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                                    <div class="shadow-lg bg-white rounded-lg h-18 pt-2 pb-2 pr-2 pl-2 rounded-2xl"> {{ $nav_link['name'] }}</div>
                                </x-jet-nav-link>
                            @endforeach
                        @endrole
                        @role('Usuario')
                            @foreach($nav_links_usuario as $nav_link)
                                <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                                    <div class="shadow-lg bg-white rounded-lg h-18 pt-2 pb-2 pr-2 pl-2 rounded-2xl"> {{ $nav_link['name'] }}</div>
                                </x-jet-nav-link>
                            @endforeach
                        @endrole
                        @role('Aspirante')
                           @foreach($nav_links_aspirante as $nav_link)
                                <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']" target="{{$nav_link['target']}}">
                                    <div class="shadow-lg bg-white rounded-lg h-18 pt-2 pb-2 pr-2 pl-2 rounded-2xl text-center"> {{ $nav_link['name'] }}</div>
                                </x-jet-nav-link>
                            @endforeach
                        @endrole
                        @role('Representante')
                        @foreach($nav_links_representante as $nav_link)
                            <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']" target="{{$nav_link['target']}}">
                                <div class="shadow-lg bg-white rounded-lg h-18 pt-2 pb-2 pr-2 pl-2 rounded-2xl text-center"> {{ $nav_link['name'] }}</div>
                            </x-jet-nav-link>
                        @endforeach
                        @endrole
                        @role('Titular')
                           @foreach($nav_links_titular as $nav_link)
                                <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                                    <div class="shadow-lg bg-white rounded-lg h-18 pt-2 pb-2 pr-2 pl-2 rounded-2xl"> {{ $nav_link['name'] }}</div>
                                </x-jet-nav-link>
                            @endforeach
                        @endrole

                    @endauth


                    @guest
                        @foreach($nav_links as $nav_link)
                            <x-jet-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                                <div class="shadow-lg bg-white rounded-lg h-18 pt-2 pb-2 pr-2 pl-2 rounded-2xl"> {{ $nav_link['name'] }}</div>
                            </x-jet-nav-link>
                        @endforeach
                    @endguest
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="relative ml-3">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    @auth
                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">

                                        {{ Auth::user()->currentTeam->name }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    @endauth
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-60">
                                    <!-- Team Management -->
                                    <!--<div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Team') }}
                                    </div>-->

                                    @auth
                                    <!-- Team Settings -->
                                    <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                        {{ __('Team Settings') }}
                                    </x-jet-dropdown-link>

                                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                        <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                            {{ __('Create New Team') }}
                                        </x-jet-dropdown-link>
                                    @endcan
                                    @endauth
                                    <div class="border-t border-gray-100"></div>

                                    @auth
                                    <!-- Team Switcher -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Switch Teams') }}
                                    </div>

                                    @foreach (Auth::user()->allTeams() as $team)
                                        <x-jet-switchable-team :team="$team" />
                                    @endforeach
                                    @endauth
                                </div>
                            </x-slot>

                        </x-jet-dropdown>
                    </div>
                @endif

                <!-- Settings Dropdown -->
                <div class="relative ml-3">
                    {{--PONIENDO DIRECTIVA DE BLADE PARA QUE SOLO SE MUESTRE SI ESTA AUTENTICADO--}}
                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                        <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <!--<div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administrar cuenta') }}
                                </div>-->

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-jet-dropdown-link>

                                {{--Mostrando link para la parte de administracion solo para superadmin y admin --}}
                                @if(Auth::user()->hasRole(['SuperAdmin','Admin']))
                                    <x-jet-dropdown-link href="{{ route('admin.home') }}">
                                        {{ __('Administracion') }}
                                    </x-jet-dropdown-link>
                                @endif

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                             onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Salir') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @else
                        <!--mostrando boton de autenticar en caso de no estarlo-->
                            <a href="{{ route('login') }}" class="text-md text-tecnomatica-light hover text-tecnomatica-dark">
                                Autenticar
                            </a>
                            <a href="{{ route('solicitar_registro') }}" class="ml-4 text-md text-black hover text-red">
                                Registrar
                            </a>

                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <!-- mostrando barra de navegacion dependiendo si esta autenticado o no -->
            @if(Route::has('login'))
                @role('Admin|SuperAdmin')
                    @foreach($nav_links as $nav_link)
                        <x-jet-responsive-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endforeach
                @endrole

                @role('Usuario')
                    @foreach($nav_links_usuario as $nav_link)
                        <x-jet-responsive-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endforeach
                @endrole

                @role('Aspirante')
                   @foreach($nav_links_aspirante as $nav_link)
                        <x-jet-responsive-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']" target="{{$nav_link['target']}}">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endforeach
                @endrole
                @role('Representante')
                    @foreach($nav_links_representante as $nav_link)
                        <x-jet-responsive-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']" target="{{$nav_link['target']}}">
                            {{ $nav_link['name'] }}
                        </x-jet-responsive-nav-link>
                    @endforeach
                @endrole
            @else
                @foreach($nav_links as $nav_link)
                    <x-jet-responsive-nav-link href="{{ $nav_link['route']}}" :active="$nav_link['active']">
                        {{ $nav_link['name'] }}
                    </x-jet-responsive-nav-link>
                @endforeach
            @endif
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="flex items-center px-4">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <div class="flex-shrink-0 mr-3">
                            <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </div>
                    @endif

                    <div>
                        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    <!-- Account Management -->
                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Profile') }}
                    </x-jet-responsive-nav-link>

                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                            {{ __('API Tokens') }}
                        </x-jet-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-jet-responsive-nav-link>
                    </form>

                    <!-- Team Management -->
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <div class="border-t border-gray-200"></div>

                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Team') }}
                        </div>

                        <!-- Team Settings -->
                        <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                            {{ __('Team Settings') }}
                        </x-jet-responsive-nav-link>

                        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                            <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                {{ __('Create New Team') }}
                            </x-jet-responsive-nav-link>
                        @endcan

                        <div class="border-t border-gray-200"></div>

                        <!-- Team Switcher -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Switch Teams') }}
                        </div>

                        @foreach (Auth::user()->allTeams() as $team)
                            <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                        @endforeach
                    @endif
                </div>
            </div>
        @else
            <div class="py-1 border-t-gray-200">
                <x-jet-responsive-nav-link href="{{ route('login')}}" :active="request()->route('login')">
                    Login
                </x-jet-responsive-nav-link>
                {{--<x-jet-responsive-nav-link href="{{ route('register')}}" :active="request()->route('register')">
                    Register
                </x-jet-responsive-nav-link>--}}
            </div>
        @endauth
    </div>
</nav>
