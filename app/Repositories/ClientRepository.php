<?php
	
namespace App\Repositories;

use App\Client;

class ClientRepository
{

    protected $client;

    public function __construct(Client $clients)
	{
		$this->client = $client;
	}

	public function getPaginate($n)
	{
		return $this->client->with('user')
		->orderBy('clients.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{
		$this->client->create($inputs);
	}

	public function destroy($id)
	{
		$this->client->findOrFail($id)->delete();
	}

}