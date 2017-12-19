<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
         <link rel="stylesheet" href="{{ URL::asset('style.css') }}" />
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <title>Box Press</title>
    </head>
    <!--[if IE 6 ]><body class="ie6 old_ie"><![endif]-->
    <!--[if IE 7 ]><body class="ie7 old_ie"><![endif]-->
    <!--[if IE 8 ]><body class="ie8"><![endif]-->
    <!--[if IE 9 ]><body class="ie9"><![endif]-->
    <!--[if !IE]><!--><body><!--<![endif]-->
        <header>
            <h1><a href="index.html">Box Press</a><span id="version">v1</span></h1>
            <nav>
                <ul>
                    <li><a href="index.html" class="current">Home</a></li>
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/login">Login</a></li>
                    
                </ul>
            </nav>
        </header>
        <div id="adbanner">
            <div id="ad">
                <a href="#"><p>Advertise Here</p></a>
            </div>
        </div>
        <div id="secwrapper">
            <section>

<?php         
 
  $items=DB::select('select * from news ORDER BY views_number DESC ');
  

  
$counter='0'; 
  foreach ($items as $news ) {
    
    $index = array_search($news, $items);

    if(($index+1) % 3 == 0)
        $class=' class=rightcl ';
    
    else
        $class='';

    
    
    $id=$news->id;
    $title=$news->title;
    $description=$news->description;
    $author_id=$news->author_id;
    $date=$news->date;
    $time=$news->time;
    $created_at=$date.$time;

  
  $author=DB::select('select * from users where id = ?',array($author_id));
  $author=$author[0];
  $author_name=$author->name;
 
  $images=DB::select('select * from images where news_id = ?',array($id));
  $image_src='';
  if (!empty($images)) {
  $image=$images[0];
  $image_src=$image->src;}
  

    ?>         
                <article id="featured" {{$class}}  >
                    <a href="news/{{$id}}">
                    <img src="{{ URL::asset($image_src) }}" alt="" width="280" height="164"/>
                    </a>
                    
                    <h1>{{$title}}</h1>

                    <?php
                    if(strlen($description)>298)
                        $description = substr($description, 0, 298);
                    elseif (strlen($description)<298) {
                        $spaces=298-(strlen($description));
                        $spaces=$spaces/2;
                        for($counter=0;$counter<$spaces;$counter++)
                            $description=$description." .";
                    }
                    ?>

                    <p>{{$description}}</p>
                    <a href="news/{{$id}}" class="readmore">Read more</a>
                </article>
<?php }?>                                                                                
            </section>
        </div>
        <footer>
            <p>Copyright &copy 2012 BoxPress by Ahmed Ashraf. All Rights Reserved.</p>
        </footer>
    </body>
</html>
        
        
            
    
    