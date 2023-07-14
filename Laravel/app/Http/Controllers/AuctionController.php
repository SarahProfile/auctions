<?php 

namespace App\Http\Controllers;
use App\Models\Auction;
use App\Models\AuctionImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return Auction::orderBy('id','desc')->get();
  }
  
  
      public function imageUpload(Request $request)
  {
      return AuctionImage::create(['auction_id'=>$request->id,'image'=>$request->image]);
  }
  
  public function imageDelete($id)
  {
      $img=AuctionImage::find($id);
      $img->delete();
      
      return [];
  }
  
  public function myList(){
      return Auction::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
  }
  
  public function list(Request $request){
      
      $orderBy=$request->order??'created_at';
      $orderDir=$request->order_dir??'desc';
      
     return Auction::orderBy($orderBy,$orderDir)->when($request->price_min, function (Builder $query, string $role) {
                    $query->where('price','>=', $request->price_min)->where('price','<=',$request->price_max);
                })->when($request->category, function (Builder $query, string $role) {
                    $query->where('category_id', $request->category);
                })->wehre('is_approved',1)->paginate(10);
      
      
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
   $image='';   
      if(isset($request->image))
      {
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images'), $filename); 
            $image=$filename;
      }

    $auction=Auction::create(array_merge($request->all(),['user_id'=>auth()->user()->id,'image'=>$image]));
    
    
    return $auction;
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return Auction::find($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id,Request $request)
  {
      
      $auction=Auction::find($id);
      $image=$auction->image;   
      if(isset($request->image))
      {
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/images'), $filename); 
            $image=$filename;
      }
      $auction->fill(array_merge($request->all(),['image'=>$image]));
      
      $auction->save();
      
      return $auction;
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id,)
  {
    
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
      */
   public function delete($id){
        $auction=Auction::find($id);
        $auction->delete();
        return [];
}

  public function destroy($id)
  {
    
  }
  
}

?>