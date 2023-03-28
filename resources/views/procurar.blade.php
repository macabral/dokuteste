@extends('layouts.default')
@section('content')

    <div class="card">

        <div class="card-body">
            
            <form method="POST" action="{{ route('procurarDoc') }}">
                @csrf
        
                <div>
                    <label for="Procurar">{{ __('messages.Search For') }}</label>
                    <input id="search" class="form-control" type="text" name="search" :value="old('search')" autofocus autocomplete="search" />
                </div>
        
                <p>Procurar pela Data do Documento</p>

                <div class="mt-4">
                    <label for="datadoc1">{{ __('messages.Initial Date') }}</label>
                    <input id="datadoc1" class="form-control" type="date" name="datadoc1" :value="old('datadoc1')" autocomplete="datadoc1" />
                </div>
        

                <div class="mt-4">
                    <label for="datadoc2">{{ __('messages.Final Date') }}</label>
                    <input id="datadoc2" class="form-control" type="date" name="datadoc2" :value="old('datadoc2')" autocomplete="datadoc2" />
                </div>

                <div style="padding-top: 10px;">
                    <button class="btn btn-primary">
                        {{ __('messages.Search') }}
                    </button>

                    <a href="{{ route('painel') }}" class="btn btn-secondary">
                        {{ __('messages.Cancel') }}
                    </a>
                </div>
                
            </form>

        </div>
    </div>

@stop