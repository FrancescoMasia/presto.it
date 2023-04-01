<x-layout>
    <x-menuCategory />
    <x-search></x-search>
    {{-- <x-menuCategory/> --}}
    <x-header>
        @if (session('messageRevisor'))
        <div class="alert alert-success">
            {{ session('messageRevisor') }}
        </div>
        @endif
        @if (session('statusEmail'))
        <div class="alert alert-success">
            {{ session('statusEmail') }}
        </div>
        @endif
        
        
        <div class="container-fluid my-5 sloganWelcome">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 bigTitle text-center">
                    <h1 class="txtMain mt-0 mt-md-5 mb-5 mb-md-0 display-5 ">{{__('ui.titleWelcome')}}
                    </h1>
                </div>
            </div>
        </div>
    </x-header>
    
    <div class="container allArticles">
        <div class="row justify-content-center">
            {{-- @foreach (Auth::user()->articles as $article) --}}
            @foreach ($articles as $article)
            <div class="col-12  col-lg-3 my-5 text-center ">
                <a class=" text-decoration-none txtMain"
                href="{{ route('article.show', compact('article')) }}">
                <div class="h-100 ">
                    <img class="customCard" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(500,500): 'https://picsum.photos/200'}}" alt=""> 
                    <div class="card-body ">
                        <h5 class="card-title fs-2 mt-3">{{ Str::limit ($article->name, 12) }}</h5>
                        <p class="card-title">{{ Str::limit($article->body, 30) }}</p>
                        <p>{{__('ui.publishedBy')}} <strong>{{ $article->user->name }} </strong>
                           
                        </p>
                        <div class="text-start ms-5 d-flex ps-2">
                             <a href="{{ route('article.show', compact('article')) }}"
                        class="btn btn-addArt mb-5 ms-2 ms-md-0">{{__('ui.viewMore')}}</a>
                        <p class="card-text txtAccent fs-2 text-end  mt-3 mt-md-2 me-0 me-md-3 ms-5 ms-md-3 mt-2">{{($article->price) }} €</p>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-1 d-flex bgAccent rounded ">
                    
                    @for ($i = 1; $i <= $articles->lastPage(); $i++)
                        <div  class=" text-center mx-auto text-white {{ ($i == $articles->currentPage()) ? ' active' : '' }}">
                            <a class="text-white" href="{{ $articles->url($i) }}">{{ $i }}</a>
                        </div>
                    @endfor
                </div>
    </div> --}}
    
    
    
    
    
    
    
    
</x-layout>
