<div>
    <div class="mb-1">
        <label for="transactionType" class="block text-gray-700 mb-1">Transaction Type</label>
        <select id="transactionType" wire:model="transactionType"
            style="border: 1px solid #D1D5DB; border-radius: 0.375rem; padding: 0.5rem; width: 100%; transition: border-color 0.15s ease-in-out;">
            <option value="">--- Seleccione tipo de transacción ---</option>
            <option value="earning">Earning</option>
            <option value="spending">Spending</option>
        </select>
    </div>

    <div class="mb-1 flex space-x-2">
        <button type="button"
            style="background-color: #38A169; color: white; font-weight: 600; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; transition: background-color 0.15s ease-in-out; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#2F855A';"
            onmouseout="this.style.backgroundColor='#38A169';">Earning</button>

        <button type="button"
            style="background-color: #E53E3E; color: white; font-weight: 600; padding: 0.5rem 1rem; border-radius: 0.375rem; border: none; transition: background-color 0.15s ease-in-out; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#C53030';"
            onmouseout="this.style.backgroundColor='#E53E3E';">Spending</button>
    </div>

    <div class="mb-1">
        <label for="tags" class="block text-gray-700 mb-1">Tag</label>
        <select id="tags" wire:model="selectedTag"
            style="border: 1px solid #D1D5DB; border-radius: 0.375rem; padding: 0.5rem; width: 100%; transition: border-color 0.15s ease-in-out;">
            <option value="">------- Seleccione un tag ------- </option>
            @foreach ($tags as $tag)
                <option value="{{ $tag['key'] }}">{!! $tag['label'] !!}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-1">
        <label for="date" class="block text-gray-700 mb-1">Date</label>
        <input type="date" id="date" wire:model="date"
            style="border: 1px solid #D1D5DB; border-radius: 0.375rem; padding: 0.5rem; width: 100%; transition: border-color 0.15s ease-in-out;" />
    </div>

    <div class="mb-1">
        <label for="description" class="block text-gray-700 mb-1">Description</label>
        <input type="text" id="description" wire:model="description"
            style="border: 1px solid #D1D5DB; border-radius: 0.375rem; padding: 0.5rem; width: 100%; transition: border-color 0.15s ease-in-out;" />
    </div>

    <div class="mb-1">
        <label for="amount" class="block text-gray-700 mb-1">Amount</label>
        <input type="number" id="amount" wire:model="amount"
            style="border: 1px solid #D1D5DB; border-radius: 0.375rem; padding: 0.5rem; width: 100%; transition: border-color 0.15s ease-in-out;" />
    </div>

    <div class="mb-1">
        <label for="currency" class="block text-gray-700 mb-1">Currency</label>
        <select id="currency" wire:model="currency"
            style="border: 1px solid #D1D5DB; border-radius: 0.375rem; padding: 0.5rem; width: 100%; transition: border-color 0.15s ease-in-out;">
            <option value="">Seleccione una moneda</option>
            <option value="usd">USD</option>
            <option value="eur">EUR</option>
            <option value="cop">COP</option>
        </select>
    </div>

    <div class="mb-1">
        <button type="submit"
            style="background-color: #3B82F6; color: white; font-weight: 600; padding: 0.5rem 1rem; border-radius: 0.375rem; transition: background-color 0.15s ease-in-out; cursor: pointer;"
            onmouseover="this.style.backgroundColor='#2563EB';"
            onmouseout="this.style.backgroundColor='#3B82F6';">Submit</button>
    </div>
</div>
