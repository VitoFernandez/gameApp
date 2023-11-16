 @extends('app.base')

@section('title')

@section('content')

<form action="{{ url('game/' . $game->id) }}" method="post">
        
    @method('put')    
    @csrf
    
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
    
    <input type="submit" class="btn-success btn" value="Edit">
    
</form>

@endsection