<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                @include('header')
                @if (\Request::is('category'))
                    <div class="col-xs-12 col-md-12">
                        <h2>List Category</h2>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <a href="/category/add"><button class="btn btn-primary pull-right">Add</button></a>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        {!! html_entity_decode($content) !!}
                    </div>
                @elseif (\Request::is('product'))
                    <div class="col-xs-12 col-md-12">
                        <h2>List Product</h2>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <a href="/product/add"><button class="btn btn-primary pull-right">Add</button></a>
                    </div>
                    <div class="col-xs-12 col-md-12">
                        <table class="table table-striped cat-list">
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                            @foreach ($products as $product)
                            <tr>
                                <td width="20%"><img src="/upload/image/{{ $product->image }}" alt="{{ $product->name }}" class="img-responsive" /></td>
                                <td width="30%">{{ $product->name }}</td>
                                <td width="50%">{{ $product->description }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                @elseif (\Request::is('category/add'))
                <div class="col-xs-12 col-md-12">
                    <div class="row">
                        @if (count($errors) > 0)
                        <div class="col-xs-12 col-md-12">
                            <div class="alert alert-danger errors-add">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="col-xs-12 col-md-6">
                            <h2>Add Category</h2>
                            <div class="category-form">
                                <form method="post" action="/category/add">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="cat_name">Category Name</label>
                                        <input type="text" name="name" class="form-control" id="cat_name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="cat_parent">Parent Category</label>
                                        <select class="form-control" name="cat_list">
                                            <option value="">Please select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <a href="#"><button type="submit" class="btn btn-primary">OK</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif (\Request::is('product/add'))
                <div class="col-xs-12 col-md-12">
                    <div class="row">
                        @if (count($errors) > 0)
                        <div class="col-xs-12 col-md-12">
                            <div class="alert alert-danger errors-add">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="col-xs-12 col-md-6">
                            <h2>Add Prouct</h2>
                            <div class="product-form">
                                <form method="post" action="/product/add" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="prod_name">Product Name</label>
                                        <input type="text" name="name" class="form-control" id="prod_name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_img">Image Upload</label>
                                        <input type="file" name="image" class="form-control-file" id="prod_img" />
                                    </div>
                                    <div class="form-group">
                                        <label for="cat_parent">Category</label>
                                        <select class="form-control" name="cat_list">
                                            <option value="">Please select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="prod_desc">Description</label>
                                        <textarea class="form-control" name="description" id="prod_desc" rows="7"></textarea>
                                    </div>
                                    <a href="#"><button type="submit" class="btn btn-primary">OK</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="col-xs-12 col-md-12">
                        <p class="instruction">Please choose by clicking one of 3 above buttons.</p>
                    </div>
                @endif
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
