<?php
    
namespace App\Http\Controllers;
  
use App\Category;
use Illuminate\Http\Request;
//-----------------------------------------------------------------
 use App\Repositories\CategoryRepository;
 use App\Http\Requests\CategoryRequest;
  //-----------------------------------------------------------------
class CategorysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*
    protected $employerRepository;
    protected $nbrPerPage = 4;                                          //***
    public function __construct(CategoryRepository $CategoryRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->categoryRepository = $categoryRepository;
    } 
*/
    public function index()
    {
        $categorys = Category::all();
        return view('categorys.index',compact('categorys'));
$categorys = $this->categoryRepository->getPaginate($this->nbrPerPage);
$links = $clients->render();
return view('categorys.liste', compact('categorys', 'links'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorys.create');
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
        ]);
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]); 
        Category::create($inputs);
   
        return redirect()->route('categorys')
                        ->with('success','categorys created successfully.');
/*
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $this->categoryRepository->store($inputs);
        return redirect(route('categorys.index'));
*/  
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
            $category=Category::find($id) ;

        return view('categorys.show',compact('category'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorys  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $categorys=Category::find($id) ;

        return view('categorys.edit',compact('categorys'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',

        ]);
          $categorys=Category::find($id) ;

        $categorys->update($request->all());
  
        return redirect()->route('categorys')
                        ->with('success','categorys updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorys=Category::find($id) ;
        $categorys->delete();
  
        return redirect()->route('categorys')
                        ->with('success','categorys deleted successfully');
    }

 
    public function search( Request $request) {

        $request->validate([

            'q' => 'required'
        ]);


        $q = $request->q;

        $filteredCategorys = Category::where('name', 'like', '%' . $q . '%')
                                ->orWhere('detail', 'like', '%' . $q . '%')->get();

        if ($filteredCategorys->count()) {

            return view('categorys.index')->with([
                'categorys' =>  $filteredCategorys
            ]);
        } else {
            
            return redirect('/categorys')->with([
                'status' => 'La recherche a échoué, Veuillez réessayer'
            ]);
        }
        
    }
public function dropDownShow(Request $request)

{

   $categorys = Category::pluck('name', 'id');

   $selectedID = 2;

   return view('categorys.edit', compact('id', 'categorys'));

}
}           