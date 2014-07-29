<?php

class ListController extends BaseController {

	public function create()
	{
		$user = Auth::user();
		$newListForm = new NewListForm(Input::all());
		$list = TaskList::newTaskList($newListForm, $user);

		$response = array('state' => false, 'id' => 0, 'name' => '');
		if($list)
		{
			$response['state'] = true;
			$response['id'] = $list->id;
			$response['name'] = $list->name;
		}
		return Response::json($response);
	}

	public function content()
	{

		$response = array('state' => true, 
			'tasks' => 'list_'.Input::get('id').' --- '.(Input::has('dataset') ? Input::get('dataset') : 'today')
			);
		return Response::json($response);
	}
}