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
<label>Enter the Title of the Item</label>
<input class="form-control" placeholder="Enter the Title" name="title" required="">    
</div>

<div class="form-group">
<label>Attach Images with the Item <small>" you can add more than one item"</small></label>
<input type="file" name="files[]" accept="image/gif, image/jpeg, image/png"     onchange="readURL(this);" id="file"  multiple required="">   
<img id="blah" src="#"  />
</div>

<div class="form-group">
<label>Enter the Description of the Item</label>
<textarea class="form-control" placeholder="Enter The Description" name="description" required="" rows="8" ></textarea>  
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
