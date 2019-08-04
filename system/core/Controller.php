<?php
class Controller
{
	public function view($view, $data = array())
	{
		foreach ($data as $key => $value) {
			$$key = $value;
		}
		require 'aplication/views/'.$view.'.php';
	}

	public function model($model)
	{
		require 'aplication/models/'.$model.'.php';
		return new $model;
	}
}