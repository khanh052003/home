@extends('layouts.admin')
@php
$start = 2010;
$end = date('Y');
@endphp

@section('title')
Albums
@endsection

@section('content')
<div class="card shadow">
    <div class="card-body">
       
     
        @if(count($albums) > 0)
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Tên Album </th>
                        <th scope="col">Nội dung Album </th>
                        <th scope="col">Năm </th>
                        <th scope="col">Đã thêm</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($albums as $album)
                    <tr>
                        {{-- <th scope="row">{{$album->id}}</th> --}}
                        <td>{{$album->name}}</td>
                        <td>{{Str::limit($album->content, 20)}}</td>
                        <td>{{$album->year}}</td>
                        <td>{{$album->created_at->diffForHumans()}}</td>
                        <td>
                            <button onclick="editalbum({{$album}})" class="btn btn-primary btn-sm">
                                Sửa</button>
                            <button onclick="deletealbum({{$album->id}})" class="btn btn-danger btn-sm">
                                Xóa
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="h3">Chưa có ALBUM nào được thêm !</p>
        @endif

        <br><br>
        <span class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#albummodal">
                <i class="fa fa-plus">Thêm Album</i>
            </button>
        </span>
    </div>
</div>

<!--Edit modal-->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modaltitle">ADD ALBUM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="msgs" class="msgs">

                </div>
                <form id="editform">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề Album</label>
                        <input type="text" name="name" class="form-control" id="editname" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Mô tả</label>
                        <textarea name="content" id="editcontent" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">Năm</label>
                        <select name="year" id="edityear" class="form-control">
                            @for($a= $start; $a <= $end; $a++) <option value="{{$a}}">{{$a}}</option>
                                @endfor
                        </select>

                    </div>

                    <div class="form-group">

                        <label for="image">Ảnh Album</label>
                        <input type="file" name="image" id="editimage">
                        <img src="#" alt="preview" id="previewedit" style="width: 20%;">
                    </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="editid" hidden="editid">
                <button type="button" class="btn btn-secondary" id="submit" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end album modal-->


<!--album modal-->
<div class="modal fade" id="albummodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">THêm ALBUM</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="msgs" class="msgs">

                </div>
                <form id="albumform">
                    @csrf
                    <div class="form-group">
                        <label for="title">Tiêu đề Album </label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Miêu tả</label>
                        <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">Năm phát hành Album</label>
                        <select name="year" id="year" class="form-control">
                            @for($a= $start; $a <= $end; $a++) <option value="{{$a}}">{{$a}}</option>
                                @endfor
                        </select>

                    </div>

                    <div class="form-group">

                        <label for="image">Ảnh Album</label>
                        <input type="file" name="image" id="image" required>
                        <img src="#" alt="preview" id="previewimg" style="width: 20%;">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="submit" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end album modal-->


@push('script')
<script>
function editalbum(album) {
    $('#modaltitle').text("Edit " + album.name + " Album")
    $('#editname').val(album.name);
    $('#editcontent').val(album.content);
    $('#edityear').val(album.year);
    $('#editid').val(album.id);

    //Passing the image from db to preview
    $("#previewedit").attr('src', "/images/albums/" + album.image)

    //Lauch modal
    $('#editmodal').modal('show')


    //edit form
    $('#editform').submit(function(e) {
        $("#loading").show()
        e.preventDefault();
        $("#msgs").html("");
        var form = $("#editform")[0];
        var _data = new FormData(form);
        $.ajax({
            url: '{{url(route("editalbum"))}}',
            data: _data,
            enctype: 'multipart/form-data',
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                $("#loading").hide()
                toastr.success("Lưu thay đổi thành công");
                $('#editform').trigger('reset');
                $('#editmodal').modal('hide')
                setTimeout(() => {
                    location.reload();
                }, 1000)
            },
            error: function(result) {
                $("#loading").hide()
                let errors = result.responseJSON.errors;
                console.log(errors);
                $.each(errors, function(key, value) {
                    let msgs = "<div class='alert alert-danger'>" + value + "</div>";
                    $('#msgs').append(msgs);
                })
                toastr.error('Không thể sửa nhạc', 'Đã xảy ra lỗi!');
            }
        });
    });

}


function readURL(input, image) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            image.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#image").change(function() {
    let preview = $("#previewimg")
    readURL(this, preview);
});

$("#editimage").change(function() {
    let preview = $("#previewedit")
    readURL(this, preview);
});
//add album
$('#albumform').submit(function(e) {
    $("#loading").show()
    e.preventDefault();
    $("#msgs").html("");
    var form = $("#albumform")[0];
    var _data = new FormData(form);
    $.ajax({
        url: '{{url(route("addalbum"))}}',
        data: _data,
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        type: 'POST',
        success: function(data) {
            $("#loading").hide()
            toastr.success("Album mới đã được thêm");
            $('#albumform').trigger('reset');
            $('#albummodal').modal('hide')
            setTimeout(() => {
                location.reload();
            }, 1000)
        },
        error: function(result) {
            $("#loading").hide()
            let errors = result.responseJSON.errors;
            console.log(errors);
            $.each(errors, function(key, value) {
                let msgs = "<div class='alert alert-danger'>" + value + "</div>";
                $('#msgs').append(msgs);
            })
            toastr.error('Không thể thêm album', 'Đã xảy ra lỗi!');
        }
    });
});
//delete album
function deletealbum(id) {
    if (confirm("Are you sure you want to delete this album?")) {
        axios.post('{{route("deletealbum")}}', {
                id: id
            }).then((response) => {
            toastr.success('Album Đã xóa!')
            location.reload();
        }).catch((error) => {
            toastr.error('Lỗi kết nối mạng!')
        })
    }
}
</script>

@endpush

@endsection