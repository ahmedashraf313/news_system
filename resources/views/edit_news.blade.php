<?php 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


if(Session::has('admin')){
?>

@extends("admin_temp");
<?php
 }
else{
?>
@extends("author_temp");
<?php }
?>




@section('content')
<?php
            function get_ip() {
                    $ipaddress = '';
                    if (isset($_SERVER['HTTP_CLIENT_IP']))
                        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    else if(isset($_SERVER['HTTP_X_FORWARDED']))
                        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                    else if(isset($_SERVER['HTTP_FORWARDED']))
                        $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    else if(isset($_SERVER['REMOTE_ADDR']))
                        $ipaddress = $_SERVER['REMOTE_ADDR'];
                    else
                        $ipaddress = 'UNKNOWN';
                        return  $ipaddress;
                } 



$ip=get_ip();

 $views=DB::select('select * from views where ip = ? and news_id =?',array($ip,$id));
 
  if (empty($views)) {
     DB::insert('insert into views (ip,news_id) values (?, ?)',array($ip, $id));
       
       $views_numbers=DB::select('select * from views where news_id = ?',array($id));

       $views_numbers=sizeof($views_numbers);


     DB::update("update  news set views_number = ".$views_numbers." where id = ?",array($id));



  }
  $news=DB::select('select * from news where id = ? ',array($id));
  if (!empty($news)) {
 

  $news=$news[0];
  $title=$news->title;
  $description=$news->description;
  $news_author_id=$news->author_id;

  if(Session::has('author')){
  $author=Session::get('author');
  $current_author_id=$author->id;
  
  if($current_author_id!=$news_author_id){

?>
@stop
<?php }}}?>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
<form  role="form" action="add_news" method="POST" enctype="multipart/form-data">
 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        
<div class="form-group">

<input  type="hidden" name="id" value="{{$id}}">    
</div>

<div class="form-group">
<label>Enter the Title of the Item</label>
<input class="form-control" placeholder="Enter the Title" name="title" required="" value="{{$title}}">    
</div>

<div class="form-group">
  <?php         
$images= DB::select('select * from images where news_id = ?',array($id));
if (empty($images)) 
    $hidden="hidden=''";
else 
    $hidden='';
?>
<label {{$hidden}} >The current Images of the Item</label>


@foreach ($images as $image )
<img src="{{ URL::asset($image->src) }}" alt="" width="280" height="164"/> 
<a href="/delete_image/{{$image->id}}">Delete</a>
@endforeach
</div>

<div class="form-group">
<label>Attach Images with the Item <small>" you can add more than one item"</small></label>
<input type="file" name="files[]" accept="image/gif, image/jpeg, image/png"     onchange="readURL(this);" id="file"  multiple>   
<img id="blah" src="#"  />
</div>

<div class="form-group">
<label>Enter the Description of the Item</label>
<textarea class="form-control" placeholder="Enter name" name="description" required="" rows="8"  > {{$description}}  
</textarea>  
</div>


<?php 

$hidden='';
$author_name="";
if(Session::has('author')){
    $author=Session::get('author');
  $author_name=$author->name;
  $hidden="style=visibility: hidden";
    }  
?>
<div class="form-group" {{$hidden}} >
<label  > select the Author of the Item</label>
<select  class="form-control" name="author_name">            
<?php         
$authors= DB::select('select * from users where type ="author"');
?>
@foreach ($authors as $author ) 
        <?php
              $select="";
              if($author->name ==$author_name)
              $select="selected=selected";
          ?>
<option {{$select}} > <?php echo $author->name  ?> </option>
@endforeach                                                
</select>
</div>

                                        
                                        
<input type="submit" class="btn btn-default" name="submit" value="Submit Button"></input>
<input type="reset" class="btn btn-default" value="Reset Button"></input>
</form>
</div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->

 <script type="text/javascript">
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(280)
                    .height(164);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
 </script>   

@stop
