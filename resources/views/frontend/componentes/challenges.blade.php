@php
    $backgrounds = ["primary", "success", "warning", "info"];
@endphp

@foreach($retos as $reto)
<div class="row challenge {{ ($reto->getCantidad() >= $reto->objetivo) ? " completado " : " " }}">
    <img class="shadow" src="{{ asset('img/SPAMI_RETO_SS.png') }}">
    <div class="col-12 d-flex justify-content-between">
        <div style="width:110px"></div>
        <h4>
            @switch(\App::getLocale())
                @case('es')
                    {{ $reto->subtipo->nombre_esp }}
                    @break
                @case('ca')
                {{ $reto->subtipo->nombre_cat }}
                    @break
                @default
                {{ $reto->subtipo->nombre_eng }}
            @endswitch
        </h4>
        <h4 style="width:110px" class="text-right">{{ $reto->objetivo }} {{ $reto->subtipo->tipo_unidad}}</h4>
    </div>
    <div class="col-12">
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-{{ $backgrounds[array_rand($backgrounds)]}}" role="progressbar"
                style="width: {{ ($reto->getCantidad() / $reto->objetivo) * 100 }}%" aria-valuenow="{{ $reto->getCantidad() }}"
                aria-valuemin="0" aria-valuemax="{{ $reto->objetivo }}">
                <h5 class="mb-0">{{$reto->getCantidad()}} {{ $reto->subtipo->tipo_unidad}}</h5>
            </div>
        </div>
    </div>
    <div class="col-12">
        @if ($isAnterior)
        <p class="text-dark">{{ __('frontend.retos_finalizo') }} <strong>{{ \Carbon\Carbon::parse($reto->fecha_fin)->format('d/m/Y') }}</strong></p>
        @else
        <p class="text-dark">{{ __('frontend.retos_finaliza') }} <strong>{{ \Carbon\Carbon::parse($reto->fecha_fin)->format('d/m/Y') }}</strong></p>
        @endif
    </div>
</div>
@endforeach
