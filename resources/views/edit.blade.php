<h1>Edit</h1>

{{-- <form action="{{route('Contact.update',$var->id)}}" method="post">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="name" value="{{$var->name}}">
    

    <button type="submit">update</button>
</form>
 --}}

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
    

{{-- @if($errors->has()) --}}
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
{{-- @endif --}}
<form action ="{{route('Contact.store')}}" method="post">
    {{csrf_field()}}
    
    <input type="text" name="name" value="{{$var->name}}">
    <input type="text" name="address" value="{{$var->address}}">
    <input type="text" name="email" value="{{$var->email}}">
    <input type="text" name="links" value="{{$var->links}}">
    <input type="text" name="notes" value="{{$var->notes}}">
    <input type="text" name="company" value="{{$var->company}}">
    <input type="date" name="dob" 
    value="{{$var->dob}} "
        min="1997-01-01" max="2024-12-31">
        
        
        <input type="BigInt" name="number1" value="{{$var->mobiles[0]['number']}}">
        <input type="BigInt" name="number2"  value="{{$var->mobiles[1]['number']}}">
        <input type="BigInt" name="number3"  value="{{$var->mobiles[2]['number']}}">

    <button type="submit"> Update</button>

</form>

