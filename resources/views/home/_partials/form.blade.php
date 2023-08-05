@csrf
<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
    <div class="md:col-span-5">
        <label for="name">Forma de Pagamento</label>
        <select name="payment_method" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">
            <option value="BOLETO">Boleto</option>
            <option value="CREDIT_CARD">Cartão</option>
            <option value="PIX">Pix</option>
        </select>
    </div>
    <div class="md:col-span-5">
        <label for="name">Nome completo</label>
        <input type="text" name="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="Lucas Silvério e Sousa" />
    </div>

    <div class="md:col-span-5">
        <label for="email">E-mail</label>
        <input type="text" name="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="lucas.silveriosousa@gmail.com" placeholder="email@domain.com" />
    </div>

    <div class="md:col-span-3">
        <label for="cpfCnpj">Cpf</label>
        <input type="text" name="cpfCnpj" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="08322284608" placeholder="" />
    </div>

    <div class="md:col-span-2">
        <label for="phone">Telefone</label>
        <input type="text" name="phone"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="34996960659" placeholder="" />
    </div>

    <div class="md:col-span-5 mt-4">
        <hr class="mb-4"/>
        <h2>Dados do Cartão</h2>
    </div>

    <div class="md:col-span-5">
        <div class="md:col-span-5">
            <label for="holderName">Nome Impresso no Cartão</label>
            <input type="text" name="holderName" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
            @error('holderName')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="md:col-span-2">
        <label for="card_number">Número do Cartão</label>
        <input type="text" name="card_number" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
        @error('card_number')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="card_expiry">Expiração (MM/AAAA)</label>
        <input type="text" name="card_expiry"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
        @error('card_expiry')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-1">
        <label for="cvv">CVV</label>
        <input type="text" name="cvv"  class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" placeholder="" />
        @error('cvv')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-5 mt-4">
        <hr class="mb-4"/>
        <h2>Dados do Titular</h2>
    </div>

    <div class="md:col-span-5">
        <label for="name_titular">Nome do Titular do Cartão</label>
        <input type="text" name="name_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
        @error('name_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-5">
        <label for="email_titular">E-mail do Titular do Cartão</label>
        <input type="text" name="email_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
        @error('email_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-3">
        <label for="cpfCnpj_titular">Cpf do Titular</label>
        <input type="text" name="cpfCnpj_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
        @error('cpfCnpj_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:col-span-2">
        <label for="phone_titular">Telefone do Titular</label>
        <input type="text" name="phone_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
        @error('phone_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-3">
        <label for="cep_titular">CEP do Titular</label>
        <input type="text" name="cep_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
        @error('cep_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>

    <div class="md:col-span-2">
        <label for="residencia_titular">Número da Residência do Titular</label>
        <input type="text" name="residencia_titular" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
        @error('residencia_titular')
            <div class="text-red-600">{{ $message }}</div>
        @enderror
    </div>
   
    <div class="md:col-span-5 text-right">
        <div class="inline-flex items-end">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Pagar</button>
        </div>
    </div>

</div>
