<?php

namespace App\Repositories;

use App\Product;

class ProductRepository
{

    protected $products;

    public function __construct(Product $products)
	{
		$this->products = $products;
	}

	public function getPaginate($n)
	{
		return $this->products->with('user')
		->orderBy('products.created_at', 'desc')
		->paginate($n);
	}

	public function store($inputs)
	{
		$this->products->create($inputs);
	}

	public function destroy($id)
	{
		$this->products->findOrFail($id)->delete();
	}

}