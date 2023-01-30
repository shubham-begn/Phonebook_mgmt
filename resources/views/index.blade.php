

<a href="{{route('Contact.create')}}">Create New Contact </a>
<a href="{{route('Mobile.show')}}">Deleted List </a>

<hr>
<table>



    <thead>
        <tr>
            <th>S.NO</th>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Links</th>
            <th>Notes</th>
            <th>Company</th>
            <th>Birth Day</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

    @foreach($var as $temp)
    <tr>
        <td>{{$temp->id}}</td>
        <td><a href="{{route('Contact.edit',$temp->id)}}">
            {{$temp->name}}
        </a>
       
    </td> 

   
        <td>{{$temp->address}}</td>
        <td>{{$temp->email}}</td>
        <td>{{$temp->links}}</td>
        <td>{{$temp->notes}}</td>
        <td>{{$temp->company}}</td>
        <td>{{$temp->dob}}</td>
        <td>
            <a href="{{route('Contact.show',$temp->id)}}">View</a>
        </td>
        <td>
        <form action="{{ route('Contact.destroy', [$temp->id])}}" 
            method="post">
            {{method_field('DELETE')}}
            {{ csrf_field() }}
            <button class="btn btn-primary" onclick="return confirm('Are you sure?')" 
            type="submit" name="Delete">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>