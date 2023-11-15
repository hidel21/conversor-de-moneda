<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Http;


use Livewire\Component;

class CurrencyConverter extends Component
{
    public $amount;
    public $fromCurrency = 'USD';
    public $toCurrency = 'EUR';
    public $convertedAmount;

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'amount' => 'required|numeric|min:0.01',
            'fromCurrency' => 'required',
            'toCurrency' => 'required'
        ]);
    
        if ($this->amount && $this->fromCurrency && $this->toCurrency) {
            $this->convertCurrency();
        }
    }
    

    public function mount()
{
    session()->put('conversion_count', session('conversion_count', 0));
}

private function loadCurrencies()
{
    try {
        $apiUrl = env('CURRENCY_LAYER_API_URL', 'http://apilayer.net/api/') . 'list';
        $apiKey = env('CURRENCY_LAYER_API_KEY');

        $response = Http::get($apiUrl, ['access_key' => $apiKey]);

        if ($response->successful()) {
            $data = $response->json();
            if (isset($data['currencies'])) {
                return array_keys($data['currencies']);
            } else {
                throw new \Exception('La respuesta de la API no contiene la lista de monedas.');
            }
        } else {
            throw new \Exception('No se pudo obtener la lista de monedas de la API.');
        }
    } catch (\Exception $e) {
        error_log('Error al cargar monedas: ' . $e->getMessage());
        return [];
    }
}



public function convert()
{
    if (session('conversion_count') >= 5) {
        session()->flash('error', 'Has superado el límite diario de conversiones.');
        return;
    }

    $this->validate([
        'amount' => 'required|numeric|min:0.01',
        'fromCurrency' => 'required',
        'toCurrency' => 'required'
    ]);

    try {
        $apiUrl = env('CURRENCY_LAYER_API_URL', 'http://apilayer.net/api/') . 'live';
        $apiKey = env('CURRENCY_LAYER_API_KEY');

        $response = Http::get($apiUrl, [
            'access_key' => $apiKey,
            'currencies' => $this->toCurrency,
            'source' => $this->fromCurrency,
            'format' => 1
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $key = "USD" . $this->toCurrency;
            $rate = $data['quotes'][$key];
            $this->convertedAmount = $this->amount * $rate;

            // Registrar la conversión en la base de datos
            Conversion::create([
                'amount' => $this->amount,
                'from_currency' => $this->fromCurrency,
                'to_currency' => $this->toCurrency,
                'converted_amount' => $this->convertedAmount,
            ]);
        } else {
            throw new \Exception('Error al obtener las tasas de cambio.');
        }
    } catch (\Exception $e) {
        session()->flash('error', $e->getMessage());
    }

    session()->increment('conversion_count');
}

public function render()
{
    $currencies = $this->loadCurrencies();

    return view('livewire.currency-converter', compact('currencies'));
}
    
}
