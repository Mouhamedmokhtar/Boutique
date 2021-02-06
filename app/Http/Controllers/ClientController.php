<?php
    
namespace App\Http\Controllers;
   
use App\Client;
use Illuminate\Http\Request;
/*
 use App\Repositories\ClientRepository;
 use App\Http\Requests\ClientRequest;
*/
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
/*
    protected $clientRepository;
    protected $nbrPerPage = 4;
    public function __construct(ClientRepository $ClientRepository)
    {
        $this->middleware('auth', ['except' => 'index']);
        $this->middleware('admin', ['only' => 'destroy']);   //**

        $this->clientRepository = $clientRepository;
    } 
*/
    public function index()
    {
        $clients = Client::all();
        return view('clients.index',compact('clients'));
    $clients = $this->clientRepository->getPaginate($this->nbrPerPage);
    $links = $clients->render();
    return view('clients.liste', compact('clients', 'links'));
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
            'commande' => 'required',
            'phone' => 'required',
        ]);
        
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]); 
        Client::create($inputs);
   
        return redirect()->route('clients')
                        ->with('success','Client created successfully.');
/*
        $inputs = array_merge($request->all(), ['user_id' => $request->user()->id]);
        $this->clientRepository->store($inputs);
        return redirect(route('clients.index'));
*/
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
                        $client=Client::find($id) ;

        return view('clients.show',compact('client'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                $client=client::find($id) ;

        return view('clients.edit',compact('client'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
            'commande' => 'required',
            'phone' => 'required|numeric',

        ]);
          $client=Client::find($id) ;

        $client->update($request->all());
  
        return redirect()->route('clients')
                        ->with('success','Client updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id) ;
        $client->delete();
  
        return redirect()->route('clients')
                        ->with('success','Client deleted successfully');
    }
    public function search( Request $request) {

        $request->validate([

            'q' => 'required'
        ]);


        $q = $request->q;

        $filteredClient = Client::where('name', 'like', '%' . $q . '%')
                                ->orWhere('phone', 'like', '%' . $q . '%')->get();
 
        if ($filteredClient->count()) {

            return view('clients.index')->with([
                'clients' =>  $filteredClient
            ]);
        } else {
            
            return redirect('/clients')->with([
                'status' => 'La recherche a échoué, Veuillez réessayer'
            ]);
        }
        
    }
}