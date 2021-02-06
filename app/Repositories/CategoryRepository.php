<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository
{

    protected $categorys;

    public function __construct(Category $categorys)
	{
		$this->categorys = $categorys;
	}

	public function getPaginate($n)
	{
		return $this->categorys->with('user')
		->orderBy('categorys.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{
		$this->categorys->create($inputs);
	}

	public function destroy($id)
	{
		$this->categorys->findOrFail($id)->delete();
	}

}