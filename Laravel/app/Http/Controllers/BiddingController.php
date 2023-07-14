<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bidding;

class BiddingController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
    public function store(Request $request)
  {
    $Bidding=Bidding::create(array_merge(['user_id'=>auth()->user()->id],$request->all()));
    
    
    return $Bidding;
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
     return Bidding::find($id);
  }
  
  
    public function list($id)
  {
     return Bidding::where('product_id',$id)->orderBy('price','desc')->get();
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
     
      $Bidding=Bidding::find($id);
      $Bidding->fill($request->all());
      
      $Bidding->save();
      
      return $Bidding;
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    
  }
  
}

?>