@csrf
<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
    <div class="md:col-span-5">
        
        <label for="name">Forma de Pagamento</label>
        <select name="payment_method" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" x-model="payment_method"  x-on:change="payment_method = $event.target.value">
            <option value="BOLETO" @selected(old('payment_method') == "BOLETO")>Boleto</option>
            <option value="CREDIT_CARD" @selected(old('payment_method') == "CREDIT_CARD")>Cartão</option>
            <option value="PIX"  @selected(old('payment_method') == "PIX")>Pix</option>
        </select>
    </div>
    <div class="md:col-span-5">
        <label for="name">Nome completo</label>
        <input type="text" name="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('name') }}" placeholder="Seu nome"/>
        @error('name')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-5">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('email') }}" placeholder="exemplo@email.com" />
        @error('email')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-3">
        <label for="cpfCnpj">Cpf</label>
        <input type="text" name="cpfCnpj" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('cpfCnpj') }}" x-mask="99999999999" placeholder="Somente os números" />
        @error('cpfCnpj')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('phone') }}" x-mask="(99) 99999-9999" placeholder="(00) 00000-0000" />
        @error('phone')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5" x-show="payment_method == 'CREDIT_CARD'">
    <div class="md:col-span-5 mt-4">
        <hr class="mb-4"/>
        <h2>Dados do Cartão</h2>
    </div>

    <div class="md:col-span-5">
        <div class="md:col-span-5">
            <label for="holderName">Nome Impresso no Cartão</label>
            <input type="text" name="holderName" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Nome conforme aparece no cartão"/>
            @error('holderName')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="md:col-span-2">
        <label for="card_number">Número do Cartão</label>
        <input type="text" name="card_number" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Número do cartão" />
        @error('card_number')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="card_expiry">Expiração (MM/AAAA)</label>
        <input type="text" name="card_expiry"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" x-mask="99/9999" placeholder="MM/AAAA" />
        @error('card_expiry')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-1">
        <label for="ccv">CCV</label>
        <input type="text" name="ccv"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="123" x-mask="999" />
        @error('ccv')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-5 mt-4">
        <hr class="mb-4"/>
        <h2>Dados do Titular</h2>
    </div>

    <div class="md:col-span-5">
        <label for="name_titular">Nome do Titular do Cartão</label>
        <input type="text" name="name_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Nome do titular"/>
        @error('name_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-5">
        <label for="email_titular">E-mail do Titular do Cartão</label>
        <input type="email" name="email_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="E-mail do titular" />
        @error('email_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-3">
        <label for="cpfCnpj_titular">Cpf do Titular</label>
        <input type="text" name="cpfCnpj_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" x-mask="99999999999" placeholder="Cpf do titular" />
        @error('cpfCnpj_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="phone_titular">Telefone do Titular</label>
        <input type="text" name="phone_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" x-mask="(99) 99999-9999" placeholder="(00) 00000-0000"/>
        @error('phone_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-3">
        <label for="cep_titular">CEP do Titular</label>
        <input type="text" name="cep_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="CEP do titular"/>
        @error('cep_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="residencia_titular">Número da Residência do Titular</label>
        <input type="text" name="residencia_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="Numero da Residência"/>
        @error('residencia_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    
</div>

<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5 mt-4">
    <div class="md:col-span-5 text-right">
        <div class="inline-flex items-end">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Pagar</button>
        </div>
    </div>
</div>

<script>
    window.payment_method = '{{ old('payment_method', 'option1') }}'; // Defina um valor padrão caso não haja valor antigo.
</script>


