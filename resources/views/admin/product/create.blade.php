@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Jacob Jeans</a>
            <span class="breadcrumb-item active">Sessão do Produto</span>
        </nav>

        <div class="sl-pagebody">


            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Novo Produto ADD
                    <a href="{{ route('all.product') }}" class="btn btn-success btn-sm pull-right">Todos os Produtos</a></h6>
                <p class="mg-b-20 mg-sm-b-30">Adicione um Novo Produto na Loja</p>
            <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nome do Produto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_name"  placeholder="Digite o Nome do Produto">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Código do Produto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_code"  placeholder="Digite o Código">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantidade: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_quantity" value="" placeholder="Digite a Quantidade">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Categoria: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Selecione a Categoria" name="category_id">
                                    <option label="Choose Category"></option>
                                    @foreach($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Categoria: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">
                                    <option label="Choose country"></option>
                                    <option value="USA">United States of America</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="China">China</option>
                                    <option value="Japan">Japan</option>
                                </select>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Marca: <span class="tx-danger">*</span></label>
                                <select class="form-control select2" data-placeholder="Choose country" name="brand_id">
                                    <option label="Choose Brand"></option>
                                    @foreach($brand as $br)
                                    <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Tamanho do Produto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_size" id="size" data-role="tagsinput">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Cor do Produto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="product_color" id="color" data-role="tagsinput">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Preço do Produto: <span class="tx-danger">*</span></label>
                                <input class="form-control" type="text" name="selling_price" placeholder="Digite o Preço">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Informações do Produto: <span class="tx-danger">*</span></label>
                                <textarea class="form-control"  id="summernote" name="product_details" ></textarea>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Link do Vídeo: <span class="tx-danger">*</span></label>
                                <input class="form-control"  name="video_link" placeholder="Link do video">
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Um ( Miniatura Principal): <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_one" onchange="readURL(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="one">
                                </label>

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Dois: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_two" onchange="readURL2(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="two">
                                </label>

                            </div>
                        </div><!-- col-4 -->




                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Três: <span class="tx-danger">*</span></label>
                                <label class="custom-file">
                                    <input type="file" id="file" class="custom-file-input" name="image_three" onchange="readURL3(this);" required="">
                                    <span class="custom-file-control"></span>
                                    <img src="#" id="three">
                                </label>

                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->
                    <hr>
                    <br><br>

                    <div class="row">

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="main_slider" value="1">
                                <span>Slider Principal</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_deal" value="1">
                                <span>Super Oferta</span>
                            </label>

                        </div> <!-- col-4 -->



                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="best_rated" value="1">
                                <span>Melhor avaliado</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="trend" value="1">
                                <span>Produto Tendência</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="mid_slider" value="1">
                                <span>Mid Slider</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="hot_new" value="1">
                                <span>Slider Meio</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="ckbox">
                                <input type="checkbox" name="buyone_getone" value="1">
                                <span>Compre um Ganhe outro</span>
                            </label>

                        </div> <!-- col-4 -->


                    </div><!-- end row -->
                    <br><br>


                    <div class="form-layout-footer">
                        <button class="btn btn-info mg-r-5">Cadastrar Produto</button>
                        <button class="btn btn-secondary">Cancelar</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </div><!-- card -->

            </form>




        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change',function(){
                var category_id = $(this).val();
                if (category_id) {

                    $.ajax({
                        url: "{{ url('/get/subcategory/') }}/"+category_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){

                                $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');

                            });
                        },
                    });

                }else{
                    alert('danger');
                }

            });
        });

    </script>

    <script type="text/javascript">
        function readURL(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>


    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
