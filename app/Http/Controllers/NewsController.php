<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Attachment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\isEmpty;

class NewsController extends Controller
{
    public function index()
    {
        $newsPosts = News::Simplepaginate(6)->sortByDesc('uploadDate');
        return view('admin.news.show',
        ['newsPosts' => $newsPosts]);
    }

    public function showNews($id)
    {
        $news = News::findOrfail($id);

        return view('admin.news.showNews',
        ['news' => $news]);
    }

    public function deleteShow($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.delete',
        ['news' => $news]);
    }

    public function deleteNews($id)
    {
        $news = News::findOrFail($id);
        if($news->attachment)
        {
            $filename = $news->attachment->filename;
            Storage::disk('public')->delete($filename);
    
            Attachment::find($news->attachment->id)->delete();
        }
        
        News::find($id)->delete();
        return redirect()->route('newsIndex');
    }

    public function newsCreate()
    {
        return view('admin.news.create');
    }

    public function newsStore()
    {
        $data = request()->validate([
            'Title' => ['required', 'max:75'],
            'content' => ['required'],
            'uploadDate' => ['date', 'required'],
            'attachment' => ['image']
        ]);
        if(isset($data['attachment']))
        {
            $image = $data['attachment'];
            unset($data['attachment']);

            $imageNewFileName = date("Ymd Hisms"). "-" . Auth::user()->id. ".". $image->extension();

            Storage::disk('public')->put($imageNewFileName, $image->get());

            $data['user_id'] = Auth::user()->id;

            $news = News::create($data);
            $news->attachment()->create([
                'filepath' => 'storage/',
                'filename' => $imageNewFileName,
            ]);
        }
        else
        {
            unset($data['attachment']);
            $data['user_id'] = Auth::user()->id;
            $news = News::create($data);
        }
        

        return redirect()->route('newsIndex');
    }

    public function newsUpdate($id)
    {
        
        $oldArticle = News::findOrFail($id);
        if($oldArticle->attachment)
        {
            $data = request()->validate([
                'Title' => ['required', 'max:75'],
                'content' => ['required'],
                'uploadDate' => ['date', 'required'],
                'keepAtt' => ['required'],
                'attachment' => ['image']
            ]);
        }
        else
        {
            $data = request()->validate([
                'Title' => ['required', 'max:75'],
                'content' => ['required'],
                'uploadDate' => ['date', 'required'],
                'keepAtt' => [],
                'attachment' => ['image']
            ]);
        }
        if($oldArticle->attachment)
        {
            if($data['keepAtt'] == 'new')
            {
    
                $image = $data['attachment'];
                unset($data['attachment']);
    
                $imageNewFileName = date("Ymd Hisms"). "-" . Auth::user()->id. ".". $image->extension();
    
                Storage::disk('public')->put($imageNewFileName, $image->get());
    
                $data['user_id'] = Auth::user()->id;
                if($oldArticle->attachment)
                {
                    $oldImgId = $oldArticle->attachment->id;
                    
                    $oldAtt = Attachment::findOrFail($oldImgId);
                    $oldImgName = $oldAtt->filename;
                    Storage::disk('public')->delete($oldImgName);
    
                    $oldArticle->attachment()->update([
                        'filepath' => 'storage/',
                        'filename' => $imageNewFileName,
                    ]);
                }
                else
                {
                    $oldArticle->attachment()->create([
                        'filepath' => 'storage/',
                        'filename' => $imageNewFileName,
                    ]); 
                }
    
                
            }
            if($data['keepAtt'] == 'no')
            {
                
                $oldImgId = $oldArticle->attachment->id;
                
                $oldAtt = Attachment::findOrFail($oldImgId);
                
                $oldImgName = $oldAtt->filename;
                
                Storage::disk('public')->delete($oldImgName);
                $image = $oldArticle->attachment;
                $image->delete();
    
            }
        }
        

        $oldArticle->update($data);
        return redirect()->route('newsIndex');
    }
    
    public function updateShow($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit',
        ['news' => $news]);
    }

    public function showCard()
    {

        $today = Carbon::now()->format('Y-m-d');

        $news = News::whereDate('uploadDate', '<=', $today)->orderBy('uploadDate', 'desc')->get();
        
        return view('home.news.show',
        ['newsPosts' => $news]);
    }

    public function showArticle($id)
    {
        $news = News::findOrfail($id);

        return view('home.news.showNews',
        ['news' => $news]);
    }
}
