<?php

namespace App\Repository;

use App\Models\News;
use App\Events\NewsCreated;
use App\Events\NewsDeleted;
use App\Events\NewsUpdated;

class NewsRepository
{   
  
   
    public function getAll()
    {
        $news = News::simplePaginate(1);
        return $news;
    }
    public function getById($id)
    {   
     
      
        
        $news = News::with('comments')->get()->find($id);
        if($news == null){
            return false;
        }
        return $news;
        // return News::find($id);
    }

    public function create($data)
    {
      
        $file = $data['image'];
        $imageName = time().'.'.$file->extension();
        $image = url('images/news/' . $imageName);
        $imagePath = public_path(). '/images/news/';
        $file->move($imagePath, $imageName);
    
        $news  = News::create([

            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $image,
        ]);
        NewsCreated::dispatch($news);
        return $news;

      
    }

    public function update($id, $data)
    {
 

        $findNews = News::find($id);
   
        if($findNews == null){
            return false;
        }
        
        if($data['image']){
           $parseUrl = parse_url($findNews->image);
           $imagePath = public_path().$parseUrl['path'];
           if(file_exists($imagePath)){
               unlink($imagePath);
           }
           $file = $data['image'];
           $imageName = time().'.'.$file->extension();
           $image = url('images/news/' . $imageName);
           $imagePath = public_path(). '/images/news/';
           $file->move($imagePath, $imageName);


        }
   
        $findNews->update([

            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $image,

        ]);
        NewsUpdated::dispatch($findNews);
        return $findNews;
        
    
    }

    public function delete($id)
    { 
        
        $findNews = News::find($id);
        if($findNews == null){
            return false;
        }
        NewsDeleted::dispatch($findNews);
        $findNews->delete();
        $parseUrl = parse_url($findNews['image']);
        $imagePath = public_path() . $parseUrl['path'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
   
        return true;
    }
}