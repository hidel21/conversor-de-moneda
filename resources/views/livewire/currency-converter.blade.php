<style>
    /* Estilos para el conversor de monedas */
.currency-converter {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.currency-converter input, .currency-converter select, .currency-converter button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

.currency-converter button {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

.currency-converter button:hover {
    background-color: #45a049;
}

.alert {
    padding: 10px;
    background-color: #f44336;
    color: white;
    margin-bottom: 15px;
}

.alert-danger {
    background-color: #f44336;
}

.converted-amount {
    font-size: 1.2em;
    font-weight: bold;
}

</style>

<div class="currency-converter">
    <!-- Campo de cantidad -->
    <input type="number" wire:model.lazy="amount" placeholder="Amount" class="form-control">
    @error('amount') <span class="error">{{ $message }}</span> @enderror

    <!-- Seleccionar moneda de origen -->
    <select wire:model.lazy="fromCurrency" class="form-control">
        @foreach($currencies as $currencyCode => $currencyName)
            <option value="{{ $currencyCode }}">{{ $currencyName }}</option>
        @endforeach
    </select>
    @error('fromCurrency') <span class="error">{{ $message }}</span> @enderror

    <!-- Seleccionar moneda de destino -->
    <select wire:model.lazy="toCurrency" class="form-control">
        @foreach($currencies as $currencyCode => $currencyName)
            <option value="{{ $currencyCode }}">{{ $currencyName }}</option>
        @endforeach
    </select>
    @error('toCurrency') <span class="error">{{ $message }}</span> @enderror

    <button wire:click="convert" class="btn btn-primary">Convert</button>
    <!-- Spinner para feedback visual -->
    <div wire:loading wire:target="convert" class="spinner">Cargando...</div>

    <!-- Resultado de la conversión -->
    @if($convertedAmount)
        <p class="converted-amount">Converted Amount: {{ $convertedAmount }}</p>
    @endif

    <!-- Mensajes de error -->
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>


