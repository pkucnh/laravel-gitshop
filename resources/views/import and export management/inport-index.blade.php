@extends('admin.index')

@section('title')
<title>Admin - Product</title>

@endsection
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    {{-- <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Table Product</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
              </ol>
            </div>
          </div>
        </div>
      </section> --}}
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card mt-1">
                <div class="card-header">
                  <a href="{{url('/product/add')}}" class="container-fluid btn btn-primary float-right m">Add</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product name</th>
                      <th>Price</th>
                      <th>Amount</th>
                      <th>Image</th>
                      <th>Note</th>
                      <th></th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->Name}}</td>
                            <td>{{$row->Price}}$</td>
                            <td>{{$row->Amount}}</td>
                            <td><img class="img" src="{{asset('product/images')}}/{{$row->img}}"></td>
                            <td>{!!$row->Note!!}</td>
                            <td><a href="{{url('/product/update')}}/{{$row->id}}" class="btn btn-default">update</a></td>
                            <td><a onclick=" deleteProduct('{{$row->id}}');" class="btn btn-danger">Delete</a></td>
                          </tr>
                      @endforeach
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content-wrapper -->
  </div>
  <script type="text/javascript">
    function deleteProduct(id){
      let link = "{{url('/product/delete')}}";
      if(confirm('Are you sure you want to delete?')){
        $.ajax({
          url: link,
          data: {
            'id':id,
            '_token': '{{csrf_token()}}',
          },
          type: "post",
          error: function(xhr, status, errorThrow){
            alert( errorThrow);
          },
          success: function(data){
            alert(data);
            location.reload();
          }
        });
      }
    }
  </script>
@endsection