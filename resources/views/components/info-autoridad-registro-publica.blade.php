<div>
    <div id="registropublica" class="hosting bg-tecnomatica-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 titlepage">
                    <h2>Autoridad Registro Pública</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-justify text-tecnomatica-dark font-semibold">
                    @foreach($datospki as $datopki)
                        @if (($datopki->categoriaspki_id == 7))
                        <div class="mt-4 mb-3">
                            {!! $datopki->contenido !!}
                        </div>
                        @endif
                    @endforeach

                    <a href="https://ra.isp.cupet.cu" target="_blank" class="btn btn-primary">Instructivo</a>
                </div>
            </div>
            <x-ir-arriba />
        </div>
    </div>
</div>
