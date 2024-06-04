@if(session('success'))
<div class="alert alert-success">
   {{ session('success') }}  
</div> 
@endif
@if(session('warning'))
<div class="alert alert-warning">
   {{ session('warning') }}  
</div> 
@endif

@if ($errors->any())
 <div class="alert alert-danger">
   <ul class="my-0">
     @foreach ($errors as $error)
         <li>{{ $error}}</li>
     @endforeach
   </ul>
 </div>
@endif