<tr>
    <td>{{$ab->id_blog}}</td>
    <td><img class="slike" src="{{asset('images/'.$ab->image)}}"/></td>
    <td>{{$ab->title}}</td>
    <td>{{$ab->description}}</td>
    <td>{{$ab->created_at}}</td>
    <td>{{$ab->first_name}} {{$ab->last_name}}</td>
    <td>
        <button type="submit" class="DeleteBlog btn btn-danger" name="deleteBlog" data-id="{{$ab->id_blog}}">Delete</button>
    </td>
</tr>
