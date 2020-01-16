@if($errors)
    @foreach($errors as $error)
    <div class="alert alert-danger">

        {{$error}}
    </div>
    @endforeach
@endif


@if(session('cat_message'))
    <div class="alert alert-success">

        {{session('cat_message')}}

    </div>

@endif

@if(session('pro_message'))
    <div class="alert alert-success">

        {{session('pro_message')}}

    </div>

    @endif


    @if(session('post_message'))
    <div class="alert alert-success">

        {{session('post_message')}}

    </div>
    @endif

    @if(session('upDatePost'))
    <div class="alert alert-success">

        {{session('upDatePost')}}

    </div>
    @endif

@if(session('delPost'))
        <div class="alert alert-danger">

            {{session('delPost')}}

        </div>
    @endif

    @if(session('delCat'))
        <div class="alert alert-danger">

            {{session('delCat')}}

        </div>
    @endif

     @if(session('updateCat'))
        <div class="alert alert-success">

            {{session('updateCat')}}

        </div>
    @endif

     @if(session('updateComment'))
        <div class="alert alert-success">

            {{session('updateComment')}}

        </div>
    @endif


     @if(session('contact'))
        <div class="alert alert-success">

            {{session('contact')}}

        </div>
    @endif


    
    @if(session('delUser'))
        <div class="alert alert-danger">

            {{session('delUser')}}

        </div>
    @endif

