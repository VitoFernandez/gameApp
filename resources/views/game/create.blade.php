@extends('app.base')
@section('title')

@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <form action="{{ url('game') }}" method="post">
            <!-- Solución de error por CSRF -->
            <!--<input type="hidden" name="_method" value="post">-->
            <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            @csrf
        
            <!-- Inputs del formulario -->
        
            <div class="mb-3">
        
                <label for="title" class="form-label">Game title</label>
        
                <input type="text" class="form-control" id="title" name="title" maxlength="100" required>
        
            </div>
        
            <div class="mb-3">
        
                <label for="director" class="form-label">Game director</label>
        
                <input type="text" class="form-control" id="director" name="director" maxlength="70" required>
        
            </div>
        
            <div class="mb-3">
        
                <label for="developer" class="form-label">Game developer</label>
        
                <input type="text" class="form-control" id="developer" name="developer" maxlength="100" required>
        
            </div>
        
            <div class="mb-3">
                <label for="relaise" class="form-label">Game relaise</label>
                <input type="date" class="form-control" id="relaise" name="relaise">
            </div>
        </form>
    </table>
</div>
    <a class="btn btn-primary" href="{{ url ('game/') }}">Back</a>
    <button type="submit" class="btn btn-primary">Add</button>
@endsection