@if ($errors->any())    
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible">
        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        <strong>Error!</strong>{{ $error }}
    </div>
    @endforeach        
@endif

@if (session('error'))
    
    <div class="alert alert-danger alert-dismissible ml-5">
        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        <strong>Error!</strong>{{session('error')}}
    </div>
        
@endif

@if (session('success'))
    
    <div class="alert alert-success alert-dismissible" style="margin-left: 400px;">
        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        <strong>Success!</strong>{{session('success')}}
    </div>
        
@endif
@if (session('warning'))
    
    <div class="alert alert-danger alert-dismissible" style="margin-left: 400px;">
        {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
        <strong>Warning!</strong>{{session('warning')}}
    </div>
        
@endif