<?php

namespace SON\Http\Controllers;

use Illuminate\Http\Request;

use SON\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use SON\Http\Requests\BillpayCreateRequest;
use SON\Http\Requests\BillpayUpdateRequest;
use SON\Repositories\BillpayRepository;
use SON\Validators\BillpayValidator;


class BillpaysController extends Controller
{

    /**
     * @var BillpayRepository
     */
    protected $repository;

    /**
     * @var BillpayValidator
     */
    protected $validator;

    public function __construct(BillpayRepository $repository, BillpayValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $billpays = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $billpays,
            ]);
        }

        return view('billpays.index', compact('billpays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BillpayCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BillpayCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $billpay = $this->repository->create($request->all());

            $response = [
                'message' => 'Billpay created.',
                'data'    => $billpay->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $billpay = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $billpay,
            ]);
        }

        return view('billpays.show', compact('billpay'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $billpay = $this->repository->find($id);

        return view('billpays.edit', compact('billpay'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BillpayUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(BillpayUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $billpay = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'Billpay updated.',
                'data'    => $billpay->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Billpay deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Billpay deleted.');
    }
}
