<?php

    namespace App\Http\Controllers;

    use App\Article;
    use Illuminate\Http\Request;


    class ArticlesController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            /*
             * To select all articles inclouding trashed use->>>> withTrashed()->
             * To select only trashed articles use->>>> onlyTrashed()->  */
            $articles = Article::paginate(10);
//            $articles = Article::all();
//            $articles = DB::table('articles')->get();

//            $articles = Article::whereLive(1)->get();
//            $article = DB::table('articles')->whereLive(1)->first();
//            $articles = DB::table('articles')->whereLive(0)->get();

            return view('articles/index', compact('articles'));
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('articles.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

            Article::create($request->all());
            return redirect('/articles');

//            Article::create($request->except('_token'));
//            DB::table('articles')->insert($request->except('_token'));

            /*$article = new Article();
            $article->user_id = Auth::user()->id;
            $article->content = $request->content;
            $article->live = (boolean)$request->live;
            $article->post_on  =$request->post_on;
            $article->save();*/

            /*Article::create([
             'user_id' => Auth::user()->id,
             'content' => $request->content,
             'live' => $request->live,
             'post_on' => $request->post_on
              ]);*/

        }

        /**
         * Display the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
//            $article = DB::table('articles')->whereId($id)->get();
            $article = Article::findOrFail($id);
            return view('articles.show', compact('article'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $article = Article::findORFail($id);
            return view('articles.edit', compact('article'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $article = Article::findOrFail($id);
            if (!isset($request->live))
                $request = array_merge($request->all(), ['live' => false]);
            else
                $request = $request->all();
            $article->update($request);
            return redirect('/articles');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param int $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            Article::destroy($id);
            return redirect('/articles');
            /*
             * Force Deleting even if the model using soft deleting
             $article = Article::findOrFail($id);
             $article->forceDelete();*/
        }
    }
