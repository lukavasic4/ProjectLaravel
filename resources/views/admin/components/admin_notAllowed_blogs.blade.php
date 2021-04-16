<tr>
    <td>{{$na->id_blog}}</td>
    <td><img class="slike" src="{{asset('images/'.$na->image)}}"/></td>
    <td>{{$na->title}}</td>
    <td>{{$na->description}}</td>
    <td>{{$na->created_at}}</td>
    <td>{{$na->first_name}} {{$na->last_name}}</td>
    <td>
        <button type="submit" class="btnNotAllowed btn btn-success" data-id="{{$na->id_blog}}">Allowed</button>
    </td>
    <td>
        <button type="submit" class="btnDeleteNotAllowed btn btn-danger" data-id="{{$na->id_blog}}">Delete</button>
    </td>
</tr>
