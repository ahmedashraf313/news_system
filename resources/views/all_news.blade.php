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
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            DataTables Advanced Tables
                        </div>
<div class="panel-body">
  <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
           


  
  <thead>
            <tr> <th>Title</th> <th>Description</th> <th>Author Name</th> <th></th> <th></th>   </tr>
          </thead>
          

          <tbody>
 <?php         
  
if(Session::has('author')){
  $author=Session::get('author');
  $author_id=$author->id;
  $items=DB::select('select * from news where author_id=?',array($author_id));}

else 
  $items=DB::select('select * from news ');
  
foreach ($items as $news ) {
  
  $id=$news->id;	
  $title=$news->title; 
  $description=$news->description; 
  $author_id=$news->author_id; 
 
  $author=DB::select('select * from users where id = ? ',array($author_id));
  $author=$author[0];
  $author_name=$author->name;

  
 ?>                 
      <tr>
         <td>{{$title}} </td>
         <td>{{$description}} </td>
         <td>{{$author_name}} </td>
         <td><a href="edit_news/{{$id}}">Edit</a> </td> 
         <td><a href="delete_news/{{$id}}">Delete</a>   </td> 
           
                   
             
 </tr>

 <?php }?>


          </tbody>

                            </table>
                            
                             </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>


@stop