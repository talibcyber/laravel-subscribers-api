<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\SubscriberResource;

class SubscriberResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
	 
	public function toArray($request)
    {
		return [
            'data' => SubscriberResource::collection($this->collection)
        ];
		/*
		return [
            'data' => $this->collection->transform(function($data){
                return [
                    'id' => $data->id,
                    'name' => $data->name,
                    'email' => $data->email,
                ];
            }),
        ];
		*/
    }
	 /*
    public function toArray($request)
    {
        //return parent::toArray($request);
		
		//return [
            //'data' => SubscriberResource::collection($this->collection),
        //];
		
		return SubscriberResource::collection($this->collection);
    }
	*/
	/*
	public function with($request)
    {
        return [
            'version' => '1.0',
            'success' => true,
        ];
    }
	*/
}
