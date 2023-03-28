@extends('layouts.default')
@section('content')

    <div class="card">

        <div class="card-body">
            @csrf
                @foreach ($ret as $key => $value)

                    <div class="row">
                        <div class="col-12">
                            <div class="font-weight-bold">
                                {{ $value->titulo }}
                            </div>
                            <div style="font-size:.7em;padding-bottom: 5px;">
                                {{ $value->datadoc }}, criado em {{ $value->created_at }}
                            </div>
                            <div>
                                <!-- Editar -->
                                <a href='' style="float: left;" title="Editar">
                                    <svg  width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="Edit / Edit_Pencil_01">
                                        <path fill="#AB7C94" id="Vector" d="M12 8.00012L4 16.0001V20.0001L8 20.0001L16 12.0001M12 8.00012L14.8686 5.13146L14.8704 5.12976C15.2652 4.73488 15.463 4.53709 15.691 4.46301C15.8919 4.39775 16.1082 4.39775 16.3091 4.46301C16.5369 4.53704 16.7345 4.7346 17.1288 5.12892L18.8686 6.86872C19.2646 7.26474 19.4627 7.46284 19.5369 7.69117C19.6022 7.89201 19.6021 8.10835 19.5369 8.3092C19.4628 8.53736 19.265 8.73516 18.8695 9.13061L18.8686 9.13146L16 12.0001M12 8.00012L16 12.0001" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                    </svg>
                                </a>
                                <!-- Excluir -->
                                <a href=''  style="float: left;padding-left: 7px;" title="Excluir" wire:click="showDeleteModal" >
                                    <svg  width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#AB7C94" d="M10 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill="#AB7C94" d="M14 12V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill="#AB7C94" d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill="#AB7C94" d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill="#AB7C94" d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                                <!-- Download -->
                                <a href='' style="float: left;padding-left: 7px;" title="Download">
                                    <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill="#AB7C94" d="M12 10V20M12 20L9.5 17.5M12 20L14.5 17.5" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path fill="#AB7C94" fill-rule="evenodd" clip-rule="evenodd" d="M6.3218 7.05726C7.12925 4.69709 9.36551 3 12 3C14.6345 3 16.8708 4.69709 17.6782 7.05726C19.5643 7.37938 21 9.02203 21 11C21 13.2091 19.2091 15 17 15H16C15.4477 15 15 14.5523 15 14C15 13.4477 15.4477 13 16 13H17C18.1046 13 19 12.1046 19 11C19 9.89543 18.1046 9 17 9C16.9776 9 16.9552 9.00037 16.9329 9.0011C16.4452 9.01702 16.0172 8.67854 15.9202 8.20023C15.5502 6.37422 13.9345 5 12 5C10.0655 5 8.44979 6.37422 8.07977 8.20023C7.98284 8.67854 7.55482 9.01702 7.06706 9.0011C7.04476 9.00037 7.02241 9 7 9C5.89543 9 5 9.89543 5 11C5 12.1046 5.89543 13 7 13H8C8.55228 13 9 13.4477 9 14C9 14.5523 8.55228 15 8 15H7C4.79086 15 3 13.2091 3 11C3 9.02203 4.43567 7.37938 6.3218 7.05726Z" fill="#000000"/>
                                    </svg>
                                </a>
                                <!-- Abrir -->
                                <a href='' style="float: left;padding-left: 7px;" title="Abrir">
                                    <svg  width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g id="File / File_Document">
                                        <path fill="#AB7C94" id="Vector" d="M9 17H15M9 14H15M13.0004 3.00087C12.9048 3 12.7974 3 12.6747 3H8.2002C7.08009 3 6.51962 3 6.0918 3.21799C5.71547 3.40973 5.40973 3.71547 5.21799 4.0918C5 4.51962 5 5.08009 5 6.2002V17.8002C5 18.9203 5 19.4801 5.21799 19.9079C5.40973 20.2842 5.71547 20.5905 6.0918 20.7822C6.51921 21 7.079 21 8.19694 21L15.8031 21C16.921 21 17.48 21 17.9074 20.7822C18.2837 20.5905 18.5905 20.2842 18.7822 19.9079C19 19.4805 19 18.9215 19 17.8036V9.32568C19 9.20302 18.9999 9.09553 18.999 9M13.0004 3.00087C13.2858 3.00348 13.4657 3.01407 13.6382 3.05547C13.8423 3.10446 14.0379 3.18526 14.2168 3.29492C14.4186 3.41857 14.5918 3.59181 14.9375 3.9375L18.063 7.06298C18.4089 7.40889 18.5809 7.58136 18.7046 7.78319C18.8142 7.96214 18.8953 8.15726 18.9443 8.36133C18.9857 8.53379 18.9964 8.71454 18.999 9M13.0004 3.00087L13 5.80021C13 6.92031 13 7.48015 13.218 7.90797C13.4097 8.2843 13.7155 8.59048 14.0918 8.78223C14.5192 9 15.079 9 16.1969 9H18.999" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <hr>

                @endforeach
                <div class="mt-4">
                    <a href="{{ route('procurarDoc') }}" class="btn btn-dark">
                        {{ __('messages.Return to Search') }}
                    </a>

                    <a href="{{ route('painel') }}" class="btn btn-secondary">
                        {{ __('messages.Cancel') }}
                    </a>
                </div>

        </div>
    </div>

@stop