@extends('layout')

@section('title', __('models.debts'))

@section('body')

<div class="wrapper my-3">
    <div class="row mb-3">
        <div class="row__column row__column--middle">
            <h2>{{ __('models.debts') }}</h2>
        </div>
        <div class="row__column row__column--compact row__column--middle">
            <a href="{{ route('transactions.create') }}" class="button">{{ __('actions.create') }} {{ __('models.transactions') }}</a>
        </div>
    </div>
    <div class="row row--responsive">
        <div class="row__column mr-3" style="max-width: 300px;">
            <div class="box">
                <div class="box__section">
                    <div class="card">
                        <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                            <div class="float-left">
                                <span class="card-title">{{ __('Show') }} Debt</span>
                            </div>
                            <div class="float-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('debts.index') }}"> {{ __('Back') }}</a>
                            </div>
                        </div>

                        <div class="card-body bg-white">

                            <div class="form-group mb-2 mb20">
                                <strong>Type:</strong>
                                {{ $debt->type }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Amount:</strong>
                                {{ $debt->amount }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Description:</strong>
                                {{ $debt->description }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Who:</strong>
                                {{ $debt->Who }}
                            </div>
                            <div class="form-group mb-2 mb20">
                                <strong>Due Date:</strong>
                                {{ $debt->due_date }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row__column">
            @if ($yearMonths)
                @foreach ($yearMonths as $key => $transactions)
                    <h2 class="{{ key($yearMonths) != $key ? 'mt-3' : '' }} mb-2">{{ __('calendar.months.' . ltrim(explode('-', $key)[1], 0)) }}, {{ explode('-', $key)[0] }}</h2>
                    <div class="box">
                        @foreach ($transactions as $transaction)
                            <div class="box__section row row--responsive">
                                <div class="row__column row__column--middle row row--middle">
                                    <div v-pre>{{ $transaction->description }}</div>
                                    <a href="{{ route((get_class($transaction) === 'App\Models\Earning' ? 'earnings' : 'spendings') . '.show', [$transaction->id]) }}">
                                        <i class="fas fa-info-circle fa-xs c-light ml-1"></i>
                                    </a>
                                    <a href="{{ route((get_class($transaction) === 'App\Models\Earning' ? 'earnings' : 'spendings') . '.edit', [$transaction->id]) }}">
                                        <i class="fas fa-pencil fa-xs c-light ml-1"></i>
                                    </a>
                                    <form action="{{ route((get_class($transaction) === 'App\Models\Earning' ? 'earnings' : 'spendings') . '.destroy', [$transaction->id]) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="button link">
                                            <i class="fas fa-trash fa-xs c-light ml-1"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="row__column">
                                    @if ($transaction->tag)
                                        <div class="row">
                                            <div class="row__column row__column--compact row__column--middle mr-05" style="font-size: 12px;">
                                                <i class="fas fa-tag" style="color: #{{ $transaction->tag->color }};"></i>
                                            </div>
                                            <div class="row__column row__column--compact row__column--middle" v-pre>{{ $transaction->tag->name }}</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row__column">
                                    @if ($transaction->happened_on)
                                        <div class="row">
                                            <div class="row__column row__column--compact row__column--middle mr-05" style="font-size: 12px;">
                                                <i class="fas fa-calendar" ></i>
                                            </div>
                                            <div class="row__column row__column--compact row__column--middle" v-pre>{{ $transaction->happened_on }}</div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row__column row__column--compact w-20">
                                    @if ($transaction->recurring_id)
                                        <i class="fas fa-recycle"></i>
                                    @endif
                                </div>
                                <div class="row__column row__column--compact row__column--middle w-150 row row--middle row--right {{ get_class($transaction) == 'App\Models\Earning' ? 'color-green' : 'color-red' }}">
                                    <div class="row__column row__column--compact">{!! $currency !!} {{ $transaction->formatted_amount }}</div>
                                    <div class="row__column row__column--compact ml-1">
                                        @if (get_class($transaction) == 'App\Models\Earning')
                                            <i class="fas fa-arrow-alt-left fa-sm"></i>
                                        @else
                                            <i class="fas fa-arrow-alt-right fa-sm"></i>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @else
                <div class="box">
                    @include('partials.empty_state', ['payload' => 'transactions'])
                </div>
            @endif
        </div>
    </div>
</div>




@endsection
