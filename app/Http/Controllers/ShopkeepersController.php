<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateShopkeepersRequest;
use App\Http\Requests\UpdateShopkeepersRequest;
use App\Repositories\ShopkeepersRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ShopkeepersController extends AppBaseController
{
    /** @var  ShopkeepersRepository */
    private $shopkeepersRepository;

    public function __construct(ShopkeepersRepository $shopkeepersRepo)
    {
        $this->shopkeepersRepository = $shopkeepersRepo;
    }

    /**
     * Display a listing of the Shopkeepers.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $shopkeepers = $this->shopkeepersRepository->all();

        return view('shopkeepers.index')
            ->with('shopkeepers', $shopkeepers);
    }

    /**
     * Show the form for creating a new Shopkeepers.
     *
     * @return Response
     */
    public function create()
    {
        return view('shopkeepers.create');
    }

    /**
     * Store a newly created Shopkeepers in storage.
     *
     * @param CreateShopkeepersRequest $request
     *
     * @return Response
     */
    public function store(CreateShopkeepersRequest $request)
    {
        $input = $request->all();

        $shopkeepers = $this->shopkeepersRepository->create($input);

        Flash::success('Shopkeepers saved successfully.');

        return redirect(route('shopkeepers.index'));
    }

    /**
     * Display the specified Shopkeepers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $shopkeepers = $this->shopkeepersRepository->find($id);

        if (empty($shopkeepers)) {
            Flash::error('Shopkeepers not found');

            return redirect(route('shopkeepers.index'));
        }

        return view('shopkeepers.show')->with('shopkeepers', $shopkeepers);
    }

    /**
     * Show the form for editing the specified Shopkeepers.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $shopkeepers = $this->shopkeepersRepository->find($id);

        if (empty($shopkeepers)) {
            Flash::error('Shopkeepers not found');

            return redirect(route('shopkeepers.index'));
        }

        return view('shopkeepers.edit')->with('shopkeepers', $shopkeepers);
    }

    /**
     * Update the specified Shopkeepers in storage.
     *
     * @param int $id
     * @param UpdateShopkeepersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateShopkeepersRequest $request)
    {
        $shopkeepers = $this->shopkeepersRepository->find($id);

        if (empty($shopkeepers)) {
            Flash::error('Shopkeepers not found');

            return redirect(route('shopkeepers.index'));
        }

        $shopkeepers = $this->shopkeepersRepository->update($request->all(), $id);

        Flash::success('Shopkeepers updated successfully.');

        return redirect(route('shopkeepers.index'));
    }

    /**
     * Remove the specified Shopkeepers from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $shopkeepers = $this->shopkeepersRepository->find($id);

        if (empty($shopkeepers)) {
            Flash::error('Shopkeepers not found');

            return redirect(route('shopkeepers.index'));
        }

        $this->shopkeepersRepository->delete($id);

        Flash::success('Shopkeepers deleted successfully.');

        return redirect(route('shopkeepers.index'));
    }
}
