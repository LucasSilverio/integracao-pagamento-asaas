@extends('layouts.app')

@section('title', 'Obriagado')

@section('content')
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
      <div>  
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="flex flex-col items-center space-y-2">
            @if ($payment->status == 'CONFIRMED')
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green-600 w-28 h-28">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
              </svg>
            @else
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-yellow-600 w-28 h-28">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
              </svg>
            @endif

            <h1 class="text-4xl font-bold">Pagamento {{ $payment->status == 'CONFIRMED' ? 'Confirmado' : 'não confirmado'}}!</h1>
            <p>Agradecemos o interesse em nosso produto. =]</p>
            @if ($payment->billingType == 'BOLETO')
              <a href="{{ $payment->bankSlipUrl }}" target="_blank"
                class="inline-flex items-center px-4 py-2 text-white bg-green-600 border border-green-600 rounded rounded-full hover:bg-green-700 focus:outline-none focus:ring">                
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>                
                <span class="text-sm font-medium">
                  Gerar Boleto de Pagamento
                </span>
              </a>
            @elseif($payment->billingType == 'PIX')
              <p>QRCode para pagamento</p>
              <img src="data:image/png;base64, {{$qrCode['encodedImage']}}" alt="Red dot" />   

              <div x-data="{textToCopy: '{{$qrCode['payload']}}', showMsg: false}"  class="flex flex-col items-center">                
                <a href="#"
                  class="inline-flex items-center px-4 py-2 text-white bg-green-600 border border-green-600 rounded rounded-full hover:bg-green-700 focus:outline-none focus:ring"
                    @click.prevent="window.navigator.clipboard.writeText(textToCopy), showMsg = true, setTimeout(() => showMsg = false, 1000)">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 mr-2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                    </svg>   
                    Pix Copia e Cola

                    <div x-show="showMsg" @click.away="showMsg = false" class="fixed bottom-3 right-3 z-20 max-w-sm overflow-hidden bg-green-100 border border-green-300 rounded" style="display: none;">
                      <p class="p-3 flex items-center justify-center text-green-600">Copiado para área de transferência</p>
                    </div>
                </a> 
                
              </div>      
              
            @endif
            <a href="/"
              class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 border border-indigo-600 rounded rounded-full hover:bg-indigo-700 focus:outline-none focus:ring">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
              </svg>
              <span class="text-sm font-medium">
                Home
              </span>
            </a>
          </div>
          @if ($payment->status == 'CONFIRMED')
            
          @endif
          
        </div>
      </div>
    </div>
  </div>

@endsection