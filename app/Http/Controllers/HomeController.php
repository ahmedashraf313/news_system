<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    
public function __construct()
    {
        $this->middleware('auth');
     }  

    
  /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

public function index()
    {
        return view('home');
    }
    
public function user()
    {

           $user=Auth::user();

           if($user->type=='admin'){
             Session::put('admin', $user);
             Session::forget('author');
             return view('admin_temp');

           }

          else if($user->type=='author'){
                Session::put('author', $user);
                Session::forget('admin');
                return view('author_temp');

           }


        
    }
  
public function delete_news($id){

             DB::delete("delete from  news  where id = ?", array($id));

             return redirect('/all_news');
               }   


public function delete_image($id){
               
            $image= DB::select('select * from images where id = ?', array($id));
            $image=$image[0];
            $news_id=$image->news_id;

             DB::delete("delete from  images  where id = ?", array($id));
             
            
             

          return redirect('edit_news/'.$news_id);
               }   


public function add_news(Request $request){
      
    //add the data into table USERS  
      $title          = $request->input('title');
      $description = $request->input('description');
      $author_name = $request->input('author_name');

            $author= DB::select('select * from users where name = ?', array($author_name));
             $author=$author[0];
             $author_id=$author->id; 
             date_default_timezone_set("Africa/Cairo");
             $today    = date("Y-m-d ");  
             $time     = date("h:i:s");                                   
  
      DB::insert('insert into news (title,description,author_id,date,time) values (?, ?,?,?,?)', array($title, $description,$author_id,$today,$time));
      
      $news_id=DB::getPdo()->lastInsertId();
    //add the data into table IMAGES
        
        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
    $temp = $_FILES["files"]["tmp_name"][$key];
    $name = $_FILES["files"]["name"][$key];
     
    if(empty($temp))
    {
        break;
    }
     
    move_uploaded_file($temp,"images/".$name);

    DB::insert('insert into images (src,news_id) values (?, ?)', array("images/".$name, $news_id));

              }
       


             return redirect('add_news');


   }


public function edit_news(Request $request,$id){
      
    //add the data into table USERS 
      
      $news_id       = $request->input('id');
      $title       = $request->input('title');
      $description = $request->input('description');
      $author_name = $request->input('author_name');

      $author= DB::select('select * from users where name = ?', array($author_name));
      $author=$author[0];
      $author_id=$author->id; 
      date_default_timezone_set("Africa/Cairo");
                                              
  
      DB::update("update  news set title = '".$title."' ,description = '".$description. "' ,author_id = ".$author_id." where id = ?",array($news_id));

                  
                
                    
              foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name){
              
                $temp = $_FILES["files"]["tmp_name"][$key];
                $name = $_FILES["files"]["name"][$key];
                 
                if(empty($temp))
                {
                    break;
                }
                 
                move_uploaded_file($temp,"images/".$name);

                DB::insert('insert into images (src,news_id) values (?,?)', array("images/".$name , $news_id));

            }
                   
                           

                         return redirect('edit_news/'.$news_id);




               }


public function add_author(Request $request){
      
    //add the data into table USERS  
      $name          = $request->input('name');
      $email = $request->input('email');
      $password = bcrypt($request->input('password'));
      $type='author';
             
             date_default_timezone_set("Africa/Cairo");
             $date    = date("Y-m-d ");  
             $time     = date("h:i:s");                                   
  
      DB::insert('insert into users (name,email,password,type,created_at) values (?, ?,?,?,?)', array($name, $email,$password,$type,$date." ".$time));
      
      
       


             return redirect('/dashboard');


   }
   
}
