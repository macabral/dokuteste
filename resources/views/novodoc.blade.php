@extends('layouts.default')
@section('content')

    <div class="card">

        <div class="card-body">
            
            <form method="POST" enctype="multipart/form-data" action="{{ route('novoDocPost') }}">
                @csrf

                <div>
                    <label for="titulo">{{ __('messages.Title') }}*</label>
                    <input id="titulo"  class="form-control" type="text" name="titulo" :value="old('titulo')" required autofocus autocomplete="titulo" />
                </div>

                <div>
                    <label for="descricao">{{ __('messages.Description') }}</label>
                    <textarea
                        id="descricao"
                        name="descricao"
                        rows="3"
                        class="form-control"
                        >{{ old('datadoc') }}</textarea>
                </div>

                <div>
                    <label for="datadoc">{{ __('messages.Date') }}*</label>
                    <input id="datadoc"  class="form-control" type="date" name="datadoc" required :value="old('datadoc')" autocomplete="datadoc" />
                </div>

                <div>
                    <label for="datavencto">{{ __('messages.Due Date') }}</label>
                    <input id="datavencto" class="form-control" type="date" name="datavencto" :value="old('datavencto')" autocomplete="datavencto" />
                </div>

                <div >
                    <label for="arquivos">{{ __('messages.Upload Multiples Files') }}
                        <input  name="arquivos[]" class="form-control" id="arquivos" type="file" multiple>
                    </label>
                </div>            

                <div style="padding-top: 10px;">
                    <button class="btn btn-primary">
                        {{ __('messages.Save') }}
                    </button>

                    <a href="{{ route('painel') }}" class="btn btn-secondary">
                        {{ __('messages.Cancel') }}
                    </a>
                </div>
                
            </form>

        </div>
    </div>

@stop