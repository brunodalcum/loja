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
                <h6 class="card-body-title">Página detalhes do Produto  </h6>

                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Nome do Produto: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $product->product_name }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Código do Produto: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $product->product_code }}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantidade: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $product->product_quantity }}</strong>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Categoria: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $product->category_name }}</strong>

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Categoria: <span class="tx-danger">*</span></label><br>
                                <strong>{{ $product->subcategory_name }}</strong>

                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Marca: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{ $product->brand_name }}</strong>
                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Tamanho do Produto: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{ $product->product_size }}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Cor do Produto: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{ $product->product_color }}</strong>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Preço de Venda: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{ $product->selling_price }}</strong>

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Detalhes do Produto: <span class="tx-danger">*</span></label>
                                <br>
                                <p>   {!! $product->product_details !!} </p>

                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Link do Vídeo: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{ $product->video_link }}</strong>

                            </div>
                        </div><!-- col-4 -->



                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Imagem Um ( Miniatura Principal): <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">

                                    <img src="{{ URL::to($product->image_one) }}" style="height: 80px; width: 80px;">
                                </label>

                            </div>
                        </div><!-- col-4 -->


                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Dois: <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">
                                    <img src="{{ URL::to($product->image_two) }}" style="height: 80px; width: 80px;">
                                </label>

                            </div>
                        </div><!-- col-4 -->




                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Três: <span class="tx-danger">*</span></label><br>
                                <label class="custom-file">
                                    <img src="{{ URL::to($product->image_three) }}" style="height: 80px; width: 80px;">

                                </label>

                            </div>
                        </div><!-- col-4 -->

                    </div><!-- row -->

                    <hr>
                    <br><br>

                    <div class="row">

                        <div class="col-lg-4">
                            <label class="">
                                @if($product->main_slider == 1)
                                    <span class="badge badge-success">Ativo</span>

                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif

                                <span>Slider Principal</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="">
                                @if($product->hot_deal == 1)
                                    <span class="badge badge-success">Ativo</span>

                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif

                                <span>Hot Deal</span>
                            </label>

                        </div> <!-- col-4 -->



                        <div class="col-lg-4">
                            <label class="">
                                @if($product->best_rated == 1)
                                    <span class="badge badge-success">Ativo</span>

                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif

                                <span>Melhor Avaliado</span>
                            </label>

                        </div> <!-- col-4 -->


                        <div class="col-lg-4">
                            <label class="">
                                @if($product->trend == 1)
                                    <span class="badge badge-success">Ativo</span>

                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif

                                <span>Produto Tendência </span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="">
                                @if($product->mid_slider == 1)
                                    <span class="badge badge-success">Ativo</span>

                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif

                                <span>Slider do Meio</span>
                            </label>

                        </div> <!-- col-4 -->

                        <div class="col-lg-4">
                            <label class="">
                                @if($product->hot_new == 1)
                                    <span class="badge badge-success">Ativo</span>

                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif

                                <span>Novidades </span>
                            </label>

                        </div> <!-- col-4 -->


                    </div><!-- end row -->




                </div><!-- form-layout -->
            </div><!-- card -->


        </div><!-- row -->


    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->






@endsection
