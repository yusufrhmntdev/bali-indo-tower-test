<?php

namespace App\Jobs;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CreateCommentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $commentData;
   
    /**
     * Create a new job instance.
     */
    public function __construct($commentData)
    {
        //
       
        $this->commentData = $commentData;
  
        
       

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
   
        Comment::create([

        
            'news_id' => $this->commentData['news_id'],
            'user_id' => Auth::user()->id,
            'comment' => $this->commentData['comment'],
      
        
        ]);
    
       
    }
}
