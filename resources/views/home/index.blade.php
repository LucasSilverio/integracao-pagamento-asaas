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