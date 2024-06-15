<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Models\Book;
class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(3);
        // dd($hh);
        return view('books.index',compact('books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show',compact('book'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' =>'required|image|mimes:jpg,png'
        ]);
        

        $img = $request->file('img');
        $ext = $img->getClientOriginalExtension();
        $name= "book-".uniqid().".$ext";
        $img->move(public_path('uploads/books'),"$name");

        Book::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'img' => $name
        ]);

        return redirect(route('books.index'));
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit',compact('book'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'img' =>'nullable|image|mimes:jpg,png'
        ]); 

        $book = Book::findOrFail($id);
        $name = $book->img;

        if($request->hasFile('img'))
        {
            if($name !== null)
            {
                unlink(public_path('uploads\books\\').$name);
            }
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name= "book-".uniqid().".$ext";
            $img->move(public_path('uploads/books/'),$name);
        }

        $book->update([
            'title'=>$request->title,
            'desc'=>$request->desc,
            'img'=>$name
        ]);
        return redirect(route('books.show',$id));
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $image_path = public_path('uploads\books\\'.$book->img);
        if($book->img !== null)
        {
           unlink($image_path);
        }
        $book->delete();
        return back();
    }





}
