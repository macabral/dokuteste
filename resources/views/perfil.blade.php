@extends('layouts.default')
@section('content')

    <div class="card">

        <div class="card-body">
            
            <div class="row">
                <div class="col-4">
                    <p><strong>{{ __('messages.Profile Informations') }}</strong></p>
                    <small>{{ __('messages.Update your profile and email address') }}</small>
                </div>
                <div class="col-8">
                
                    <form method="POST" action="{{ route('perfil') }}">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('messages.Name') }}:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required autofocus>
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                            </div>
                        </div>
                    
                        <div>
                            <button class="btn btn-dark">
                                {{ __('messages.Update Profile') }}
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <p><strong>{{ __('messages.Update your password') }}</strong></p>
                    <small>{{ __('messages.Keep your password stronger and safe') }}</small>
                </div>
                <div class="col-8">
                    <form method="POST" action="{{ route('perfil') }}">
                        @csrf
                        @method('PUT')
                                       
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">{{ __('messages.New Password') }}:</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" required class="form-control" minlength="8">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">{{ __('messages.Confirm Password') }}:</label>
                            <div class="col-sm-8">
                                <input type="password" name="password_confirmation" required class="form-control" minlength="8">
                            </div>
                        </div>
                    
                        <div>
                            <button class="btn btn-dark">
                                {{ __('messages.Update Password') }}
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <hr>
            <div class="row">
                <div class="col-4">
                    <p><strong>{{ __('messages.Key-word for your Documents') }}</strong></p>
                    <small>{{ __('messages.Keep your Documentos safe using a Key for your ZIP files') }}</small>
                </div>
                <div class="col-8">
                    <form method="POST" action="{{ route('perfil') }}">
                        @csrf
                        @method('PUT')
                    
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">{{ __('messages.Key-Word') }}:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required autofocus>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-dark">
                                {{ __('messages.Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-4">
                    <p><strong>{{ __('messages.Delete Account') }}</strong></p>
                    <small>{{ __('messages.Permatentely Delete your Account. Every data and Documents will be deleted') }}</small>
                </div>
                <div class="col-8">
                    <form method="POST" action="{{ route('perfil') }}">
                        @csrf
                        @method('PUT')
                                       
                        <div>
                            <button class="btn btn-dark">
                                {{ __('messages.Delete Account') }}
                            </button>
                        </div>
                        
                    </form>
                </div>
            </div>

        </div>
    </div>

@stop