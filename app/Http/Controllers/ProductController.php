<?php
        
namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Categorys;  

//-----------------------------------------------------------------
 use App\Repositories\ProductRepository;
 use App\Http\Requests\ProductRequest;
//-----------------------------------------------------------------

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

/*
    protected $clientsRepository;
    protected $nbrPerPage = 4;
    public function __construct(ProductRepository $ProductRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->productsRepository = $productsRepository;  //---
    } 
*/

    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
$products = $this->productRepository->getPaginate($this->nbrPerPage);
$links = $products->render();
return view('products.liste', compact('products', 'links'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all(['id','name']);
    return view('products.create',compact('categories'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'prix' => 'required',
        ]);
        
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]); 
        Product::create($inputs);
   
        return redirect()->route('products')
                        ->with('success','Product created successfully.');

/*
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $this->productRepository->store($inputs);   //--
        return redirect(route('products.index'));
*/
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
                        $product=Product::find($id) ;

        return view('products.show',compact('product'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $product=Product::find($id) ;

        return view('products.edit',compact('product'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'prix' => 'required',

        ]);
          $product=Product::find($id) ;

        $product->update($request->all());
  
        return redirect()->route('products')
                        ->with('success','Product updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id) ;
        $product->delete();
  
        return redirect()->route('products')
                        ->with('success','Product deleted successfully');
    }
    public function search( Request $request) {

        $request->validate([

            'q' => 'required'
        ]);


        $q = $request->q;

        $filteredProduct = Product::where('name', 'like', '%' . $q . '%')
                                ->orWhere('detail', 'like', '%' . $q . '%')->get();

        if ($filteredProduct->count()) {

            return view('products.index')->with([
                'products' =>  $filteredProduct
            ]);
        } else {
            
            return redirect('/products')->with([
                'status' => 'La recherche a échoué, Veuillez réessayer'
            ]);
        }
        
    }
} 