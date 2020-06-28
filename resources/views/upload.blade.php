
@extends('header')
<body>
<br />

<div class="container">
    <h3 align="center">Share Images</h3>
    <br />
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            Upload Validation Error<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form method="post" action="{{url('/uploadfile')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <table class="table">
                <tr>
                    <td width="40%" align="right"><label>Select File for Upload</label></td>
                    <td width="30"><input type="file" name="select_file" /></td>
                    <td width="30%" align="left"><input type="submit" name="upload" class="btn btn-primary" value="Upload"></td>
                </tr>
                <tr>
                    <td width="40%" align="right"></td>
                    <td width="30"><span class="text-muted">jpg, png, gif</span></td>
                    <td width="30%" align="left"></td>
                </tr>
            </table>
        </div>
    </form>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-sm-6 col-lg-4" style="margin-bottom: 1.25rem;">
                <div class="card">
                    <img class="card-img-top" src="images/{{ $post->image }}" alt="" width="300">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->name}}</h4>
                        <a href="{{ url('/show', $post->id) }}" class="btn btn-primary">View Image</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{ $posts->render() }}
    <br />
</div>
</body>
@extends('footer')

