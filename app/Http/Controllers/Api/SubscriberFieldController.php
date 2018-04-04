<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriberFieldResource;
use App\Http\Resources\SubscriberFieldResourceCollection;

use App\Models\Subscriber;
use App\Models\SubscriberField;
use Validator;

class SubscriberFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$dataList = new SubscriberFieldResourceCollection(SubscriberField::get());
		//$dataList = new SubscriberResourceCollection(SubscriberField::paginate(10));
		
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
            'title' => 'required|unique:subscriber_fields,title|max:100',
            'type' => 'required|max:50',
        ]);
		if ($validator->fails()){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
			$this->apiResponse['errors'] = $validator->errors()->all();
			return $this->apiResponse;
        }
		$dataInfo = SubscriberField::create($postData);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
		}

		$this->apiResponse['success'] = true;
		$this->apiResponse['message'] = "Data created successfully";
		$this->apiResponse['data'] = new SubscriberFieldResource($dataInfo);
		
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
		$dataInfo = SubscriberField::find($id);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Data not found";
			return $this->apiResponse;
		}
		
		$this->apiResponse['success'] = true;
		$this->apiResponse['data'] = new SubscriberFieldResource($dataInfo);
		
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
		$dataInfo = SubscriberField::find($id);
		if(!$dataInfo){
			$this->apiResponse['message'] = "Data does not exists";
			return $this->apiResponse;
		}
		
		$postData = $request->all();
		
		$validator = Validator::make($postData, [
            'title' => 'required|unique:subscribers,email,'.$dataInfo->id.'|max:100',
            'type' => 'required|max:50',
        ]);
		if ($validator->fails()){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
			$this->apiResponse['errors'] = $validator->errors()->all();
			return $this->apiResponse;
        }
		
		$dataInfo->title = $postData['title'];
		$dataInfo->type = $postData['type'];
		
		if(!$dataInfo->save()){
			$this->apiResponse['message'] = "Sorry!, unable to process your request";
			return $this->apiResponse;
		}

		$this->apiResponse['success'] = true;
		$this->apiResponse['message'] = 'Data updated successfully';
		$this->apiResponse['data'] = new SubscriberFieldResource($dataInfo);
		
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
		$dataInfo = SubscriberField::find($id);
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
