<?php

namespace App\Http\Controllers\Admin\Finance;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Finance\ReceiptRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptAccountController extends Controller
{

    protected $receipt;

    public function __construct(ReceiptRepositoryInterface $receipt)
    {
        $this->receipt = $receipt;
    }

    public function index()
    {
        return $this->receipt->index();
    }


    public function create()
    {
        return $this->receipt->create();
    }


    public function store(Request $request)
    {
        return $this->receipt->store($request);
    }


    public function show(string $id)
    {
        return $this->receipt->show($id);
    }


    public function edit(string $id)
    {
        return $this->receipt->edit($id);
    }


    public function update(Request $request)
    {
        return $this->receipt->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->receipt->destroy($request);
    }
}