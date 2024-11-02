@extends('layout')

@section('title', __('actions.create') . ' Transaction')

@section('body')
    <div class="wrapper mw-400 my-3">
        <h2 class="mb-3">{{ __('actions.create') }} Transaction</h2>

        @livewire('create-transaction', [
            'tags' => $tags,
            'currencies' => $currencies,
            'defaultTransactionType' => 'earning',
            'firstDayOfWeek' => 1,
            'defaultCurrencyId' => 1,
            'recurringsIntervals' => ['monthly', 'weekly', 'yearly'],
        ])
    </div>
@endsection
