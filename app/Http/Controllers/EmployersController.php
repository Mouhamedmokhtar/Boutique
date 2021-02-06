<?php
    
namespace App\Http\Controllers;
  
use App\Employer;
use Illuminate\Http\Request;
  /*
 use App\Repositories\EmployersRepository;
 use App\Http\Requests\EmployersRequest;
 */
class EmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*
    protected $employersRepository;
     protected $nbrPerPage = 4;
    public function __construct(EmployersRepository $EmployersRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);

        $this->employersRepository = $employersRepository;
    } 
*/



    public function index()
    {
        $employers = Employer::all();
  
        return view('employers.index',compact('employers'));

    $employers = $this->employersRepository->getPaginate($this->nbrPerPage);
    $links = $employers->render();
    return view('employers.liste', compact('employers', 'links'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employers.create');
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
            'commentaire' => 'required',
            'embauchement' => 'required',
        ]);
          $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]); 

        Employer::create($inputs);
   
        return redirect()->route('employers')
                        ->with('success','Employers created successfully.');
/*
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $this->employersRepository->store($inputs);
        return redirect(route('employers.index'));
*/
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Employers  $employers
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
                        $employers=Employer::find($id) ;

        return view('employers.show',compact('employers'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employers  $employers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $employers=Employer::find($id) ;

        return view('employers.edit',compact('employers'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employers  $employers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
            'embauchement' => 'required',
            'commentaire' => 'required',


        ]);
          $employers=Employer::find($id) ;

        $employers->update($request->all());
  
        return redirect()->route('employers')
                        ->with('success','Employers updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\employers  $employers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employers=Employer::find($id) ;
        $employers->delete();
  
        return redirect()->route('employers')
                        ->with('success','Employer deleted successfully');
    }
    public function search( Request $request) {

        $request->validate([

            'q' => 'required'
        ]);


        $q = $request->q;

        $filteredEmployer = Employer::where('name', 'like', '%' . $q . '%')
                                ->orWhere('embauchement', 'like', '%' . $q . '%')->get();

        if ($filteredEmployer->count()) {

            return view('employers.index')->with([
                'employers' =>  $filteredEmployer
            ]);
        } else {
            
            return redirect('/employers')->with([
                'status' => 'La recherche a échoué, Veuillez réessayer'
            ]);
        }
        
    }
}

