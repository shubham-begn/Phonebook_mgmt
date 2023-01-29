<h1> Create new contact </h1>
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
    
    <input type="text" name="name" placeholder="enter your name">
    <input type="text" name="address" placeholder="enter your address">
    <input type="text" name="email" placeholder="enter your email">
    <input type="text" name="links" placeholder="enter your links">
    <input type="text" name="notes" placeholder="enter notes">
    <input type="text" name="company" placeholder="enter company">
    <input type="date" name="dob" 
        placeholder="dd-mm-yyyy" 
        min="1997-01-01" max="2024-12-31">
        
        
        <input type="BigInt" name="number1" placeholder="enter your mobile_home">
        <input type="BigInt" name="number2" placeholder="enter your mobile_personal">
        <input type="BigInt" name="number3" placeholder="enter your mobile_work">

    <button type="submit"> Create</button>

</form>

