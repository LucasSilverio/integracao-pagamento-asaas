@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
      <div>        
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
              <p class="font-medium text-lg">Detalhes do pagamento</p>
              <p>Preencha todos os campos</p>
              @if(session('message'))          
                  <div role="alert">
                      <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                      Não foi possível realizar o pagamento
                      </div>
                      <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                      <p>{{ session('message') }}</p>
                      </div>
                  </div>
              @endif
            </div>
            <form action="{{ route('checkout.payment') }}" method="post" class="lg:col-span-2" x-data="{ payment_method: '{{ old('payment_method', 'BOLETO') }}' }" >
                @include('home._partials.form')
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection