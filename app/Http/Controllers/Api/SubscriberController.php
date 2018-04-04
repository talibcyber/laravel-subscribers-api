<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberResource;
use App\Http\Resources\SubscriberResourceCollection;

use App\Models\Subscriber;
use Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$dataList = new SubscriberResourceCollection(Subscriber::get());
		//$dataList = new SubscriberResourceCollection(Subscriber::paginate(10));
		
		$this->apiResponse['success'] = true;
		$this->apiResponse['data'] = $dataList->resource;
		return $this->apiResponse;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$postData = $request->all();
		
		$validator = Validator::make($postData, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:subscribers,email|max:100',
			'state' => 'required',
        ]);
		if ($validator->fails()){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
			$this->apiResponse['errors'] = $validator->errors()->all();
			return $this->apiResponse;
        }
		$dataInfo = Subscriber::create($postData);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
		}

		$this->apiResponse['success'] = true;
		$this->apiResponse['message'] = "Data created successfully";
		$this->apiResponse['data'] = new SubscriberResource($dataInfo);
		
		return $this->apiResponse;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$dataInfo = Subscriber::find($id);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Data not found";
			return $this->apiResponse;
		}
		
		$this->apiResponse['success'] = true;
		$this->apiResponse['data'] = new SubscriberResource($dataInfo);
		
		return $this->apiResponse;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$dataInfo = Subscriber::find($id);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Data does not exists";
			return $this->apiResponse;
		}
		
		$postData = $request->all();
		
		$validator = Validator::make($postData, [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:subscribers,email,'.$dataInfo->id.'|max:100',
			'state' => 'required',
        ]);
		if ($validator->fails()){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
			$this->apiResponse['errors'] = $validator->errors()->all();
			return $this->apiResponse;
        }
		
		$dataInfo->name = $postData['name'];
		$dataInfo->email = $postData['email'];
		//$dataInfo->state = $postData['state'];
		
		if(!$dataInfo->save()){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
			return $this->apiResponse;
		}

		$this->apiResponse['success'] = true;
		$this->apiResponse['message'] = 'Data updated successfully';
		$this->apiResponse['data'] = new SubscriberResource($dataInfo);
		
		return $this->apiResponse;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$dataInfo = Subscriber::find($id);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Data does not exists";
			return $this->apiResponse;
		}
		if(!$dataInfo->delete()){
			$this->apiResponse['message'] = "Sorry!, unable to delete the data";
			return $this->apiResponse;
		}
		
        $this->apiResponse['success'] = true;
		$this->apiResponse['message'] = 'Data deleted successfully';
		
		return $this->apiResponse;
    }
}
