<?php
	
namespace App\Repositories;

use App\Employer;

class EmployersRepository
{

    protected $employers;

    public function __construct(Employers $employers)
	{
		$this->employers = $employers;
	}

	public function getPaginate($n)
	{
		return $this->employers->with('user')
		->orderBy('employers.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{
		$this->employers->create($inputs);
	}

	public function destroy($id)
	{
		$this->employers->findOrFail($id)->delete();
	}

}