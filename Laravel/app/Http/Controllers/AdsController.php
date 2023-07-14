<?php 

namespace App\Http\Controllers;
use App\Models\Ads;
use App\Models\AdsImage;
use App\Models\AdLike;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AdsController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return Ads::orderBy('id','desc')->get();
  }
  
  public function like($id)
  {
      $old=AdLike::where(['ad_id'=>$id,'user_id'=>auth()->user()->id])->first();
      if(isset($old))
      {
          $old->delete();
      }
      else{
          $new=AdLike::create(['user_id'=>auth()->user()->id,'ad_id'=>$id]);
      }
      
      return [];
  }
  
  
  public function imageUpload(Request $request)
  {
      return AdsImage::create(['ads_id'=>$request->id,'image'=>$request->image]);
  }
  
  public function imageDelete($id)
  {
      $img=AdsImage::find($id);
      $img->delete();
      
      return [];
  }
  
  public function myList(){
      return Ads::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
  }
  
  public function list(Request $request){
      
      $orderBy=$request->order??'created_at';
      $orderDir=$request->order_dir??'desc';
      $ads=Ads::query();
      
      if($request->category)
      {
          $ads->where('category_id',$request->category);
      }
      
      return $ads->paginate(10);
      
     
      
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
    $auction=Ads::create(array_merge(['user_id'=>auth()->user()->id],$request->all()));
    
    foreach($request->images as $img)
    {
        $auctionImage=AdsImage::create(['ads_id'=>$auction->id,'image'=>$img]);
    }
    
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
    return Ads::find($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id,Request $request)
  {
      
      $auction=Ads::find($id);
      $auction->fill($request->all());
      
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
  public function destroy($id)
  {
    
  }
  
}

?>