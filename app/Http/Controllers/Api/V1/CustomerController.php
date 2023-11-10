<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\V1\CustomerStoreRequrest;
use App\Http\Requests\V1\CustomerUpdateRequest;
use App\Http\Resources\V1\CustomerCollection;
use App\Services\V1\CustomerFillter;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, CustomerFillter $customerFillter)
    {
        $queryItems =  $customerFillter->transform($request);
        $icludeInvoices = $request->query('icludeInvoices');
        $customer = Customer::where($queryItems);

            if($icludeInvoices){
                $customer = $customer->with('invoices');
            }
            return new CustomerCollection($customer->paginate()->appends($request->query()));

    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequrest $request)
    {

        Customer::create($request->all());

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request ,Customer $customer)
    {
        $icludeInvoices = $request->query('icludeInvoices');

        if($icludeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));
        }
        return new CustomerResource($customer);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
