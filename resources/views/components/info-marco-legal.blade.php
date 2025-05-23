<div>
    <div id="marcolegal" class="hosting">
        <div class="container">
            <div class="row">
                {{-- Este es el bloque 10 que muestra la imagen y el titulo del MArco Legal --}}
                @foreach($datospki as $datopki)
                    @if($datopki->bloquecategoria == 10)
                        <div class="col-md-4">
                            <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->imagenpki) }}" width="150" height="150" style="float: left" />
                        </div>
                        <div class="col-md-4 titlepage">
                            <h2>{!! $datopki->titulo !!}</h2>
                        </div>
                        @break
                    @endif
                @endforeach
            </div>

            <div class="row">
                {{-- 1ra fila bloque 11 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 11)
                                        <div class="align-middle marcolegal">
                                            <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                            {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                                @php
                                                        $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                                @endphp
                                                {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                            </a>--}}

                                            @if ($datopki->documentopki)
                                                <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                    {!! $datopki->contenido !!}
                                                </a>
                                            @else
                                                @php
                                                    $documentos = explode(',',$datopki->documentospki);
                                                    $cantidaddocumentos = count($documentos);
                                                @endphp
                                                @foreach($documentos as $documento)
                                                    <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank" >
                                                        {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                    </a>
                                                @endforeach
                                            @endif
                                        </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 1ra fila bloque 12 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 12)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 1ra fila bloque 13 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 13)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- 2ra fila bloque 14 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 14)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 2ra fila bloque 15 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 15)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 2ra fila bloque 16 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 16)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- 3ra fila bloque 17 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 17)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 3ra fila bloque 18 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 18)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 3ra fila bloque 19 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 19)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
            </div>


            <div class="row">
                {{-- 4ta fila bloque 20 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 20)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 4ta fila bloque 21 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 21)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 4ta fila bloque 22 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 22)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
            </div>

            <div class="row">
                {{-- 5ta fila bloque 23 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 23)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 5ta fila bloque 24 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 24)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>
                {{-- 5ta fila bloque 25 --}}
                <div class="mb-4 col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Services-box">
                        <h3>
                            @foreach($datospki as $datopki)
                                @if($datopki->bloquecategoria == 25)
                                    <div class="align-middle marcolegal">
                                        <img src="{{ asset('/ficherospki/categoriapki3'.'/'.$datopki->iconopki) }}" width="10%" height="10%" style="float: left" class="mr-3" />
                                        {{--<a href="{{asset('ficherospki/categoriapki3/'.substr($datopki->documentospki,strpos($datopki->documentospki,'-')+1))}}" target="_blank" >
                                            @php
                                                $totalcaracteres = strpos($datopki->documentospki, '.pdf');
                                            @endphp
                                            {!! substr($datopki->documentospki,0, $totalcaracteres)  !!}
                                        </a>--}}
                                        @if ($datopki->documentopki)
                                            <a href="{{ asset('ficherospki/categoriapki3/'.$datopki->documentopki) }}" target="_blank">
                                                {!! $datopki->contenido !!}
                                            </a>
                                        @else
                                            @php
                                                $documentos = explode(',',$datopki->documentospki);
                                                $cantidaddocumentos = count($documentos);
                                            @endphp
                                            @foreach($documentos as $documento)
                                                <a href="{{asset('ficherospki/categoriapki3/'.substr($documento,strpos($documento,'-')+1))}}" target="_blank">
                                                    {!! substr($documento,strpos($documento,'-')+1)  !!}
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    @break
                                @endif
                            @endforeach
                        </h3>
                    </div>
                </div>

            </div>



            <x-ir-arriba />

        </div>
    </div>
</div>
