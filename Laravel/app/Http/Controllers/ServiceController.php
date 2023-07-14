<?php 

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Design;
use App\Models\Requirment;
use App\Models\ServiceImage;
use Illuminate\Http\Request;
use App\Models\Consultation;

class ServiceController extends Controller 
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    return Service::orderBy('id','desc')->get();
  }
  
  public function consultation(Request $request)
  {
      return Consultation::create(array_merge(['user_id'=>auth()->user()->id],$request->all()));
  }
  
  
  public function imageUpload(Request $request)
  {
      return ServiceImage::create(['service_id'=>$request->service_id,'image'=>$request->image]);
  }
  
  public function consultationList($id)
  {
      return Consultation::where('service_id',$id)->orderBy('id','desc')->get();
  }
  
  public function consultationShow($id)
  {
      return Consultation::find($id);
  }
  
  public function imageDelete($id)
  {
      $img=ServiceImage::find($id);
      $img->delete();
      
      return [];
  }
  
    public function designUpload(Request $request)
  {
      return Design::create(['service_id'=>$request->service_id,'file'=>$request->image]);
  }
  
  public function designDelete($id)
  {
      $img=Design::find($id);
      $img->delete();
      
      return [];
  }
  
    public function requirementUpload(Request $request)
  {
      return Requirment::create(['service_id'=>$request->service_id,'file'=>$request->image]);
  }
  
  public function requirementDelete($id)
  {
      $img=Requirment::find($id);
      $img->delete();
      
      return [];
  }
  
  public function myList(){
      return Service::where('user_id',auth()->user()->id)->orderBy('id','desc')->get();
  }
  
  public function list($id){
      
      return Service::where('category_id',$id)->orderBy("id",'desc')->get();
      
    //   $orderBy=$request->order??'created_at';
    //   $orderDir=$request->order_dir??'desc';
      
    //  return Service::orderBy($orderBy,$orderDir)->when($request->price_min, function (Builder $query, string $role) {
    //                 $query->where('price','>=', $request->price_min)->where('price','<=',$request->price_max);
    //             })->when($request->category, function (Builder $query, string $role) {
    //                 $query->where('category_id', $request->category);
    //             })->wehre('is_approved',1)->paginate(10);
      
      
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
    $auction=Service::create(array_merge(['user_id'=>auth()->user()->id],$request->all()));
    
    foreach($request->images as $img)
    {
        $auctionImage=ServiceImage::create(['service_id'=>$auction->id,'image'=>$img]);
    }
    
    foreach($request->designs as $img)
    {
        $auctionImage=Design::create(['service_id'=>$auction->id,'file'=>$img]);
    }
    
    foreach($request->requirements as $img)
    {
        $auctionImage=Requirment::create(['service_id'=>$auction->id,'file'=>$img]);
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
    return Service::find($id)->load('designs','requirements');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id,Request $request)
  {
      
      $auction=Service::find($id);
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