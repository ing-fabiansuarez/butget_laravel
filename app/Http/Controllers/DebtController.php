<?php

namespace App\Http\Controllers;

use App\Enums\TypeDebts;
use App\Models\Debt;
use App\Http\Requests\DebtRequest;
use App\Repositories\DebtRepository;

/**
 * Class DebtController
 * @package App\Http\Controllers
 */
class DebtController extends Controller
{

    private $debtRepository;

    public function __construct(DebtRepository $debtRepository)
    {
        $this->debtRepository = $debtRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $debts = Debt::query()
        ->where('space_id', session('space_id'))
        ->latest()
        ->paginate();

        return view('debt.index', compact('debts'))
            ->with('i', (request()->input('page', 1) - 1) * $debts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $debt = new Debt();
        $typeDebts = TypeDebts::getAll();

        return view('debt.create', compact('debt','typeDebts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DebtRequest $request)
    {
        $request->validated();

        $this->debtRepository->create(session('space_id'), $request->all());

        return redirect()->route('debts.index')
            ->with('success', 'Debt created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $debt = Debt::find($id);

        return view('debt.show', compact('debt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $debt = Debt::find($id);
        $typeDebts = TypeDebts::getAll();
        return view('debt.edit', compact('debt','typeDebts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DebtRequest $request, Debt $debt)
    {
        $debt->update($request->validated());

        return redirect()->route('debts.index')
            ->with('success', 'Debt updated successfully');
    }

    public function destroy($id)
    {
        Debt::find($id)->delete();

        return redirect()->route('debts.index')
            ->with('success', 'Debt deleted successfully');
    }
}
