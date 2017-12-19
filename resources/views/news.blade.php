<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

      <div id="adbanner">
            <div id="ad">
                
            </div>
        </div>
        <div id="secwrapper">
            <section>

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
  $items=DB::select('select  * from news  where id =? ',array($id));
  $news=$items[0];
    
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
 
  
  $ip=get_ip();

 $views=DB::select('select * from views where ip = ? and news_id =?',array($ip,$id));
 
  if (empty($views)) {
     DB::insert('insert into views (ip,news_id) values (?, ?)',array($ip, $id));
       
       $views_numbers=DB::select('select * from views where news_id = ?',array($id));

       $views_numbers=sizeof($views_numbers);


     DB::update("update  news set views_number = ".$views_numbers." where id = ?",array($id));



  }
  
  

    ?>             

<article id="featured"  >
                    <a href="news/{{$id}}"> 


                    <?php
                       $images=DB::select('select * from images where news_id = ?',array($id));
						  $image_src='';
						  if (!empty($images)) {
						  foreach ($images as $image) {
						  
						  	$image_src=$image->src;
						  
                     ?>
                    <img src="{{ URL::asset($image_src) }}" alt="" width="280" height="164"/>
                    <?php }}?>
                    </a>
                    <img src="images/featured.png" alt="" id="featuredico"/>
                    <h1>{{$title}}</h1>
                    <p>{{$description}}</p>
                    
                </article>
                </section>
                </div>


</body>
</html>

  