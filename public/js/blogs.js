$(document).ready(function (){
   $("#updateForm").hide();
   $('.DeleteBlog').click(function (e){
       e.preventDefault();
       let id = $(this).data('id');
       $.ajax({
           url : BASE_URL + "/deleteBlog/" + id,
           method : "GET",
           dataType : "json",
           success : function (data){
                showBlogs(data)
           }
       })
   });
   $('.btnNotAllowed').click(function (e){
       e.preventDefault();
       let id = $(this).data('id');
       $.ajax({
           url : BASE_URL + "/allowedBlog/" + id,
           method : "GET",
           dataType: "json",
           success : function (data){
               showNotAllowedBlogs(data)
           }
       })
   });
   $('.deleteMyBlog').click(function (e){
       e.preventDefault();
       let id = $(this).data('id');
       $.ajax({
           url : BASE_URL + "/deleteMyBlog/" + id,
           method : "GET",
           dataType : "json",
           success : function (data){
             showMyBlogs(data)
           }
       });
   });
   $('.btnDeleteNotAllowed').click(function (e){
       e.preventDefault();
       let id = $(this).data('id');
       $.ajax({
           url : BASE_URL + "/deleteNotAllowed/" + id,
           method : "GET",
           dataType : "json",
           success : function (data){
                showNotAllowedBlogs(data)
           }
       })
   });
   $('.editMyBlog').click(function (e){
       e.preventDefault();
       $("#updateForm").show();
       let id = $(this).data('id');
       $.ajax({
           url : BASE_URL + "/update/" + id,
           method : "GET",
           dataType : "json",
           success : function (data){
               for(let d of data){
                   $('#idUpdate').val(d.id_blog);
                   $('#titleUpdate').val(d.title);
                   $('#descriptionUpdate').val(d.description);
               }
           }
       })
   });
    function showNotAllowedBlogs(data){
       let content = '';
       for(let d of data){
           content+=`<tr>
                        <td>${d.id_blog}</td>
                        <td><img class="slike" src="${BASE_URL + "/images/" + d.image}"/></td>
                        <td>${d.title}</td>
                        <td>${d.description}</td>
                        <td>${d.created_at}</td>
                        <td>${d.first_name} ${d.last_name}</td>
                        <td>
                            <button type="submit" class="btnNotAllowed btn btn-success" data-id="${d.id_blog}">Allowed</button>
                        </td>
                        <td>
                            <button type="submit" class="btnDeleteNotAllowed btn btn-danger" data-id="${d.id_blog}">Delete</button>
                        </td>
                      </tr>`;
       }
       $("#nab").html(content);
    }
    function showMyBlogs(data){
        let content = '';
        for(let d of data){
            content+=`<tr>
                        <td>${d.id_blog}</td>
                        <td><img class="slike" src="${BASE_URL + '/images/' + d.image}"/></td>
                        <td>${d.title}</td>
                        <td>${d.description}</td>
                        <td>${d.created_at}</td>
                        <td>${d.first_name} ${d.last_name}</td>
                        <td>
                            <button type="submit" class="deleteMyBlog btn btn-danger" name="deleteMyBlog" data-id="{$d.id_blog}">Delete</button>
                        </td>
                     </tr>`;
        }
        $("#myblogs").html(content);
    }
    function showBlogs(data){
       let content = '';
       for(let d of data){
           content+=`<tr>
                        <td>${d.id_blog}</td>
                        <td><img class="slike" src="${BASE_URL + '/images/' + d.image}"/></td>
                        <td>${d.title}</td>
                        <td>${d.description}</td>
                        <td>${d.created_at}</td>
                        <td>${d.first_name} ${d.last_name}</td>
                        <td>
                            <button type="submit" class="DeleteBlog btn btn-danger" name="deleteBlog" data-id="{$d.id_blog}">Delete</button>
                        </td>
                     </tr>`;
       }
       $("#blogs").html(content);
    }
});
