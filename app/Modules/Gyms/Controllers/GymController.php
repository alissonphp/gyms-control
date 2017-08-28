<?php

namespace App\Modules\Gyms\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Gyms\Models\Gym;
use App\Modules\Gyms\Models\GymInfos;
use Illuminate\Http\Request;

/**
 * Class GymController
 * @package App\Modules\Gyms\Controllers
 */
class GymController extends Controller
{

    /**
     * @var Gym
     */
    protected $model;

    /**
     * GymController constructor.
     * @param Gym $gym
     */
    public function __construct(Gym $gym)
    {
        $this->model = $gym;
    }

    /**
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function index()
    {
        try {
            return response($this->model->all() ,200);
        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function store(Request $request)
    {
        try {

            $this->model->create($request->all());
            return response()->json(['message' => 'gym_created']);

        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    public function infos(Request $request)
    {
        try {

            GymInfos::create($request->all());

            return response()->json(['message' => 'gym_infos_created']);

        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        try {

            $this->model->find($id)->delete();
            return response()->json(['message' => 'gym_deleted']);

        } catch (\Exception $ex) {
            return response($ex->getMessage(), 500);
        }
    }

}