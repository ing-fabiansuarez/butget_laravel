<?php

namespace App\Livewire;

use Livewire\Component;

class CreateTransaction extends Component
{
    public $type;
    public $tags;
    public $currencies;
    public $defaultTransactionType;
    public $firstDayOfWeek;
    public $defaultCurrencyId;
    public $recurringsIntervals;

    public $tag;
    public $date;
    public $description;
    public $amount = '10.00';
    public $selectedCurrencyId;
    public $isRecurring = false;
    public $recurringInterval = 'monthly';
    public $recurringEnd = 'forever';
    public $recurringEndDate;

    public $loading = false;
    public $success = false;
    public $errors = [];

    public function mount($tags, $currencies, $defaultTransactionType, $firstDayOfWeek, $defaultCurrencyId, $recurringsIntervals)
    {
        $this->tags = $tags;
        $this->currencies = $currencies;
        $this->defaultTransactionType = $defaultTransactionType;
        $this->firstDayOfWeek = $firstDayOfWeek;
        $this->defaultCurrencyId = $defaultCurrencyId;
        $this->recurringsIntervals = $recurringsIntervals;
        $this->type = $this->defaultTransactionType;
        $this->date = now()->format('Y-m-d');
        $this->recurringEndDate = now()->addDays(100)->format('Y-m-d');
    }

    public function switchType($type)
    {
        $this->type = $type;
        $this->success = false;
    }

    public function createTransaction()
    {
        $this->loading = true;

        $this->validate([
            'date' => 'required|date',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'selectedCurrencyId' => 'required',
            'tag' => 'nullable'
        ]);

        // Lógica para guardar la transacción en base de datos.
        // Redirige o muestra mensaje de éxito.

        $this->loading = false;
        $this->success = true;
    }

    public function render()
    {
        //dd($this->tags);
        return view('livewire.create-transaction');
    }
}
