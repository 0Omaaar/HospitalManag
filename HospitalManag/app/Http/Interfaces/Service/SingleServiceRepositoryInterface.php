<?php

namespace App\Http\Interfaces\Service;

interface SingleServiceRepositoryInterface{
    public function index();

    public function store($request);

    public function update($request);

    public function destroy($request);
}
