<?php

class TaskList extends Eloquent {

	protected $table = 'tp_lists';
	
	const important = 'important';
	const urgent    = 'urgent';
	const date      = 'date';
	const custom    = 'custom';

	public static function createByForm(NewListForm $newListForm, User $user)
	{
		if($newListForm->isValid())
		{
			$list           = new TaskList();
			$list->user_id  = $user->id;
			$list->name     = $newListForm->name;
			$list->priority = $user->taskLists()->count();
			$list->sort_by  = 'important';
			$list->version  = 0;
			$list->save();
			return $list;
		}
	}

	public static function updatePriorityById($id, $priority)
	{
		TaskList::where('id', '=', $id)->increment('version', 1, array('priority' => $priority));
	}

	public static function getById($id)
	{
		return TaskList::where('id', '=', $id)->first();
	}

	public static function updateByForm(ListSettingForm $listSettingForm)
	{
		if(!$listSettingForm->isValid())
		{
			$taskList = TaskList::where('id', '=', $listSettingForm->id)->first();
			$taskList->name    = $listSettingForm->name;
			$taskList->sort_by = $listSettingForm->sortBy;
			$taskList->color   = $listSettingForm->color;
			$taskList->version++;
			$taskList->save();
			return true;
		}
		return false;
	}

	public static function softDeleteById($listId)
	{
		if($listId)
		{
			TaskList::destroy($listId);
			return true;
		}

		return false;
	}
}