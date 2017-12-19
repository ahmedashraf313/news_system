@extends("admin_temp");




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
<form  role="form" action="add_author" method="POST" >
 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        


<div class="form-group">
<label>Enter the Name of the Author</label>
<input class="form-control" placeholder="Enter the Name" name="name" required="">    
</div>


<div class="form-group">
<label>Enter the Email of the Author</label>
<input class="form-control" placeholder="Enter the Email" name="email" required="">   
</div>

<div class="form-group">
<label>Enter the Password of the Author</label>
<input class="form-control" placeholder="Enter the Password" name="password" required="" type="password">   
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
