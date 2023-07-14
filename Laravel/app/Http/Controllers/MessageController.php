<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller 
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
  
  public function list()
  {
      $id=auth()->user()->id;
      return \DB::select("select *,(select message from messages where (user_id=users.id and receiver_id='$id') or (user_id='$id' and receiver_id=users.id) order by created_at desc limit 1 ) as message ,(select created_at from messages where (user_id=users.id and receiver_id='$id') or (user_id='$id' and receiver_id=users.id) order by created_at desc limit 1 ) as message_time  from users having message_time IS NOT NULL order by message_time desc  ");
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    return Message::create(array_merge(['user_id'=>auth()->user()->id],$request->all()));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //return Messages::where(['user_id'])->get();
    
    $userId=auth()->user()->id;
    
    return \DB::select("select * from messages where (user_id=$userId and receiver_id=$id) or (user_id=$id and receiver_id=$userId)");
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
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