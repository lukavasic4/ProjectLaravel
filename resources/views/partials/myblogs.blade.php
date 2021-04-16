<tr>
    <td>{{$ub->id_blog}}</td>
    <td><img class="slike" src="{{asset('images/'.$ub->image)}}"/></td>
    <td>{{$ub->title}}</td>
    <td>{{$ub->description}}</td>
    <td>{{$ub->created_at}}</td>
    <td>{{$ub->first_name}} {{$ub->last_name}}</td>
    <td>
        <button type="submit" class="editMyBlog btn btn-secondary" name="editMyBlog" data-id="{{$ub->id_blog}}">Update</button>
    </td>
    <td>
        <button type="submit" class="deleteMyBlog btn btn-danger" name="deleteMyBlog" data-id="{{$ub->id_blog}}">Delete</button>
    </td>
</tr>
