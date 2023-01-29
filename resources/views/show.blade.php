<hr>
<table>



    <thead>
        <tr>
            <th>Number1</th>
            <th>Number2</th>
            <th>Number3</th>
            <th>S.NO</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Links</th>
            <th>Notes</th>
            <th>Company</th>
            <th>Birth Day</th>
            
        </tr>
    </thead>


{{-- 
@foreach($var2 as $temp2)

    <td>{{$temp2->id}}</td>
    <td>{{$temp2->name}}</td> 
    <td>{{$temp2->address}}</td>
    <td>{{$temp2->email}}</td>
    <td>{{$temp2->links}}</td>
    <td>{{$temp2->notes}}</td>
    <td>{{$temp2->company}}</td>
    <td>{{$temp2->dob}}</td>
  

  @endforeach   --}}

       
  @foreach($var2->mobiles as $temp)
  <td>{{$temp['number']}}</td>
 
 @endforeach


 {{-- @foreach($var2 as $temp2) --}}


    <td>{{$var2['id']}}</td>
    <td>{{$var2['name']}}</td> 
    <td>{{$var2['address}']}}</td>
    <td>{{$var2['email']}}</td>
    <td>{{$var2['links']}}</td>
    <td>{{$var2['notes']}}</td>
    <td>{{$var2['company']}}</td>
    <td>{{$var2['dob']}}</td>
   

 {{-- @endforeach --}}



</table>