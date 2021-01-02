@extends('admin.admin_layouts')

@section('admin_content')

 <div class="sl-mainpanel">


      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Blog Lista de Postagens</h5>

        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Lista de Postagens
  <a href="{{ route('add.blogpost') }}" class="btn btn-sm btn-warning" style="float: right;"  >Adicionar Novo Post</a>
          </h6>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Título do Post</th>
                  <th class="wd-15p">Categoria do Post</th>
                  <th class="wd-15p">Imagem </th>
                  <th class="wd-20p">Ação</th>

                </tr>
              </thead>
              <tbody>
                @foreach($post as $row)
                <tr>
                  <td>{{ $row->post_title_en }}</td>
                  <td>{{ $row->category_name_en }}</td>
                  <td> <img src="{{ URL::to($row->post_image) }}" style="height: 50px; width: 50px;"> </td>
                  <td>
                    <a href="{{ URL::to('edit/post/'.$row->id) }} " class="btn btn-sm btn-info">Editar</a>
                    <a href="{{ URL::to('delete/post/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">Excluir</a>
                  </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->




    </div><!-- sl-mainpanel -->



@endsection
