@extends('crud.layout');

@section('content');
<div class="main-block">
  <div class="block-item left">
    @isset($Foods)
  
    @foreach($Foods['row'] as $food)
    <form method="POST" action="{{  route('update',['id1'=>$food->id ])}}"enctype="multipart/form-data">
        @csrf
        {{ method_field('put') }}
       
   <label><input type="textbox" id="t" name="ingr" value=" {{$food->name}}" placeholder="food name"></label> <br>
   <label><input type="textbox" id="l" name="api_name" value=" {{  $food->api_name}}" placeholder="api_name"></label> <br>
   <br>
   <label><input type="textbox" id="l" name="description" value="{{  $food->description}}" placeholder="description"></label><br>
   <Label><span> Category </span></label>
   
       
<div>
  <label id="radio">
  <span>Breakfast</span>
  {{-- @isset($Categories)
  
  @foreach($Categories['row'] as $Category) --}}
  
<input type="checkbox" name="select[]" value="1 ">
</label>
<label id="radio">
  <span>Lunch</span>
<input type="checkbox" name="select[]" id="option-2" value="2">
</label>
<label id="radio">
  <span>Supper</span>
<input type="checkbox" name="select[]" id="option-3" value="3">
</label>
   {{-- @endforeach
   @endisset --}}
</div>
<Label><span> Part </span></label>
<div >
  <label id="radio">
  <span>Main</span>
<input type="checkbox" name="select1[]" value="1" >
</label>
<label id="radio">
  <span>Side</span>
<input type="checkbox" name="select1[]" id="option-2" value="2">
</label>
<label id="radio">
  <span>Sauce</span>
<input type="checkbox" name="select1[]" id="option-3" value="3">
</label>
 


</div>
<br>
   <br>
   <button class="red" type="submit"><i class="icon ion-md-lock"></i> Submit</button>
   <br>
   @endforeach
   @endisset
 </form >

 
{{-- <form method="post" action="">
@csrf
 @isset($k)
 @for ($i = 0; $i < 1; $i++)
 <input type="hidden"  name="category" value="{{$k['category']}}">
 <input type="hidden"  name="part" value=" {{ $k['part'] }}">
 <input type="hidden"  name="api_name" value=" {{ $k['$food->api_name'] }}">
 {{-- <input type="hidden"  name="local_name" value=" {{ $k['ingredient'] }}">
 <input type="hidden"  name="calories" value="{{$k['calories']}}">
 <input type="hidden"  name="protein" value="{{$k['protein']}}">
 <input type="hidden"  name="fat" value="{{$k['fat']}}">
 <input type="hidden"  name="carbohydrates" value="{{$k['carbohydrates']}}">
 <input type="hidden"  name="vitamins" value="{{$k['vitamins']}}">
 <input type="hidden"  name="minerals" value="{{$k['minerals']}}">  --}}

{{-- @endfor   
  
 
 @endisset --}}
{{-- <button class="red" type="submit"><i class="icon ion-md-lock"></i><a> submit</a> </button> --}}
<!--</form> <!-->
  </div>
  

</div>
@endsection